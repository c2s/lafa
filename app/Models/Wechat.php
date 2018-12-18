<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use EasyWeChat\Factory;
use App\Events\BehaviorLogEvent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 微信公众号模型
 *
 * Class Wechat
 * @package App\Models
 */
class Wechat extends Model
{
    use SoftDeletes;

    public $table = 'wechat';

    protected $fillable = ['type', 'object_id', 'name', 'account', 'app_id', 'app_secret', 'url', 'token', 'qrcode', 'primary', 'certified'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'name';
    }

    public function app(){

        $config = config('wechat.default');
        $config['app_id'] = $this->app_id;
        $config['secret'] = $this->app_secret;

        return Factory::officialAccount($config);
    }
}
