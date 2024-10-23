<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();

        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);
        return view('backend.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.faqs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pregunta' => 'required|string|max:255',
            'respuesta' => 'required|string|max:255',
            'estado' => 'boolean',
        ], [
            'pregunta.required' => 'Ingrese una pregunta',
            'pregunta.string' => 'Ingrese una pregunta válida',
            'pregunta.max' => 'Máximo permitido 255 carácteres',
            'estado.boolean' => 'Ingrese un estado válido',
            'respuesta.required' => 'Ingrese una pregunta',
            'respuesta.string' => 'Ingrese una pregunta válida',
            'respuesta.max' => 'Máximo permitido 255 carácteres',
        ]);
        Faq::create($validated);
        toast('Pregunta frecuente creada con éxito', 'success');
        return redirect()->route('faqs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('backend.faqs.form', [
            'Faq' => $faq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'pregunta' => 'required|string|max:255' . $faq->id,
            'respuesta' => 'required|string|max:255' ,
            'estado' => 'boolean',
        ], [
            'pregunta.required' => 'Ingrese una pregunta',
            'pregunta.string' => 'Ingrese una pregunta válida',
            'pregunta.max' => 'Máximo permitido 255 carácteres',
            'estado.boolean' => 'Ingrese un estado válido',
            'respuesta.required' => 'Ingrese una pregunta',
            'respuesta.string' => 'Ingrese una pregunta válida',
            'respuesta.max' => 'Máximo permitido 255 carácteres',
        ]);
        $faq->update($validated);
        toast('Pregunta frecuente modificada con éxito', 'success');
        return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        toast('Pregunta frecuente eliminada con éxito', 'success');
        return redirect()->route('faqs.index');;
    }
}
