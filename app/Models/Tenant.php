<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\HasPathTree;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Stancl\Tenancy\Contracts;
use Stancl\Tenancy\Database\Concerns;
use Stancl\Tenancy\Database\TenantCollection;
use Stancl\Tenancy\Events\CreatingTenant;
use Stancl\Tenancy\Events\DeletingTenant;
use Stancl\Tenancy\Events\SavingTenant;
use Stancl\Tenancy\Events\TenantCreated;
use Stancl\Tenancy\Events\TenantDeleted;
use Stancl\Tenancy\Events\TenantSaved;
use Stancl\Tenancy\Events\TenantUpdated;
use Stancl\Tenancy\Events\UpdatingTenant;

/**
 * @property string|int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property array $data
 *
 * @method static TenantCollection all()
 */
class Tenant extends Model implements Contracts\Tenant
{
    use Concerns\CentralConnection,
        Concerns\GeneratesIds,
        Concerns\HasInternalKeys,
        Concerns\TenantRun,
        Concerns\InvalidatesResolverCache;
    use Concerns\HasDomains;
    use HasPathTree;
//    use SoftDeletes;

    protected $table = 'sys_tenants';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'data', 'parent_id', 'name', 'start_at', 'end_at', 'module'];


    public function getTenantKeyName(): string
    {
        return 'id';
    }

    protected  $casts = [
        'data' => 'array',
        'module' => 'array'
    ];

    public function getTenantKey()
    {
        return $this->getAttribute($this->getTenantKeyName());
    }

    public function newCollection(array $models = []): TenantCollection
    {
        return new TenantCollection($models);
    }

    protected $dispatchesEvents = [
        'saving' => SavingTenant::class,
        'saved' => TenantSaved::class,
        'creating' => CreatingTenant::class,
        'created' => TenantCreated::class,
        'updating' => UpdatingTenant::class,
        'updated' => TenantUpdated::class,
        'deleting' => DeletingTenant::class,
        'deleted' => TenantDeleted::class,
    ];


    /**
     * @param string $value
     * @return bool
     */
    public function checkModule(string $value): bool
    {
        $module_name = strtolower($value);
        if($module_name === 'core') {
            return true;
        }
        return Arr::has($this->module, $module_name);
    }
}
