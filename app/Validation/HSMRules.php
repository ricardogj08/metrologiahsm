<?php

namespace App\Validation;

class HSMRules
{
    /**
     * Valida que una contraseña no contenga espacios o secuencias de escape.
     */
    public function password(string $password): bool
    {
        return ctype_graph($password);
    }
}
