<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthApiAdmin
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
        $authorization  = 'NIjwluBPOzYSnZAEv01nyWEz4LktRBVOCJELj0yn5kKo99VeeGwAvhB5LtX17mEYYtSW4ZGeZWpRbuxM';
        $x_api_key      = 'ADMIN';
        $header         = $request->header();
        if(empty($header['authorization'])) return response()->json(['message' => 'Empty authorization'], 412);
        if(empty($header['x-api-key']))     return response()->json(['message' => 'Empty x-api-key'], 412);

        $Authorization = explode(' ', $header['authorization'][0]);
        if($Authorization[0] !== "Bearer") return response()->json(['message' => 'Bearer not found'], 412);

        if(hex2bin(base64_decode($Authorization[1])) !== $authorization) return response()->json(['message' => 'Invalid authorization'], 412);
        if(hex2bin(base64_decode($header['x-api-key'][0])) !== $x_api_key)         return response()->json(['message' => 'Invalid x_api_key'], 412);

        return $next($request);
    }
}
