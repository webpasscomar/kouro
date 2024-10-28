<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeria $galeria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeria $galeria): RedirectResponse
    {
        try {
            // Eliminamos la imágen
            if (Storage::disk('public')->exists('galeria/' . $galeria->imagen)) {
                Storage::disk('public')->delete('galeria/' . $galeria->imagen);
            }
            // Eliminamos el Slide
            $galeria->delete();
            // Mensaje de eliminación correcta
            toast('El slide se eliminó correctamente', 'success');
            return redirect()->route('galeria.index');
        } catch (\Throwable $th) {
            //dd($th);
            toast('No se pudo eliminar el slide', 'error');
            return redirect()->route('galeria.index');
        }
    }
}
