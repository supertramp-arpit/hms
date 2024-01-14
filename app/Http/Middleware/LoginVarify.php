<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginVarify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = request()->session()->get('admin-auth');
        if ($admin){
        return $next($request);
        }else
        {
            return redirect()->to('admin/login')->with(['error'=>"Authentication failed! Try again."]);
        }
    }
}
