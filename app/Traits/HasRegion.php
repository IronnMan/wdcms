<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

/**
 * @package Venturecraft\Revisionable
 */
trait HasRegion
{
    /**
     * region
     *
     * @return void
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region', 'id', 'region_id');
    }

    /**
     * 获取地址详情
     *
     * @param string $replace
     * @return void
     */
    public function getMergeName($replace = '')
    {
        return str_replace(',', $replace, $this->region->merger_name);

    }
}
