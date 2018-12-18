<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-05-02 18:08
 */

namespace App\Http\Controllers\Administrator;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Requests\Administrator\SlideRequest;

/**
 * 幻灯片控制器
 *
 * Class SlidesController
 * @package App\Http\Controllers\Administrator
 */
class SlidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        static::$activeNavId = 'content.slide';
    }

    /**
     * 列表
     *
     * @param Request $request
     * @param Slide $slide
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function index(Request $request, Slide $slide)
	{
        $this->authorize('index', $slide);

		$slides = collect(config('slides'));

		return backend_view('slides.index', compact('slides'));
	}

    /**
     * 管理
     *
     * @param $group
     * @param Request $request
     * @param Slide $slide
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function manage($group, Request $request, Slide $slide){
        $this->authorize('manage', $slide);

        $slideConfig = $this->checkGroup($group);
        $slides = $slide->where('group',$group)->ordered()->recent()->paginate((config('administrator.paginate.limit')));

        return backend_view('slides.manage', compact('slides','slideConfig', 'group'));
    }

    /**
     * 创建
     *
     * @param $group
     * @param Slide $slide
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function create($group, Slide $slide)
	{
        $this->authorize('create', $slide);

        $slideConfig = $this->checkGroup($group);

		return backend_view('slides.create_and_edit', compact('slide','slideConfig', 'group'));
	}

    /**
     * 保存
     *
     * @param SlideRequest $request
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function store(SlideRequest $request, Slide $slide)
	{
        $this->authorize('create', $slide);

		$slide = Slide::create($request->all());

		return $this->redirect('slides.manage', $slide->group)->with('success', '添加成功.');
	}

    /**
     * 编辑
     *
     * @param Slide $slide
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function edit(Slide $slide)
	{
        $this->authorize('update', $slide);

        $group = $slide->group;
        $slideConfig = $this->checkGroup($group);

        return backend_view('slides.create_and_edit', compact('slide','slideConfig', 'group'));
	}

    /**
     * 更新
     *
     * @param SlideRequest $request
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function update(SlideRequest $request, Slide $slide)
	{
		$this->authorize('update', $slide);

		$slide->update($request->all());

		return $this->redirect('slides.manage', $slide->group)->with('success', '更新成功.');
	}

    /**
     * 删除
     *
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function destroy(Slide $slide)
	{
        $this->authorize('destroy', $slide);

        $group = $slide->group;
		$slide->delete();

		return $this->redirect()->with('success', '删除成功.');
	}

    /**
     * 检查分组
     *
     * @param $group
     * @return \Illuminate\Config\Repository|mixed
     */
	private function checkGroup($group){
        if( !($slideConfig = config('slides.'.$group)) ){
            abort(404);
        }

        return $slideConfig;
    }
}