<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = \Auth::id();
        $user = User::find($userId);
        if ($user->status ==1){
            return back()->with('error', 'Unauthorized access');
          
        }
        return $next($request);
    }
}
