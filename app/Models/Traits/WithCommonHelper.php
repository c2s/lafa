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
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

/**
 * 模型公共功能方法
 *
 * Trait WithCommonHelper
 * @package App\Models\Traits
 */
trait WithCommonHelper
{

    /**
     * 获取模板
     *
     * @param int $category
     * @return string
     */
    public function getTemplate($category = 0){
        $template = 'show';

        if($this->template){
            $template = $template . '-' . strtolower($this->template);
        }else if( $category && ($category = Category::show($category,'article')) && $category->template ){
            $template = $template . '-' . strtolower($category->template);
        }

        return $template;
    }
    
    /**
     * 获取作者
     *
     * @param $value
     *
     * @return string
     */
    public function getAuthorAttribute($value){
        return empty($value) ? '管理员' : $value;
    }
    

    /**
     * 追加过滤条件
     *
     * @return mixed
     */
    public function scopeValid(){
        return $this->where('status','1');
    }

    /**
     * 追加过滤条件
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
