<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // dd('Hola');
        $faqs = Faq::where('estado', 1)->get();

        return view('faqs.faqs', compact('faqs'));
    }
}
