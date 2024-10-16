<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Movimiento;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Stock_pendiente;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('backend.dashboard', [
            'stock_pend' => Stock_pendiente::all(),
            'orders' => Pedido::all(),
            'products' => Producto::all(),
            'stock' => Movimiento::all(),
        ]);
    }
}
