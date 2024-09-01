<?php

namespace App\Livewire\Superadmin\Permissions;

use Livewire\Component;

class EditPermissions extends Component
{
    public $arr;

    public $rolePermissions;

    public $selectedRolePermissions = [];

    public function mount($arr, $rolePermissions)
    {
        $this->arr = $arr;
        $this->rolePermissions = $rolePermissions;
    }

    public function render()
    {
        return view('livewire.superadmin.permissions.edit-permissions');
    }

    public function selectAll($is_checked)
    {
        if ($is_checked) {
            $arr = collect();
            foreach ($this->arr as $key => $items) {
                foreach ($items as $item) {
                    $arr[] = $item['id'];
                }
            }

            $this->rolePermissions = $arr->toArray();
        } else {
            $this->rolePermissions = [];
        }
    }

    public function selectItem($id, $is_checked)
    {
        if ($is_checked) {
            // check if the item is already in the array
            if (in_array($id, $this->rolePermissions)) {
                return;
            }
            $this->rolePermissions[] = $id;
        } else {
            $this->rolePermissions = array_diff($this->rolePermissions, [$id]);
        }
    }
}
