<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:roles.index', ['only' => ['index']]);
        $this->middleware('permission:roles.create', ['only' => ['create']]);
        $this->middleware('permission:roles.store', ['only' => ['store']]);
        $this->middleware('permission:roles.show', ['only' => ['show']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit']]);
        $this->middleware('permission:roles.update', ['only' => ['update']]);
        $this->middleware('permission:roles.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $roles = Role::with('users')->orderBy('id', 'DESC')->get();
        $permissions = Permission::get();

        foreach ($permissions as $permission) {
            $routeName = ucwords(str_replace('.', ' ', $permission->name));
            $routeNameArray = explode(' ', $routeName);
            if (!isset($arr[strtok($routeName, " ")])) {
                $arr[strtok($routeName, " ")] = [];
            }
            array_push(
                $arr[strtok($routeName, " ")],
                [
                    'name' => $permission->name,
                    'na' => count($routeNameArray) > 1 ? $routeNameArray[1] : $routeNameArray[0]
                ]
            );
        }



        return view('superadmin.roles.index', compact('roles', 'arr', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('superadmin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
            'role_name' => 'required',
        ]);

        $role = Role::create(['name' => str_replace(' ', '_', strtolower($request->get('name'))), 'role_name' => $request->get('role_name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')->with('success', __('تم إنشاء الصلاحية بنجاح !'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions;

        return view('superadmin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = $role;
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $routeName = ucwords(str_replace('.', ' ', $permission->name));
            $routeNameArray = explode(' ', $routeName);
            if (!isset($arr[strtok($routeName, " ")])) {
                $arr[strtok($routeName, " ")] = [];
            }

            array_push(
                $arr[strtok($routeName, " ")],
                [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'na' => count($routeNameArray) > 1 ? $routeNameArray[1] : $routeNameArray[0]
                ]
            );
        }

        return view('superadmin.roles.edit', compact('role', 'rolePermissions', 'permissions', 'arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'nullable|array',
            'permission.*' => 'nullable|exists:permissions,name',
            'role_name' => 'required',
        ]);

        $role->update(['name' => str_replace(' ', '_', strtolower($request->get('name'))), 'role_name' => $request->get('role_name')]);

        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')->with('success', __('تم تعديل الصلاحية بنجاح !'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', __('تم حذف الصلاحية بنجاح !'));
    }
}
