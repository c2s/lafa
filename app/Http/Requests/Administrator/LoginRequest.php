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

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:6'],
            'captcha' => ['required','captcha'],
        ];
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
