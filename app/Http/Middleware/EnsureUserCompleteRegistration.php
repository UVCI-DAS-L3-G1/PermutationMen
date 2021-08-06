<?php

namespace App\Http\Middleware;

use App\Models\Agent;
use App\Models\User;
use App\Pct\PctHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserCompleteRegistration
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
        if (PctHelper::currentIsRegistrationCompleted()) {
            return $next($request);
        }
        return redirect()->route('complete-registration');
    }
}
