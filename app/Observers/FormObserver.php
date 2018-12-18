<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Observers;

use Ip;
use Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;


// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

/**
 * 表单观察者
 *
 * Class LinkObserver
 * @package App\Observers
 */
class FormObserver
{
    public function creating(Form $form)
    {
        $ip                 = Request::ip();
        $location           = Ip::find($ip);
        $location           = is_array($location) && !empty($location) ? trim(implode(' ', array_slice($location,0,4))) : '未知';
        
        $form->object_id    = create_object_id();
        $form->user_id      = Auth::id();
        $form->status       = '1';
        $form->ip           = $ip;
        $form->location     = $location;
    
        $form->data = $form->data ?? '{}';
        if( is_array($form->data) ){
            $form->data = json_encode($form->data, JSON_UNESCAPED_UNICODE);
        }
    
    }

    public function updating(Form $form)
    {
    
    }
}