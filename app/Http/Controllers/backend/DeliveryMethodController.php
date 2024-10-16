<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMethod;
use Illuminate\Http\Request;

class DeliveryMethodController extends Controller
{
    public function index()
    {
        $methods = DeliveryMethod::all();

        $title = 'Está seguro?';
        $text = 'Está acción no se podrá revertir';
        confirmDelete($title, $text);

        return view('backend.delivery_methods.index', compact('methods'));
    }

    public function create()
    {
        return view('backend.delivery_methods.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:delivery_methods,name',
            'cost' => 'required|numeric',
            'status' => 'boolean',
        ], [
            'name.required' => 'Ingrese un nombre',
            'name.string' => 'Ingrese un nombre válido',
            'name.max' => 'Máximo permitido 255 carácteres',
            'name.unique' => 'El nombre ya existe',
            'status.boolean' => 'Ingrese un estado válido',
            'cost.required' => 'Ingrese un costo',
            'cost.numeric' => 'Ingrese un costo válido'
        ]);

        DeliveryMethod::create($validated);
        toast('Forma de entrega creada con éxito', 'success');
        return redirect()->route('formas.index');
    }

    public function edit(DeliveryMethod $deliveryMethod)
    {
        return view('backend.delivery_methods.form', [
            'deliveryMethod' => $deliveryMethod,
        ]);
    }

    public function update(Request $request, DeliveryMethod $deliveryMethod)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:delivery_methods,name,' . $deliveryMethod->id,
            'cost' => 'required|numeric',
            'status' => 'boolean',
        ], [
            'name.required' => 'Ingrese un nombre',
            'name.string' => 'Ingrese un nombre válido',
            'name.max' => 'Máximo permitido 255 carácteres',
            'name.unique' => 'El nombre ya existe',
            'status.boolean' => 'Ingrese un estado válido',
            'cost.required' => 'Ingrese un costo',
            'cost.numeric' => 'Ingrese un costo válido'
        ]);

        $deliveryMethod->update($validated);
        toast('Forma de entrega modificada con éxito', 'success');
        return redirect()->route('formas.index');
    }

    public function destroy(DeliveryMethod $deliveryMethod)
    {
        $deliveryMethod->delete();
        toast('Forma de entrega eliminada con éxito', 'success');
        return redirect()->route('formas.index');;
    }
}
