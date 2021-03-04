<?php
namespace App\Traits;

use Spatie\ResponseCache\Facades\ResponseCache;

trait ResponseCacheClear
{

    public static function bootResponseCacheClear()
    {
        self::created(function () {
            ResponseCache::clear();
        });

        self::updated(function () {
            ResponseCache::clear();
        });

        self::deleted(function () {
            ResponseCache::clear();
        });
    }
}
