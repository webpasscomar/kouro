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
        return view('backend.delivery_methods.index', compact('methods'));
    }

    public function create()
    {
        return view('backend.delivery_methods.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'status' => 'boolean',
        ]);

        DeliveryMethod::create($validated);
        // Toast::success('Método de entrega creado con éxito.');
        toast('Método de entrega creado con éxito', 'success');
        return redirect()->route('delivery_methods.index');
    }

    public function edit(DeliveryMethod $deliveryMethod)
    {
        return view('backend.delivery_methods.form', compact('deliveryMethod'));
    }

    public function update(Request $request, DeliveryMethod $deliveryMethod)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'status' => 'boolean',
        ]);

        $deliveryMethod->update($validated);
        // Toast::success('Método de entrega actualizado con éxito.');
        toast('Método de entrega creado con éxito', 'success');
        return redirect()->route('delivery_methods.index');
    }

    public function destroy(DeliveryMethod $deliveryMethod)
    {
        $deliveryMethod->delete();
        // Toast::success('Método de entrega eliminado con éxito.');
        toast('Método de entrega creado con éxito', 'success');
        return back();
    }
}
