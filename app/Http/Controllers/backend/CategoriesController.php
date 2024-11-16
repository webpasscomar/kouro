<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Backend\Categorias;
use App\Models\Category;
use App\Rules\ValidatedCategoryStatus;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Psy\Exception\ThrowUpException;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.categories.form', [
            'categories_father' => Category::where('estado', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $categories = Category::all();

        $request->validate([
            'categoria' => 'required|string|max:255|unique:categorias,categoria',
            'slug' => 'required|string|max:255|unique:categorias,slug|regex:/^[a-z0-9-]+$/|alpha_dash',
            'descripcion' => 'nullable|string',
            'categoriaPadre_id' => 'integer|in:0,' . implode(',', $categories->pluck('id')->toArray()),
            'imagen' => 'required|image|mimes:jpg,png,jpeg,svg|max:1024',
            'estado' => 'integer|in:0,1',
            'menu' => 'integer|in:0,1'
        ], [
            'categoria.required' => 'Ingrese un nombre',
            'categoria.max' => 'Máximo permitido 255 caracteres',
            'categoria.string' => 'Ingrese un nombre válido',
            'categoria.unique' => 'El nombre de la categoría ya existe',
            'slug.required' => 'Ingrese un slug',
            'slug.max' => 'Máximo permitido 255 caracteres',
            'slug.string' => 'Ingrese un slug válido',
            'slug.unique' => 'Ingrese un slug válido',
            'slug.regex' => 'Ingrese un slug válido',
            'slug.alpha_dash' => 'El nombre del slug ya existe',
            'descripcion.string' => 'Ingrese una descripción válida',
            'categoriaPadre_id.integer' => 'Seleccione una categoría válida',
            'categoria_padre_id.in' => 'Seleccione una categoría válida',
            'imagen.required' => 'La imágen es requerida',
            'imagen.image' => 'Seleccione una imágen válida',
            'imagen.mimes' => 'Seleccione una imágen válida',
            'imagen.max' => 'El tamaño máximo es de 1mb',
            'estado.integer' => 'Seleccione un estado válido',
            'estado.in' => 'Seleccione un estado válido',
            'menu.integer' => 'Seleccione una opción válida',
            'menu.in' => 'Seleccione una opción válida',
        ]);


        try {
            // Si existe una imágen la guardamos en storage/categorias de la carpeta public
            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $imageName = $image->getClientOriginalName();
                $image->storeAs('categorias', $imageName);
            }


            // Guardamos la categoría
            Category::create([
                'categoria' => $request->input('categoria'),
                'slug' => $request->input('slug'),
                'descripcion' => $request->input('descripcion'),
                'categoriaPadre_id' => $request->input('categoriaPadre_id'),
                'imagen' => $imageName,
                'estado' => $request->input('estado'),
                'menu' => $request->input('menu')
            ]);
            toast('La categoría se creo correctamente', 'success');
            return redirect()->route('categories.index');
        } catch (\Throwable $th) { //Mensaje de error si se produce alguna error al crear
            // dd($th);
            toast('No se pudo crear la categoria', 'error');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return view('backend.categories.form', [
            'category' => $category,
            'categories_father' => Category::where('estado', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $categories = Category::all();

        $request->validate([
            'categoria' => 'required|string|max:255|unique:categorias,categoria,' . $category->id,
            'slug' => 'required|string|max:255|unique:categorias,slug,' . $category->id . '|regex:/^[a-z0-9-]+$/|alpha_dash',
            'descripcion' => 'nullable|string',
            'categoriaPadre_id' => 'integer|in:0,' . implode(',', $categories->pluck('id')->toArray()),
            'imagen' => 'image|mimes:jpg,png,jpeg,svg|max:1024',
            'estado' => ['integer', 'in:0,1', new ValidatedCategoryStatus($category)],
            'menu' => 'integer|in:0,1'
        ], [
            'categoria.required' => 'Ingrese un nombre',
            'categoria.max' => 'Máximo permitido 255 caracteres',
            'categoria.string' => 'Ingrese un nombre válido',
            'categoria.unique' => 'El nombre de la categoría ya existe',
            'slug.required' => 'Ingrese un slug',
            'slug.max' => 'Máximo permitido 255 caracteres',
            'slug.string' => 'Ingrese un slug válido',
            'slug.unique' => 'El slug ya existe',
            'slug.regex' => 'Ingrese un slug válido',
            'slug.alpha_dash' => 'El nombre del slug ya existe',
            'descripcion.string' => 'Ingrese una descripción válida',
            'categoriaPadre_id.integer' => 'Seleccione una categoría válida',
            'categoria_padre_id.in' => 'Seleccione una categoría válida',
            'imagen.image' => 'Seleccione una imágen válida',
            'imagen.mimes' => 'Seleccione una imágen válida',
            'imagen.max' => 'El tamaño máximo es de 1mb',
            'estado.integer' => 'Seleccione un estado válido',
            'estado.in' => 'Seleccione un estado válido',
            'menu.integer' => 'Seleccione una opción válida',
            'menu.in' => 'Seleccione una opción válida',
        ]);

        try {
            // Si suben una nueva imágen eliminamos la anterior y guardamos la nueva
            if ($request->hasFile('imagen')) {
                if (Storage::disk('public')->exists('categorias/' . $category->imagen)) {
                    Storage::disk('public')->delete('categorias/' . $category->imagen);
                }

                $image = $request->file('imagen');
                $imageName = $image->getClientOriginalName();
                $image->storeAs('categorias', $imageName);
            } else {
                $imageName = $category->imagen;
            }

            // Al poner en inactiva, comprobar si la categoría tiene subcategorías
            if ($category->estado == '0' && count($category->hijas) > 0) {
                Alert::error('Error al actualizar la categoría', 'La categoría no puede estar inactiva porque tiene subcategorias activas');
                return redirect()->route('categories.index');
            };
            // Al poner en inactiva, comprobar si la categoría tiene productos asociados
            if ($category->estado == '0' && count($category->productos) > 0) {
                // dd('la categoría tiene productos');
                Alert::error('Error al actualizar la categoría', 'La categoría no puede estar inactiva porque tiene productos asociados');
                return redirect()->route('categories.index');
            }

            $category->update([
                'categoria' => $request->input('categoria'),
                'slug' => $request->input('slug'),
                'descripcion' => $request->input('descripcion'),
                'categoriaPadre_id' => $request->input('categoriaPadre_id'),
                'imagen' => $imageName,
                'estado' => $request->input('estado'),
                'menu' => $request->input('menu')
            ]);

            toast('La categoría se actualizó correctamente', 'success');
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            // dd($th);
            toast('No se pudo actualizar la categoría', 'error');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        try {
            // Comprobar si la categoría tiene subcategorías
            if (count($category->hijas) > 0) {
                Alert::error('Error al eliminar la categoría', 'La categoría tiene subcategorias');
                return redirect()->route('categories.index');
            };
            // Comprobar si la categoría tiene productos asociados
            if (count($category->productos) > 0) {
                // dd('la categoría tiene productos');
                Alert::error('Error al eliminar la categoría', 'La categoría tiene productos asociados');
                return redirect()->route('categories.index');
            }
            // si existe, eliminar la imágen de la categoría
            if (Storage::disk('public')->exists('categorias/' . $category->imagen)) {
                Storage::disk('public')->delete('categorias/' . $category->imagen);
            };
            // Eliminar la categoría
            $category->delete();
            toast('La categoría se eliminó correctamente', 'success');
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            // dd($th);
            toast('No se pudo eliminar la categoría', 'error');
            return redirect()->route('categories.index');
        }
    }
}
