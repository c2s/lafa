<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-02-01 23:18
 */

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\WithCommonHelper;
use App\Events\BehaviorLogEvent;

/**
 * 文章模型
 *
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    use SoftDeletes;
    use WithCommonHelper;
    use Searchable;

    public $dispatchesEvents  = [
        'saved' => BehaviorLogEvent::class,
    ];

    public function titleName(){
        return 'title';
    }

    public $asYouType = true;

    protected $fillable = [
         'id','object_id', 'alias','title', 'subtitle', 'keywords', 'description', 'author', 'source', 'order', 'content', 'attribute', 'thumb', 'type', 'is_link','link', 'template', 'status', 'views', 'reply_count', 'weight', 'css', 'js', 'top', 'created_op', 'updated_op',
    ];
    
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }


    public function user(){
        return $this->created_user();
    }

    public function created_user(){
        return $this->belongsTo('App\Models\User', 'created_op');
    }

    public function updated_user(){
        return $this->belongsTo('App\Models\User', 'updated_op');
    }

    public function filterWith($type = 'article'){
        return $this->where('type', $type)->with(['created_user','updated_user']);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * 获取多图
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images(){
        return $this->multiple_files();
    }

    /**
     * 获取附件
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function annex(){
        return $this->multiple_files();
    }

    /**
     * 多对多多态关联
     *
     * @return MorphToMany
     */
    public function category(): MorphToMany
    {
        return $this->morphToMany(
            'App\Models\Category',
            'model',
            'model_has_category',
            'model_id',
            'category_id'
        );
    }

    /**
     * 多对多
     *
     * @return BelongsToMany
     */
    public function categorys(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Category',
            'article_category',
            'article_id',
            'category_id'
        );
    }

    public function giveCategoryTo(...$categorys)
    {
        $categorys = collect($categorys)
            ->flatten()
            ->map(function ($category) {
                return $this->getStoredCategory($category);
            })
            ->each(function ($category) {
                $this->ensureModelSharesArticle($category);
            })
            ->all();

        $this->categorys()->saveMany($categorys);

        return $this;
    }


    public function syncCategory(...$categorys)
    {
        $this->categorys()->detach();

        return $this->giveCategoryTo($categorys);
    }

    protected function getStoredCategory($categorys)
    {
        if (is_string($categorys) || is_int($categorys)) {
            return app(Category::class)->find(intval($categorys));
        }

        if (is_array($categorys)) {
            return app(Category::class)
                ->whereIn('id', $categorys)
                ->get();
        }

        return $categorys;
    }

    protected function ensureModelSharesArticle($category)
    {
        if (! $category) {
            abort(401);
        }
    }

    /**
     * 生成文章链接
     *
     * @param int $navigation_id
     * @param int $category_id
     * @return string
     */
    public function getLink($navigation_id = 0, $category_id = 0){
        if($this->is_link == 1 && !empty($this->link)){
            return $this->link;
        }
        return route('article.show',[$navigation_id, $category_id, $this->id]);
    }

    /**
     * 复写获取属性方法，扩展自定义复合属性
     *
     * @param string $key
     * @return mixed|null
     */
    public function getAttribute($key){

        $value = parent::getAttribute($key);
        
        $attribute = parent::getAttribute('attribute');
        
        if(is_array($attribute)){
            $attribute = empty($attribute) ? new \stdClass() : $attribute;
        }else if( is_string( $attribute ) ){
            $attribute = empty($attribute) ? new \stdClass() : json_decode($attribute, true);
        }
        
        if( $key !== $value && is_array($attribute) && array_key_exists($key, $attribute)){
            $value = $attribute[$key] ?? null;
        }

        return $value;
    }
    
    /**
     * 清除缓存
     *
     * @param $id
     *
     * @return bool
     */
    public static function clearCache($id){
        $id = intval($id);
    
        $key = 'article_active_cache_'.$id;
    
        \Cache::forget($key);
        
        return true;
    }

    /**
     * 前台获取文章详情
     *
     * @param $id
     * @return mixed
     */
    public static function show( $id ){
        $id = intval($id);

        $key = 'article_active_cache_'.$id;

        $article = \Cache::get($key);

        if( \App::environment('production') && $article ){
            return $article;
        }

        $article = static::where('id', $id)->where('type','article')->active()->first();

        if(\App::environment('production')){
            $expiredAt = now()->addMinutes(config('cache.expired.article', 10));
            \Cache::put($key, $article, $expiredAt);
        }

        return $article;
    }

}
