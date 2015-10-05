<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Languages;
use Illuminate\Support\Facades\App;

class LangInit
{

    public static $lng_id = 1;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $prefix = $request->lng;
        $lang = Languages::lists('id','prefix');

        if(!empty($lang[$prefix])){
            self::$lng_id = $lang[$prefix];
            //global $lang_id = self::$lng_id;
            App::setlocale($prefix);
        }else{
            //global $lang_id = self::$lng_id;
        }
        return $next($request);
    }
}
