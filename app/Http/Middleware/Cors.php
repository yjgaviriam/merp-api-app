<?php
/**
 * Created by PhpStorm.
 * User: xJoni
 * Date: 11/5/2019
 * Time: 8:12 PM
 */

namespace App\Http\Middleware;

use Closure;

/**
 * Middleware para permitir el acceso peticiones locales
 *
 * @package App\Http\Middleware
 */
class Cors
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        $response->header('Access-Control-Allow-Origin', '*');
        return $response;
    }
}