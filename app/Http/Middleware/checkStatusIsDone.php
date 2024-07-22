<?php

namespace App\Http\Middleware;

use App\Models\Shipping;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkStatusIsDone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $shipping = Shipping::find($request->shippingId);
        if($shipping && $shipping->status == 2){
            return $next($request);
        }
        return abort(403);
    }
}
