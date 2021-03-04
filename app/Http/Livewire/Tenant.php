<?php


namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Tenant as TenantModel;
use Modules\Core\Models\User;

class Tenant extends Component
{
    public $tenantModal = false;

    /**
     * @var fields
     */
    public $tenant_id, $name, $email, $module;
    protected $editMode = false;

    protected $rules = [
        'tenant_id' => 'required|max:35',
        'name' => 'required',
        'module' => 'required|array',
        'email' => 'required|email'
    ];

    public function cleanFields()
    {
        $this->tenant_id = null;
        $this->name = null;
        $this->email = null;
        $this->module = null;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->editMode = false;
    }

    /**
     * tenant create
     */
    public function store()
    {
        $this->validate();
        $exist = TenantModel::find($this->tenant_id);
        if($exist) {
            session()->flush('error', 'ID已存在');
            return;
        }

        $tenant = TenantModel::create([
            'id' => $this->tenant_id,
            'data' => ['email' => $this->email],
            'name' => $this->name,
            'module' => array_filter($this->module)
        ]);
        if($tenant) {
            $this->cleanFields();
            $this->emit('saved');
            $this->tenantModal = false;
        }
    }

    public function update()
    {
        $exist = TenantModel::find($this->tenant_id);

        $exist->update([
            'data' => ['email' => $this->email],
            'name' => $this->name,
            'module' => array_filter($this->module)
        ]);

        $this->tenantModal = false;
        $this->cleanFields();
    }

    public function edit($id)
    {
        $tenant = TenantModel::find($id);

        $this->tenant_id = $tenant->id;
        $this->name = $tenant->name;
        $this->email = $tenant->data['email'];
        $this->module = $tenant->module;

        $this->editMode = true;
        $this->tenantModal = true;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        // TenantModel::destroy($id);

    }

    /**
     * @param \App\Models\Tenant $tenant
     * @return mixed
     */
    public function render(TenantModel $tenant)
    {
        $tenants = $tenant->with('domains')->paginate();
        return view('livewire.tenant.index', [
            'tenants' => $tenants,
            'editMode' => $this->editMode,
            'modules' => \Nwidart\Modules\Facades\Module::allEnabled()
        ])->extends('layouts.landlord');
    }

}
