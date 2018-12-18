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

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            // CREATE
            case 'POST':
                {
                    return [
                        'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
                        'email' => 'required|email|unique:users,email',
                        'introduction' => 'max:80',
                        'avatar' => 'max:150',
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . $this->user->id,
                        'email' => 'required|email|unique:users,email,' . $this->user->id,
                        'introduction' => 'max:80',
                        'avatar' => 'max:150',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                };
        }
    }
}
