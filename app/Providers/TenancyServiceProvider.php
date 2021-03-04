<?php

declare(strict_types=1);

namespace App\Providers;

use App\Actions\TenantCreatedAction;
use App\Actions\TenantDeletedAction;
use App\Jobs\TenantAdminCreate;
use App\Jobs\TenantAdminDelete;
use App\Jobs\TenantLog;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Stancl\JobPipeline\JobPipeline;
use Stancl\Tenancy\Events\BootstrappingTenancy;
use Stancl\Tenancy\Events\CreatingDomain;
use Stancl\Tenancy\Events\CreatingTenant;
use Stancl\Tenancy\Events\DeletingTenant;
use Stancl\Tenancy\Events\DomainCreated;
use Stancl\Tenancy\Events\EndingTenancy;
use Stancl\Tenancy\Events\InitializingTenancy;
use Stancl\Tenancy\Events\RevertedToCentralContext;
use Stancl\Tenancy\Events\RevertingToCentralContext;
use Stancl\Tenancy\Events\SavingTenant;
use Stancl\Tenancy\Events\SyncedResourceChangedInForeignDatabase;
use Stancl\Tenancy\Events\SyncedResourceSaved;
use Stancl\Tenancy\Events\TenancyBootstrapped;
use Stancl\Tenancy\Events\TenancyEnded;
use Stancl\Tenancy\Events\TenancyInitialized;
use Stancl\Tenancy\Events\TenantCreated;
use Stancl\Tenancy\Events\TenantDeleted;
use Stancl\Tenancy\Events\TenantSaved;
use Stancl\Tenancy\Events\TenantUpdated;
use Stancl\Tenancy\Events\UpdatingTenant;
use Stancl\Tenancy\Jobs;
use Stancl\Tenancy\Jobs\CreateDatabase;
use Stancl\Tenancy\Listeners;
use Stancl\Tenancy\Middleware;

class TenancyServiceProvider extends ServiceProvider
{
    public function events()
    {
        return [
            // Tenant events
            CreatingTenant::class => [],
            TenantCreated::class => [
                TenantCreatedAction::class
            ],
            SavingTenant::class => [],
            TenantSaved::class => [],
            UpdatingTenant::class => [],
            TenantUpdated::class => [],
            DeletingTenant::class => [],
            TenantDeleted::class => [
                TenantDeletedAction::class
            ],

            // Domain events
//            CreatingDomain::class => [],
//            DomainCreated::class => [],
//            SavingDomain::class => [],
//            DomainSaved::class => [],
//            UpdatingDomain::class => [],
//            DomainUpdated::class => [],
//            DeletingDomain::class => [],
//            DomainDeleted::class => [],

            // Database events
//            DatabaseCreated::class => [],
//            DatabaseMigrated::class => [],
//            DatabaseSeeded::class => [],
//            DatabaseRolledBack::class => [],
//            DatabaseDeleted::class => [],

            // Tenancy events
            InitializingTenancy::class => [],
            TenancyInitialized::class => [
                Listeners\BootstrapTenancy::class,
            ],

            EndingTenancy::class => [],
            TenancyEnded::class => [
                Listeners\RevertToCentralContext::class,
            ],

            BootstrappingTenancy::class => [],
            TenancyBootstrapped::class => [],
            RevertingToCentralContext::class => [],
            RevertedToCentralContext::class => [],

            // Resource syncing
            SyncedResourceSaved::class => [
                Listeners\UpdateSyncedResource::class,
            ],

            // Fired only when a synced resource is changed in a different DB than the origin DB (to avoid infinite loops)
            SyncedResourceChangedInForeignDatabase::class => [],
        ];
    }

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->bootEvents();
    }

    protected function bootEvents()
    {
        foreach ($this->events() as $event => $listeners) {
            foreach (array_unique($listeners) as $listener) {
                if ($listener instanceof JobPipeline) {
                    $listener = $listener->toListener();
                }

                Event::listen($event, $listener);
            }
        }
    }
}
