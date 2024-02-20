<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        return view('welcome', [
            'users' => User::all(),
            'sekolahs' => Sekolah::all(),
        ]);
    }
}
