<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employe
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->isAdmin()) {
            abort(403, 'Accès non autorisé.');
        }
        return $next($request);
    }
}
?>