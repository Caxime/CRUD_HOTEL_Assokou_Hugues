<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Chambre;

class CheckNombreChambres
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   // app/Http/Middleware/CheckNombreChambres.php

public function handle(Request $request, Closure $next)
{
    $nombreChambres = Chambre::count();

    if ($nombreChambres >= 3) {
        return $next($request);
    }

    return redirect()->route('chambres.create')->with('error', 'Vous devez avoir au moins 3 chambres avant de pouvoir en supprimer.');
}

}
