<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Stancl\Tenancy\Contracts;
use Stancl\Tenancy\Contracts\Tenant;
use Stancl\Tenancy\Database\Concerns;
use Stancl\Tenancy\Events;

/**
 * @property string $domain
 * @property string $tenant_id
 *
 * @property-read Tenant|Model $tenant
 */
class Domain extends Model implements Contracts\Domain
{
    use Concerns\CentralConnection,
        Concerns\EnsuresDomainIsNotOccupied,
        Concerns\ConvertsDomainsToLowercase,
        Concerns\InvalidatesTenantsResolverCache;

    public $table = 'sys_domains';
    protected $guarded = [];

    public function tenant()
    {
        return $this->belongsTo(config('tenancy.tenant_model'));
    }

    /**
     * @return string
     */
    public function getLink()
    {
        $host = Str::contains($this->domain, '.') ? $this->domain : ($this->domain.'.'.request()->getHost());
        return request()->getScheme() .'://'.$host;
    }

    protected $dispatchesEvents = [
        'saving' => Events\SavingDomain::class,
        'saved' => Events\DomainSaved::class,
        'creating' => Events\CreatingDomain::class,
        'created' => Events\DomainCreated::class,
        'updating' => Events\UpdatingDomain::class,
        'updated' => Events\DomainUpdated::class,
        'deleting' => Events\DeletingDomain::class,
        'deleted' => Events\DomainDeleted::class,
    ];
}
