<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Pedido::all();
        return view('backend.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('backend.orders.form', ['order' => null]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string',
            'cantidadItems' => 'required|integer',
            'subTotal' => 'required|numeric',
            'total' => 'required|numeric',
            'del_costo' => 'required|numeric',
        ]);

        Pedido::create($validated);

        // Toast message and redirect
        toast('Pedido creado con éxito', 'success');
        return redirect()->route('orders.index');
    }

    public function edit(Pedido $order)
    {
        return view('backend.orders.form', compact('order'));
    }

    public function update(Request $request, Pedido $order)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string',
            'cantidadItems' => 'required|integer',
            'subTotal' => 'required|numeric',
            'total' => 'required|numeric',
            'del_costo' => 'required|numeric',
        ]);

        $order->update($validated);

        toast('Pedido actualizado con éxito', 'success');
        return redirect()->route('orders.index');
    }

    public function destroy(Pedido $order)
    {
        $order->delete();

        toast('Pedido eliminado con éxito', 'success');
        return redirect()->route('orders.index');
    }
}
