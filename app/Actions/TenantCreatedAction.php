<?php


namespace App\Actions;


use App\Models\Tenant;
use App\Traits\AsAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Core\Models\Department;
use Modules\Core\Models\Role;
use Modules\Core\Models\User;
use Stancl\Tenancy\Events\TenantCreated;

class TenantCreatedAction extends BaseAction
{
    /**
     * @param Tenant $tenant
     */
    public function handle(Tenant $tenant)
    {
        DB::transaction(function() use($tenant){
            // domain create
            $tenant->domains()->create(['domain' => $tenant->id]);

            // user create
            $depart = Department::create([
                'tenant_id' => $tenant->id,
                'name' => '默认部门'
            ]);
            $role = Role::create([
                'tenant_id' => $tenant->id,
                'name' => 'admin',
                'label' => '管理员'
            ]);
            $user = User::firstOrCreate([
                'tenant_id' =>  $tenant->id,
                'email' => $tenant->data['email'] ?? $tenant->id.'@xbhub.com',
            ],[
                'tenant_id' =>  $tenant->id,
                'name' => 'Admin',
                'is_admin' => true,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ]);
            $user->departments()->attach($depart);
            $user->roles()->attach($role);
        });
    }


    /**
     * @param TenantCreated $event
     */
    public function asListener(TenantCreated $event): void
    {
        $this->handle($event->tenant);

    }
}
