<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Backend;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\Backend\UserRequest;
use App\Handlers\UploadHandler;

/**
 * 用户操作控制器
 *
 * Class UserController
 * @package App\Http\Controllers\Backend
 */
class UserController extends Controller
{
    public function __construct()
    {
        static::$activeNavId = 'system.users';
    }
    
    /**
     * 编辑
     *
     * @param User $user
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return backend_view('user.edit', compact('user'));
    }

    /**
     * 更新
     *
     * @param UserRequest $request
     * @param UploadHandler $uploader
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, UploadHandler $uploader, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->only('name','email','avatar','introduction');
        $user->update($data);

        return redirect()->route('user.edit', $user->id)->with('success', '资料更新成功！');
    }

    /**
     * 密码
     *
     * @param User $user
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function password(User $user){
        $this->authorize('update', $user);

        return backend_view('user.password', compact('user'));
    }

    /**
     * 修改密码
     *
     * @return mixed
     */
    public function showPasswordForm(){
        return backend_view('user.password');
    }

    /**
     * 更新密码
     *
     * @param Request $request
     * @param User $user
     * @return $this
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function passwordRequestForm(Request $request, User $user){
        $this->authorize('update', $user);

        $this->passwordValidator($data = $request->all());

        if( $request->password == $request->old_password ){
            return redirect()->back()->withInput()->withErrors('新密码不可与原密码一致！');
        }

        if( !$this->confirmedOldPassword($user, $request->old_password) ){
            return redirect()->back()->withInput()->withErrors('原密码错误！');
        }

        $user->update(['password'=>$request->password]);
        return redirect()->route('user.edit', $user->id)->with('success', '密码更新成功！');
    }

    /**
     * 更新密码验证
     *
     * @param $data
     */
    protected function passwordValidator($data){
        Validator::make($data, [
            'old_password' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'password.min' => '新密码至少为6位',
            'password.confirmed' => '确认密码与新密码不一致.',
        ])->validate();
    }

    /**
     * 检查原密码是否正确
     *
     * @param User $user
     * @param $old_password
     * @return mixed
     */
    protected function confirmedOldPassword(User $user, $old_password){
        return Hash::check($old_password, $user->password);
    }

}
