<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Str::macro('mark', function ($haystack, $searchString = null) {
            $needle = $searchString ?: Request::query('search');
            // return $haystack if there is no highlight color or strings given, nothing to do.
            if (strlen($haystack) < 1 || strlen($needle) < 1) {
                return $haystack;
            }
            preg_match_all("/$needle+/i", $haystack, $matches);
            if (is_array($matches[0]) && count($matches[0]) >= 1) {
                foreach ($matches[0] as $match) {
                    $haystack = str_replace($match, '<strong>'.$match.'</strong>', $haystack);
                }
            }
            return "<p>{$haystack}</p>";
        });
        Blade::if('hrmanager', function () {
            return Auth::user()->isHrManager();
        });
        Blade::if('commercial', function () {
            return Auth::user()->isCommercial();
        });
        Blade::if('developer', function () {
            return Auth::user()->isDeveloper();
        });
    }
}
