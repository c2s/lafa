<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 *
 *
 * @author   mofei <root@mofei.org>
 *
 *
 * @license   https://opensource.org/licenses/MIT
 *
 * @link     https://github.com/imofei/lafa
 *
 */

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use App\Models\WechatMenu;

class WechatMenuRequest extends Request
{
    public function rules()
    {
        $rules = [
            'type' => 'required|'.Rule::in(['click', 'view', 'media_id', 'view_limited','text','event','content']),
            'name' => 'required|min:1|max:32',
            'group' => 'required|integer',
            'parent' => 'required|integer',
            'order' => 'nullable|integer',
        ];

        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return $rules;
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return $rules;
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if($this->method() == 'POST'){
                if ($this->checkParent()) {
                    $validator->errors()->add('name', '菜单已达上限.');
                }
            }

        });
    }

    /**
     * 限制只能添加二级菜单
     *
     * @author lele.wang <lele.wang@raiing.com>
     * @return bool
     */
    public function checkParent(){
        $maxLimit = $this->parent == 0 ? 3 : 6;

        $count = WechatMenu::where('group',$this->group)->where('parent', $this->parent)->count();

        return $maxLimit <= $count;
    }
}
