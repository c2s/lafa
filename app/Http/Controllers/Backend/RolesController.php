<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * 角色控制器
 *
 * Class RolesController
 * @package App\Http\Controllers\Backend
 */
class RolesController extends Controller
{
    public function __construct()
    {
        static::$activeNavId = 'system.roles';
    }

    /**
     * 列表
     *
     * @param Request $request
     * @param Role $role
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request, Role $role)
    {
        $this->authorize('index', $role);
        $roles = $role->paginate(config('admin.paginate.limit'));
        return backend_view('roles.index', compact('roles'));
    }

    /**
     * 详情
     *
     * @param Role $role
     * @return mixed
     */
    public function show(Role $role)
    {
        return backend_view('roles.show', compact('role'));
    }

    /**
     * 创建
     *
     * @param Role $role
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Role $role)
    {
        $this->authorize('create', $role);

        $permissions = Permission::get()->pluck('name','remarks');
        $rolePermissions = [];

        return backend_view('roles.create_and_edit', compact('role','permissions','rolePermissions'));
    }

    /**
     * 保存
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Role $role)
    {
        $this->authorize('create', $role);

        $role = Role::create($request->only(['name','remarks']));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);

        return $this->redirect('roles.index')->with('success', '添加成功.');
    }

    /**
     * 编辑
     *
     * @param Role $role
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        $permissions = Permission::get()->pluck('name','remarks')->toArray();
        $rolePermissions = $role->permissions()->pluck('name', 'name')->toArray();

        return backend_view('roles.create_and_edit', compact('role','permissions', 'rolePermissions'));
    }

    /**
     * 更新
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', $role);
        $role->update($request->only(['name','remarks']));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return $this->redirect('roles.index')->with('success', '更新成功.');
    }

    /**
     * 删除
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Role $role)
    {
        $this->authorize('destroy', $role);
        $role->delete();
        return $this->redirect()->with('success', '删除成功.');
    }
}
