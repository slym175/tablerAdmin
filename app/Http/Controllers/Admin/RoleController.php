<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $roles = Role::with(['permissions'])->orderBy('id')->paginate(15);
        return view('admin.role.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get()->pluck('display_name', 'name')->toArray();
        return view('admin.role.create', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'unique:roles,name', 'max:255'],
                'display_name' => ['required', 'max:255'],
                'guard_name' => ['required', 'max:255', Rule::in(array_keys(config('auth.guards')))],
            ]);

            if ($validator->fails()) {
                return redirect()->route('app.admin.role.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $role = new Role();
            $role->display_name = $request->get('display_name', '');
            $role->name = $request->get('name', '');
            $role->guard_name = $request->get('guard_name', '');

            if($role->save()) {
                $role->syncPermissions($request->get('permissions', ''));
                return redirect()->back()->with('msg', 'New role \'s created successfully!');
            }
            return redirect()->back()->with('error', 'Something \'s wrong!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $role
     * @return Application|Factory|View
     */
    public function show($role)
    {
        $rol = Role::findByName($role)->with(['permissions'])->firstOrFail();
        return view('admin.role.view', [
            'role' => $rol
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $role
     * @return Application|Factory|View
     */
    public function edit($role)
    {
        $rol = Role::findByName($role)->with(['permissions'])->firstOrFail();
        $permissions = Permission::orderBy('name')->get()->pluck('display_name', 'name')->toArray();
        return view('admin.role.edit', [
            'role' => $rol,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  $role
     * @return RedirectResponse
     */
    public function update(Request $request, $role)
    {
        try {
            $validator = Validator::make($request->all(), [
                'display_name' => ['required', 'max:255'],
                'guard_name' => ['required', 'max:255', Rule::in(array_keys(config('auth.guards')))],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $rol = Role::findByName($role)->firstOrFail();
            $rol->display_name = $request->get('display_name', '');
            $rol->guard_name = $request->get('guard_name', '');

            if($rol->save()) {
                $rol->syncPermissions($request->get('permissions', ''));
                return redirect()->back()->with('msg', 'Role \'s updated successfully!');
            }
            return redirect()->back()->with('error', 'Something \'s wrong!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $role
     * @return RedirectResponse
     */
    public function destroy($role)
    {
        try {
            $rol = Role::where('name', $role)->firstOrFail();
            if($rol->delete()) {
                Artisan::call('permission:cache-reset');
                return redirect()->route('app.admin.role.index')->with('msg', 'Role \'s deleted successfully!');
            }
            return redirect()->route('app.admin.role.index')->with('error', 'Role can\'t be deleted!');
        } catch (\Exception $e) {
            return redirect()->route('app.admin.role.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return Application|Factory|View
     */
    public function trash()
    {
        $permissions = Permission::orderBy('name')->get()->pluck('display_name', 'name')->toArray();
        $roles = Role::orderBy('id')->with(['permissions'])->onlyTrashed()->paginate(15);
        return view('admin.role.trash', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Restore the specified resource in trash.
     *
     * @param Request $request
     * @param $role
     * @return RedirectResponse
     */
    public function restore(Request $request, $role)
    {
        Artisan::call('permission:cache-reset');
        try {
            $rol = Role::withTrashed()->where('name', $role)->withTrashed()->restore();
            if($rol) {
                return redirect()->back()->with('msg', 'Role \'s restored successfully!');
            }
            return redirect()->back()->with('error', 'Role can\'t be restored!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from trash.
     *
     * @param $role
     * @return RedirectResponse
     */
    public function delete($role)
    {
        Artisan::call('permission:cache-reset');
        try {
            $rol = Role::withTrashed()->where('name', $role)->withTrashed()->forceDelete();
            if($rol) {
                return redirect()->back()->with('msg', 'Role \'s force deleted successfully!');
            }
            return redirect()->back()->with('error', 'Role can\'t be force deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
