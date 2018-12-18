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

class CategoryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1|max:255',
            'keywords' => 'nullable|max:150',
            'description' => 'nullable|max:255',
            'parent' => 'required|integer',
            'order' => 'nullable|integer',
            'path' => 'nullable|max:255',
            'type' => 'required|alpha_dash|min:1|max:30',
            'link' => 'nullable|url|unique:category|max:255',
            'template' => 'nullable|alpha_dash|max:255',
        ];
    }

}
