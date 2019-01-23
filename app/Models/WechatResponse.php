<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use EasyWeChat\Kernel\Messages\Text;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use App\Events\BehaviorLogEvent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 微信响应模型
 *
 * Class WechatResponse
 * @package App\Models
 */
class WechatResponse extends Model
{
    use SoftDeletes;

    public $table = 'wechat_response';
    protected $fillable = [
        'wechat_id',
        'key',
        'group',
        'type',
        'source',
        'content'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'key';
    }

    /**
     * 生成响应内容
     *
     * @return News|Text|null
     */
    public function handle(){
        switch (strtolower($this->type)){
            case 'text':
                $text = new Text(get_json_params($this->content,'text'));
                return $text;
                break;
            case 'link':
                $text = new Text(get_json_params($this->content,'link'));
                return $text;
                break;
            case 'news':
                $items = [];
                $content = is_json($this->content) ? json_decode($this->content) : new \stdClass();
                $category_id = get_value($content, 'category_id', 0);
                $limit = get_value($content, 'limit', 6);
                $results =  Category::find($category_id)->articles()->recent()->offset(0)->limit($limit)->get();
                foreach($results as $article){
                    $items[] = new NewsItem([
                        'title'       => $article->title,
                        'description' => $article->description,
                        'url'         => $article->getLink(),
                        'image'       => $article->getThumb(),
                    ]);
                }

                return new News($items);
                break;
            default:
                return null;
                break;
        }
    }

    /**
     * 默认响应
     *
     * @param $wechat_id
     * @return null
     */
    public static function defaultResponse($wechat_id){
       $response = static::where('wechat_id', $wechat_id)->where('key', 'default')->first();

       return $response ? $response->handle() : null;
    }
}
