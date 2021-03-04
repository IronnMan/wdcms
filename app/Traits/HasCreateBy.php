<?php
namespace App\Traits;

use Modules\Core\Models\User;

trait HasCreateBy
{

    public static function bootHasCreateBy()
    {
        static::saving(function($model) {
             $model->create_by = $model->create_by ?? (auth()->guest()?0:\auth()->id());
        });
    }

    /**
     * @return mixed
     */
    public function createBy()
    {
        return $this->belongsTo(User::class, 'create_by')->withTrashed()->withDefault();
    }
}
