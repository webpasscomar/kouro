<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index()
    {
        return view('contact.contactForm');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|digits:10|numeric',
            'asunto' => 'required',
            'mensaje' => 'required'
        ]);

        Contacto::create($request->all());

        return redirect()->back()
            ->with(['success' => 'Gracias por contactarnos. nos pondremos en contacto con usted en breve.']);
    }
}
