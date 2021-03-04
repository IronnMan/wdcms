<?php


namespace App\Actions;


use App\Models\Tenant;
use App\Traits\AsAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Core\Models\Department;
use Modules\Core\Models\Role;
use Modules\Core\Models\User;
use Stancl\Tenancy\Events\TenantDeleted;

class TenantDeletedAction extends BaseAction
{

    /**
     * @param Tenant $tenant
     */
    public function handle(Tenant $tenant)
    {
        $tenant->domains()->delete();
    }

    public function asListener(TenantDeleted $event): void
    {
        $this->handle($event->tenant);

    }
}
