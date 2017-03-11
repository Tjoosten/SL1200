<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class LanguageMiddleware
{
    /**
     * @var array
     */
    protected static $supportedLanguages = ['nl', 'en', 'fr'];

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = (Input::get('lang')) ?: Session::get('lang');
        $this->setSupportedLanguage($language);

        return $next($request);
    }

    /**
     * @param  string $lang
     * @return bool
     */
    private function isLanguageSupported($lang)
    {
        return in_aray($lang, self::$supportedLanguages);
    }

    /**
     * @param  string $lang
     * @return void
     */
    private function setSupportedLanguage()
    {
        if ($this->isLanguageSupported($lang)) {
            App::setLocale($lang);
            Session::put('lang', $lang);
        }
    }
}
