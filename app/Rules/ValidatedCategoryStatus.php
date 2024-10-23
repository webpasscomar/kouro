<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidatedCategoryStatus implements ValidationRule
{
    protected $category;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */


    public function __construct($category)
    {
        $this->category = $category;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value == 0 && $this->category->hijas()->count() > 0) {
            $fail('No se puede inhabilitar.Existen subcategorias activas');
        }
        if ($value == 0 && $this->category->productos()->count() > 0) {
            $fail('No se puede inhabilitar.Existen productos asociados');
        }
    }
}
