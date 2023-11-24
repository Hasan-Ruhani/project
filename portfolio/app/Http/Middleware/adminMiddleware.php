<?php

namespace App\Http\Middleware;

use App\Helper\adminJWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admintoken=$request->cookie('admin_token');
        $result=adminJWTToken::VerifyToken($admintoken);
        if($result=="unauthorized"){
            return redirect('/adminLogin');
        }
        else{
            $request->headers->set('email',$result->adminEmail);
            return $next($request);
        }
    }
}
