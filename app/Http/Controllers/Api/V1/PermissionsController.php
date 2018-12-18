<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-19 18:08
 */

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Transformers\PermissionTransformer;

/**
 * 权限控制器
 *
 * Class PermissionsController
 * @package App\Http\Controllers\Api\V1
 */
class PermissionsController extends Controller
{
    /**
     * 列表
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $permissions = $this->user()->getAllPermissions();

        return $this->response->collection($permissions, new PermissionTransformer());
    }
}
