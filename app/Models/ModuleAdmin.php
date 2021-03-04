<?php

namespace App\Models;

use App\Traits\Cache\Cacheable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(array $array)
 */
class ModuleAdmin extends BaseModel
{
    use SoftDeletes;
    use Cacheable;

    protected $table = 'sys_modules';
    protected $casts = [
        'active' => 'boolean'
    ];
    protected $fillable = [
        'name', 'active'
    ];
}
