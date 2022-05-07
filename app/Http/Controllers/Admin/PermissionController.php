<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $permissions = Permission::orderBy('id')->paginate(15);
        return view('admin.permission.index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'unique:permissions,name', 'max:255'],
                'display_name' => ['required', 'max:255'],
                'guard_name' => ['required', 'max:255', Rule::in(array_keys(config('auth.guards')))],
            ]);

            if ($validator->fails()) {
                return redirect()->route('app.admin.permission.create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $permission = new Permission();
            $permission->display_name = $request->get('display_name', '');
            $permission->name = $request->get('name', '');
            $permission->guard_name = $request->get('guard_name', '');

            if($permission->save()) {
                return redirect()->back()->with('msg', 'New permission \'s created successfully!');
            }
            return redirect()->back()->with('error', 'Something \'s wrong!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $permission
     * @return Application|Factory|View
     */
    public function show($permission)
    {
        $perm = Permission::findByName($permission)->firstOrFail();
        return view('admin.permission.view', [
            'permission' => $perm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $permission
     * @return Application|Factory|View
     */
    public function edit($permission)
    {
        $perm = Permission::findByName($permission)->firstOrFail();
        return view('admin.permission.edit', [
            'permission' => $perm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $permission
     * @return RedirectResponse
     */
    public function update(Request $request, $permission)
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

            $perm = Permission::findByName($permission)->firstOrFail();
            $perm->display_name = $request->get('display_name', '');
            $perm->guard_name = $request->get('guard_name', '');

            if($perm->save()) {
                return redirect()->back()->with('msg', 'Permission \'s updated successfully!');
            }
            return redirect()->back()->with('error', 'Something \'s wrong!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $permission
     * @return RedirectResponse
     */
    public function destroy($permission)
    {
        try {
            $perm = Permission::where('name', $permission)->firstOrFail();
            if($permission !== 'admin_access' && $perm->delete()) {
                Artisan::call('permission:cache-reset');
                return redirect()->route('app.admin.permission.index')->with('msg', 'Permission \'s deleted successfully!');
            }
            return redirect()->route('app.admin.permission.index')->with('error', 'Permission can\'t be deleted!');
        } catch (\Exception $e) {
            return redirect()->route('app.admin.permission.index')->with('error', $e->getMessage());
        }
    }


    /**
     * Display a listing of the trashed resource.
     *
     * @return Application|Factory|View
     */
    public function trash()
    {
        $permissions = Permission::orderBy('id')->onlyTrashed()->paginate(15);
        return view('admin.permission.trash', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Restore the specified resource in trash.
     *
     * @param Request $request
     * @param $permission
     * @return RedirectResponse
     */
    public function restore(Request $request, $permission)
    {
        Artisan::call('permission:cache-reset');
        try {
            $perm = Permission::withTrashed()->where('name', $permission)->withTrashed()->restore();
            if($perm) {
                return redirect()->back()->with('msg', 'Permission \'s restored successfully!');
            }
            return redirect()->back()->with('error', 'Permission can\'t be restored!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from trash.
     *
     * @param $permission
     * @return RedirectResponse
     */
    public function delete($permission)
    {
        Artisan::call('permission:cache-reset');
        try {
            $perm = Permission::withTrashed()->where('name', $permission)->withTrashed()->forceDelete();
            if($perm) {
                return redirect()->back()->with('msg', 'Permission \'s force deleted successfully!');
            }
            return redirect()->back()->with('error', 'Permission can\'t be force deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
