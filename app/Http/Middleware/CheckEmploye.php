<?php
// filepath: /c:/UniServerZ/www/MairieApp/app/Http/Middleware/CheckEmploye.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmploye
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('employe')) {
            return $next($request);
        }

        return redirect('/'); // Redirigez vers une page appropriée si l'utilisateur n'est pas employé
    }
}