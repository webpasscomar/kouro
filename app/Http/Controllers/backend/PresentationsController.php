<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Presentation;
use Illuminate\Http\Request;

class PresentationsController extends Controller
{
    public function index()
    {

        $presentations = Presentation::all();

        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.presentations.index', compact('presentations'));
    }

    public function create()
    {
        return view('backend.presentations.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'presentacion' => 'required',
            'sigla' => 'required',
            'estado' => 'required|boolean',
        ], [
            'presentacion.required' => 'Ingrese una presentacion',
            'sigla.required' => 'Ingrese una sigla',
        ]);

        Presentation::create($validated);

        toast('Presentación creada con éxito', 'success');
        return redirect()->route('presentations.index');
    }

    public function edit(Presentation $presentation)
    {
        return view('backend.presentations.form', compact('presentation'));
    }

    public function update(Request $request, Presentation $presentation)
    {
        $validated = $request->validate([
            'presentacion' => 'required',
            'sigla' => 'required',
            'estado' => 'required|boolean',
        ]);

        $presentation->update($validated);
        toast('Presentación modificada con éxito', 'success');
        return redirect()->route('presentations.index');
    }

    public function destroy(Presentation $presentation)
    {
        $presentation->delete();
        toast('Presentación eliminada con éxito', 'success');
        return redirect()->route('presentations.index');
    }
}
