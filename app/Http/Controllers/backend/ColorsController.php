<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.colors.index', [
            'colors' => Color::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('backend.colors.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validaciones del formulario
        $request->validate(
            [
                'color' => [
                    'required',
                    'min:3',
                    'max:100',
                    'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                    'unique:colores,color'
                ],
                'imagen' => [
                    'required',
                    'image',
                    'mimes:jpg,png,jpeg,svg',
                    'dimensions:min_width=100,min_height=100',
                    'max:1024',
                ],
                'estado' => [
                    'integer',
                    'in:0,1',
                ]
                ],
                [
                    'color.required'=> 'Ingrese un color',
                    'color.min' => 'Ingrese un mínimo de 3 caracteres',
                    'color.max' => 'Ingrese un másimo de 100 caracteres',
                    'color.regex' => 'Ingrese un color válido',
                    'color.unique' => 'Ya existe ese color',
                    'imagen.required'=>'La imágen es requerida',
                    'imagen.image'=> 'Ingrese una imágen válida',
                    'imagen.mimes'=> 'Ingrese una imágen válida',
                    'imagen.dimensions'=> 'El tamaño mínimo debe ser de 100px x 100px',
                    'imagen.max' => 'El peso de la imágen no puede ser mayor a 1mb',
                    'estado.integer'=> 'Seleccione una estado válido',
                    'estado.in'=> 'Seleccione una estado válido',
                ]
            );
                try {
                    // Guardar imágen en storage/colores
                    if ($request->hasFile('imagen')){
                        $image = $request->file('imagen');
                        $imageName = $image->getClientOriginalName();
                        $image->storeAs('colores', $imageName);
                    };
                    // guardar el color
                    Color::create([
                        'color' => $request->input('color'),
                        'imagen' => $imageName,
                        'estado' => $request->input('estado'),
                    ]);

                    toast('El color se creó correctamente', 'success');
                    return redirect()->route('colors.index');

                } catch (\Throwable $th) {
                    dd($th);
                    toast('No se pudo crear el color','error');
                    return redirect()->route('colors.index');
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color):View
    {
        return view('backend.colors.form',[
            'color' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color):RedirectResponse
    {
         // Validaciones del formulario
         $request->validate(
            [
                'color' => [
                    'required',
                    'min:3',
                    'max:100',
                    'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
                    'unique:colores,color,'.$color->id
                ],
                'imagen' => [
                    'image',
                    'mimes:jpg,png,jpeg,svg',
                    'dimensions:min_width=100,min_height=100',
                    'max:1024',
                ],
                'estado' => [
                    'integer',
                    'in:0,1',
                ]
                ],
                [
                    'color.required'=> 'Ingrese un color',
                    'color.min' => 'Ingrese un mínimo de 3 caracteres',
                    'color.max' => 'Ingrese un másimo de 100 caracteres',
                    'color.regex' => 'Ingrese un color válido',
                    'color.unique' => 'Ya existe ese color',
                    'imagen.required'=>'La imágen es requerida',
                    'imagen.image'=> 'Ingrese una imágen válida',
                    'imagen.mimes'=> 'Ingrese una imágen válida',
                    'imagen.dimensions'=> 'El tamaño mínimo debe ser de 100px x 100px',
                    'imagen.max' => 'El peso de la imágen no puede ser mayor a 1mb',
                    'estado.integer'=> 'Seleccione una estado válido',
                    'estado.in'=> 'Seleccione una estado válido',
                ]
            );

            try {

                // si se modifica la imágen, eliminamos la anterior y guardamos la nueva
                if($request->hasFile('imagen')){
                    if(Storage::disk('public')->exists('colores/'.$color->imagen)){
                        Storage::disk('public')->delete('colores/'.$color->imagen);
                    }
                    $image = $request->file('imagen');
                    $imageName = $image->getClientOriginalName();
                    $image->storeAs('colores', $imageName);
                } else{ //sino se modifica dejamos la anterior
                    $imageName = $color->imagen;
                }

                $color->update([
                    'color' => $request->input('color'),
                    'imagen' => $imageName,
                    'estado' => $request->input('estado'),
                ]);
                // Mensaje de actualización correcta
                toast('El color se actualizó correctamente', 'success');
                return redirect()->route('colors.index');
            } catch (\Throwable $th) {
                // dd($th);
                 // Guardar imágen si se modifica en storage/colores y eliminar la anterior
                 if ($request->hasFile('imagen')){
                    $image = $request->file('imagen');
                    $imageName = $image->getClientOriginalName();
                    $image->storeAs('colores', $imageName);
                };
                // Mensaje de actualización incorrecta
                toast('Error al modificar el color','error');
                return redirect()->route('colors.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color):RedirectResponse
    {
        // Eliminamos la imágen asociada al color
        try {
            if(Storage::disk('public')->exists('colores/'.$color->imagen)){
                Storage::disk('public')->delete('colores/'.$color->imagen);
            };

            // Eliminar el color
            $color->delete();
            // Mensaje de eliminación correcta
            toast('Se eliminó el color correctamente', 'success');
            return redirect()->route('colors.index');

        } catch (\Throwable $th) {
            // dd($th);
            // Mensaje de eliminación incorrecta
            toast('No se pudo eliminar el color','error');
            return redirect()->route('colors.index');
        }
    }
}
