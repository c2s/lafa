<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * 权限控制器
 *
 * Class PermissionsController
 * @package App\Http\Controllers\Administrator
 */
class PermissionsController extends Controller
{
    public function __construct()
    {
        static::$activeNavId = 'system.permissions';
    }
    
    /**
     * 列表
     *
     * @param Request $request
     * @param Permission $permission
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Request $request, Permission $permission)
    {
        $this->authorize('index', $permission);
        $permissions = $permission->paginate(config('administrator.paginate.limit'));
        return backend_view('permissions.index', compact('permissions'));
    }

    /**
     * 详情
     *
     * @param Permission $permission
     * @return mixed
     */
    public function show(Permission $permission)
    {
        return backend_view('permissions.show', compact('permission'));
    }

    /**
     * 创建
     *
     * @param Permission $permission
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Permission $permission)
    {
        $this->authorize('create', $permission);
        return backend_view('permissions.create_and_edit', compact('permission'));
    }

    /**
     * 保存
     *
     * @param Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Permission $permission)
    {
        $this->authorize('create', $permission);
        $user = Permission::create($request->only(['name','remarks']));
        return $this->redirect('permissions.index')->with('success', '添加成功.');
    }

    /**
     * 编辑
     *
     * @param Permission $permission
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);

        return backend_view('permissions.create_and_edit', compact('permission'));
    }

    /**
     * 更新
     *
     * @param Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);

        $permission->update($request->only(['name','remarks']));

        return $this->redirect('permissions.index')->with('success', '更新成功.');
    }

    /**
     * 删除
     *
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Permission $permission)
    {
        $this->authorize('destroy', $permission);

        $permission->delete();

        return $this->redirect()->with('success', '删除成功.');
    }
}
