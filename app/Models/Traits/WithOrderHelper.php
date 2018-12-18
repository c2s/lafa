<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models\Traits;

use Carbon\Carbon;
use Cache;
use DB;

/**
 * 模型公共排序方法
 *
 * Trait WithOrderHelper
 * @package App\Models\Traits
 */
trait WithOrderHelper
{
    /**
     * 追加排序条件
     *
     * @param $query
     * @param string $sortOrder
     * @return mixed
     */
    public function scopeRecent($query, $sortOrder = 'desc')
    {
        return $query->orderBy('id', $sortOrder);
    }

    /**
     * 追加排序条件
     *
     * @param $query
     * @param string $sortOrder
     * @return mixed
     */
    public function scopeOrdered($query, $sortOrder = 'desc')
    {
        return $query->orderBy('order', $sortOrder);
    }

    /**
     * 追加排序条件
     *
     * @param $query
     * @param $sortField
     * @param $sortOrder
     * @return mixed
     */
    public function scopeWithOrder($query, $sortField, $sortOrder)
    {
        $sortField = empty($sortField) ? 'updated_at' : $sortField;
        $sortOrder = in_array($sortOrder, ['asc','desc']) ? 'desc' : $sortOrder;

        return $query->orderBy($sortField, $sortOrder);
    }

}
