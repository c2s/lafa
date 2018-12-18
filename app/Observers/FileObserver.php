<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Observers;

use App\Models\File;
use Illuminate\Support\Facades\Auth;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 文件观察者
 *
 * Class FileObserver
 * @package App\Observers
 */
class FileObserver
{
    public function creating(File $file)
    {
        $file->status = '0';
        $file->created_op || $file->created_op = Auth::id();
    }

    public function updating(File $file)
    {
    }

    public function saving(File $file){

    }
}