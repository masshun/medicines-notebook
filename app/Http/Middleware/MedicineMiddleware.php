<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class MedicineMiddleware
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
        $response = $next($request);
        $content = $response->content();
        
        $medicine['body'] = Str::limit($medicine['body'], 17, '(...)');
        $content = $medicine['body'];
        $response->setContent($content);

        return $response;
    }
}
