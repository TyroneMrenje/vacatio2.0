<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class postgrescontext
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(Auth::check()){
        DB::statement(
            "SELECT set_config('app.current_user_id',?,false)", [Auth::user()->id]
        );
        DB::statement(
            "SELECT set_config('app.current_user_role',?,false)", [Auth::user()->role]
        );

       }
        return $next($request);
    }
}
