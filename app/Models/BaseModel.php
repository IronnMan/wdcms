<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Xbhub\Filter\Filterable;
use App\Traits\HasUnique;

/**
 * Class Setting.
 *
 * @package namespace App\Models;
 */
class BaseModel extends Model
{
    use HasUnique;
    use Filterable;
    use HasFactory;

    protected $fillable = [];

//    protected $connection = 'lumina';

    public function getFillable()
    {
        return array_merge($this->fillable, ['tenant_id', 'create_by']);
    }

    /**
     * 格式化时间
     *
     * @param DateTimeInterface $date
     * @return void
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * 获取对象键值对
     *
     * @param [type] $val
     * @param [type] $label
     * @return void
     */
    public static function getOptions($val = 'id', $label = 'name')
    {
        return self::all()->mapWithKeys(function($item) use($val, $label){
            return [$item[$val] => $item[$label]];
        })->all();
    }

}
