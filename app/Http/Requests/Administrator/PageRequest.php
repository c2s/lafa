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

namespace App\Http\Requests\Administrator;

use Illuminate\Validation\Rule;

class PageRequest extends Request
{
    public function rules()
    {

        return [
            'title' => 'required|min:1|max:191',
            'keywords' => 'nullable|max:191',
            'description' => 'nullable|max:191',
            'author' => 'nullable|max:191',
            'source' => 'nullable|max:191',
            'category_id' => 'nullable|integer',
            'content' => 'required|min:1|max:65535',
            'thumb' => 'nullable|max:191',
            'order' => 'nullable|integer',
            'status' => 'nullable|integer',
            'views' => 'nullable|integer',
            'weight' => 'nullable|integer',
            'top' => 'nullable|'.Rule::in(['0','1']),
            'link' => 'nullable|alpha_dash|unique:article|max:191',
            'template' => 'nullable|alpha_dash|max:191',
        ];

    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
