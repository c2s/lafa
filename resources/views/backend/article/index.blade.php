@extends('backend::layouts.app')

@section('title', $title = '内容列表')

@section('breadcrumb')
    <li><a href="javascript:;">内容管理</a></li>
    <li class="active">{{$title}}</li>
@endsection

@section('content')

    @php
        $categoryHandler = app(\App\Handlers\CategoryHandler::class);
        $categorys = $categoryHandler->select($categoryHandler->getCategorys('article'));
        $category_id = request('category', 0);
        $keyword = request('keyword', '');
        $begin_time = request('begin_time', '');
        $end_time = request('end_time', '');
        $type = request('type', 'article');
    @endphp


    <h2 class="header-dividing">{{$title}} <small></small></h2>
    <div class="row">
        <div class="col-md-12">

            <div class="table-tools" style="margin-bottom: 15px;">
                <div class="pull-right" style="width: 250px;">
                    <form class="layui-form" method="GET" action="">
                        <input type="hidden" name="type" value="{{$type}}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="{{$keyword}}" placeholder="关键字">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">搜索</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="tools-group">
                    <a href="{{ route('articles.create') }}?type={{$type}}"  class="btn btn-primary"><i class="icon icon-plus-sign"></i> 添加</a>
                    <button type="submit" class="btn btn-info" form="form-article-list"><i class="icon icon-sort-by-order-alt"></i> 排序</button>
                    <button type="button" class="btn btn-danger articles-destroy-all" form="form-article-list" formaction="{{route('articles.destroy.all')}}"><i class="icon icon-trash"></i> 删除</button>

                </div>
            </div>

            @if($articles->count())

                <form name="form-article-list" id="form-article-list" lay-filter="form-article-list" class="layui-form layui-form-pane2" method="POST" action="{{route('articles.order')}}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="30">
                            <col width="60">
                            <col width="80">
                            <col>
                            <col width="180">
                            <col width="100">
                            <col width="130">
                            <col width="100">
                            <col width="70">
                            <col width="200">
                        </colgroup>
                        <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox"></th>
                            <th class="text-center">#</th>
                            <th class="text-center">排序</th>
                            <th class="text-center">标题</th>
                            <th class="text-center">分类</th>
                            <th class="text-center">作者</th>
                            <th class="text-center">添加时间</th>
                            <th class="text-center">添加人</th>
                            <th class="text-center">状态</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $index => $article)
                            <tr>
                                <td class="text-center">
                                    <input type="hidden" name="id[]" value="{{$article->id}}">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center">{{ $article->id }}</td>
                                <td class="text-center">
                                    <input type="tel" name="order[]" class="form-control text-center" value="{{ $article->order  }}">
                                </td>
                                <td><a href="{{$article->getLink()}}" target="_blank">{{ $article->title  }}</a></td>
                                <td class="text-center">{{ implode('，', $article->categorys->pluck('name')->toArray() ) }}</td>
                                <td class="text-center">{{ $article->author  }}</td>
                                <td class="text-center">{{ $article->created_at->toDateString()}}</td>
                                <td class="text-center">{{ $article->created_user->name}}</td>
                                <td class="text-center">@switch($article->status)
                                        @case(0)<span class="label label-badge">隐藏</span>@break
                                        @case(1)<span class="label label-badge label-success">正常</span>@break
                                        @case(2)<span class="label label-badge label-danger">封禁</span>@break
                                    @endswitch</td>
                                <td class="text-center">
                                    <button type="button" data-type="ajax" data-url="{{ route('articles.multiple.files', [ $article->id, 'images', ]) }}" data-toggle="modal" class="btn btn-xs btn-warning form-multiple-files">多图</button>
                                    <button type="button" data-type="ajax" data-url="{{ route('articles.multiple.files', [ $article->id, 'annex', ]) }}" data-toggle="modal" class="btn btn-xs btn-info form-multiple-files">附件</button>
                                    <a href="{{ route('articles.edit', $article->id) }}?type={{$type}}" class="btn btn-xs btn-primary">编辑</a>
                                    <a href="javascript:;" data-url="{{ route('articles.destroy', $article->id) }}?type={{$type}}" class="btn btn-xs btn-danger form-delete">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>

            <div id="paginate-render">
                {{$articles->links()}}
            </div>
            @else
                <div class="alert alert-info alert-block">暂无数据</div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
    @include('backend::common._upload_chunked_scripts',[])
    @include('backend::layouts._multiple_files',[])
@endsection