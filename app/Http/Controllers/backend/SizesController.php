<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    public function index()
    {
        $sizes = Size::all();

        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('backend.sizes.form');
    }

    public function store(Request $request)
    {
        $validated = $this->validateSize($request);

        Size::create($validated);

        toast('Talle creado con éxito', 'success');
        return redirect()->route('sizes.index');
    }

    public function edit(Size $size)
    {
        return view('backend.sizes.form', compact('size'));
    }

    public function update(Request $request, Size $size)
    {
        $validated = $this->validateSize($request);

        $size->update($validated);

        toast('Talle modificado con éxito', 'success');
        return redirect()->route('sizes.index');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        toast('Talle eliminado con éxito', 'success');
        return redirect()->route('sizes.index');
    }

    private function validateSize(Request $request)
    {
        return $request->validate([
            'talle' => 'required',
            'estado' => 'required|boolean',
        ], [
            'talle.required' => 'Ingrese un talle',
            'estado.required' => 'Ingrese un estado',
        ]);
    }
}
