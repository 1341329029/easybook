<?php

namespace App;

use App\Model;

class AdminPermission extends Model
{
    protected $table = "admin_permissions";

      //权限属于哪些角色

    public function roles()
    {
        return $this->belongsToMany(\App\AdminRole::class, 'admin_permission_role', 'role_id', 'permission_id')->withPivot(['permission_id', 'role_id']);
    }
}
