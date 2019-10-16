<?php
/**
 * LaFa - A Laravel Fast Development Framework For Web Artisans
 *
 * @author   mofei <root@mofei.org>
 * @link     https://github.com/imofei/lafa
 * @date     2018-06-07 9:24
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * 首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index()
	{
		$projects = Project::paginate();
		return view('projects.index', compact('projects'));
	}

    /**
     * 详情
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * 创建
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create(Project $project)
	{
		return view('projects.create_and_edit', compact('project'));
	}

    /**
     * 保存
     *
     * @param ProjectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(ProjectRequest $request)
	{
		$project = Project::create($request->all());
		return redirect()->route('projects.show', $project->id)->with('message', 'Created successfully.');
	}

    /**
     * 编辑
     *
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function edit(Project $project)
	{
        $this->authorize('update', $project);
		return view('projects.create_and_edit', compact('project'));
	}

    /**
     * 更新
     *
     * @param ProjectRequest $request
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
	public function update(ProjectRequest $request, Project $project)
	{
		$this->authorize('update', $project);
		$project->update($request->all());
		return redirect()->route('projects.show', $project->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Project $project)
	{
		$this->authorize('destroy', $project);
		$project->delete();
		return redirect()->route('projects.index')->with('message', 'Deleted successfully.');
	}
}
