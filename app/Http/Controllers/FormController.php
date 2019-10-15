<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-07 9:24
 */

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Models\Form;

/**
 * 表单制器
 *
 * Class PageController
 * @package App\Http\Controllers
 */
class FormController extends Controller
{

    /**
     * 显示表单
     *
     * @param int $navigation
     * @param     $type
     *
     * @return mixed
     */
    public function index( $navigation = 0, $type )
    {
        $form = config('form.structure.' . strtolower($type));
        if(!$form){ abort(404); }
        $template = empty($form['template']) ? '' : '-'.strtolower($form['template']);
        return frontend_view('form.show'.$template, compact('form'));
    }

    /**
     * 表单请求
     *
     * @param FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request){

        $form = Form::create([
            'form' => $request->type,
            'data' => $request->getFormData(),
        ]);

        // 执行表单保存回调
        call_user_func(config('form.structure.'.strtolower($request->type).'.created'), $request, $form);
        // 获取表单跳转信息
        $redirect = config('form.structure.'.strtolower($request->type).'.redirect');
        return redirect()->route($redirect['route'])->with('success', $redirect['message'] );
    }
}
