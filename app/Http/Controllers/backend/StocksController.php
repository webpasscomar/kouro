<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StocksController extends Controller
{
    public function index(): View
    {
        $sku = Sku::where('estado', 1)->get();

        return view('backend.stock.index', compact('sku'));
    }
}
