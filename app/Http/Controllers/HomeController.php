<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $rol = $user->roles->implode('name', ', ');

        switch ($rol)
        {
          case 'Normal':
            $saludo = 'Bienvenido usuario normal';

            return view('home', compact('saludo'));
            break;

          case 'Coordinador':
              $saludo = 'Bienvenido usuario coordinador';

              return view('home', compact('saludo'));
            break;

          case 'Administrador':
              $saludo = 'Bienvenido usuario Administrador';

              return view('home', compact('saludo'));
            break;
        }
    }
}
