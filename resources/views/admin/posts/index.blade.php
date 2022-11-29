@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">文章管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">文章一覽表</li>
    </ol>
    <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
        <strong>完成！</strong> 成功儲存文章
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('admin.posts.create') }}">新增</a>
        <!--用來串接AdminPostsController的create()方法，以便回傳新增貼文的表單，表單定義在create.blade.php。-->
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" style="text-align: left">標題</th>
            <th scope="col" style="text-align: right">精選?</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td style="text-align: right">{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td style="text-align: right">{{($post->is_feature)? 'v' : 'x'}}</td>
                <td>
                    <!-- route('admin.posts.edit',$post->id) 此超連結路由是練習6的起始路由，用來叫出某一貼文，以便進行修改。-->
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit', $post->id)}}">編輯</a>
                    /
                    <a href="#">刪除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
