<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-07 9:24
 */

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use Auth;

/**
 * 回复控制器
 *
 * Class RepliesController
 * @package App\Http\Controllers
 */
class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 保存
     *
     * @param ReplyRequest $request
     * @param Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->content = $request->input('content');
        $reply->user_id = Auth::id();
        $reply->article_id = $request->article_id;
        $reply->save();

        return redirect()->to($reply->article->getLink())->with('sucess', '回复创建成功！');
    }

    /**
     * 删除
     *
     * @param Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);

        $reply->delete();

        return redirect()->to($reply->article->getLink())->with('success', '成功删除回复！');
    }
}