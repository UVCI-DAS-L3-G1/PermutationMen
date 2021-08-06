<?php

namespace App\Http\Middleware;

use App\Pct\PctHelper;
use Closure;
use Illuminate\Http\Request;

class EnsureAutorizationToPublish
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (PctHelper::canPublish()) {
            return $next($request);
        }
        return redirect()->route('publications');
    }
}
