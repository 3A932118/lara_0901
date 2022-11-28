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
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">標題</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach(range(1, 10) as $id)
            <tr>
                <th scope="row" style="width: 50px">{{ $id }}</th>
                <td>{{ '標題' . $id }}</td>
                <td style="width: 150px">
                    <button type="button" class="btn btn-primary btn-sm">編輯</button>
                    <button type="button" class="btn btn-danger btn-sm">刪除</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
