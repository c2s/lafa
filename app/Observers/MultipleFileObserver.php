<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Observers;

use App\Models\MultipleFile;
use Illuminate\Support\Facades\Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 区块观察者
 *
 * Class BlockObserver
 * @package App\Observers
 */
class MultipleFileObserver
{
    public function creating(MultipleFile $multipleFile)
    {
        /**
         * 修正多文件排序初始值
         */
        if($multipleFile->order < 1){
            $order = MultipleFile::where('multiple_file_table_id',$multipleFile->multiple_file_table_id)
                ->where('multiple_file_table_type', $multipleFile->multiple_file_table_type)
                ->where('field', $multipleFile->field)
                ->count()
            ;
            
            $multipleFile->order = $order;
        }
    }

    
}