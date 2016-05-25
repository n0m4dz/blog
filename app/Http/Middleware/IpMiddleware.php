<?php

namespace App\Http\Middleware;

use Closure;

class IpMiddleware
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
        //white list
        //local ip zowshooroh
        //black list

        $whitelist = [
            '192.168.0.105',
            '127.0.0.1'
        ];

        $locals = [
            '192', '10'
        ];

        $blacklist = [
            '127.0.0.1'
        ];

        echo $ip = $request->ip();
        $localIp = explode('.', $ip);

        //dump($localIp);

        if(in_array($localIp[0], $locals) || in_array($ip, $whitelist)){
            return $next($request);
        }else{
            abort(404);
        }
    }
}
