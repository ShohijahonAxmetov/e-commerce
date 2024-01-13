<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function tmpToPath($tmp): ?string
    {
        if (!$tmp) return $tmp;

        $exploded = explode('/', $tmp);

        return $exploded[1];
    }

    public function getMainLang(): string
    {
        return 'ru';
    }
}
