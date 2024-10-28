<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */

  public function index()
  {
    $faqs = Faq::get();
    return view('faqs.index', compact('faqs'));
  }
}
