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

class WechatResponseRequest extends Request
{
    public function rules()
    {
        return [
            // CREATE ROLES
            'wechat_id' => 'required|integer',
            'type' => 'required|'.Rule::in(['text','link','news']),
            'key' => 'required|min:1|max:128',
            'group' => 'required|string|min:1|max:128',
            'content' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
