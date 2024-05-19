<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Office;
use App\Models\Airport;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public $menu = 'permissions';
    public function index(Request $request)
    {
        $Roles = Role::where('code', '!=', 'admin')->get();
        $Menus = Menu::get();

        return view('roles.permissions')->with([
            'roles' => $Roles,
            'menus' => $Menus,
            'menu' => $this->menu
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|exists:roles,id',
            'permissions' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        //return $request->permissions;

        foreach ($request->permissions as $menu_id => $permission) {
            $permissions_arr = [
                'can_view' => false,
                'can_add' => false,
                'can_edit' => false,
                'can_delete' => false,
            ];

            if (isset($permission['can_view']) && $permission['can_view']) {
                $permissions_arr['can_view'] = true;
            }
            if (isset($permission['can_add']) && $permission['can_add']) {
                $permissions_arr['can_add'] = true;
            }
            if (isset($permission['can_edit']) && $permission['can_edit']) {
                $permissions_arr['can_edit'] = true;
            }
            if (isset($permission['can_delete']) && $permission['can_delete']) {
                $permissions_arr['can_delete'] = true;
            }

            RolePermission::updateOrCreate([
                'role_id' => $request->role,
                'menu_id' => $menu_id,
            ], $permissions_arr);
        }

        return response()->json([
            'status' => true,
            'message' => 'Permissions updated successfully'
        ]);
    }
}
