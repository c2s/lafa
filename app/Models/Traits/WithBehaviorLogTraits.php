<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models\Traits;

use App\Events\BehaviorLogEvent;

trait WithBehaviorLogTraits
{
    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    /**
     * 返回记录日志的字段名称
     *
     * @return string
     */
    public function titleName(){
        return 'title';
    }

}
