@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                        <form action="admin/news_type/sua/{{ $news_type->id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id" >
                                    <option value="" >---Chon---</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}" @if ($cate->id == $news_type->category_id) selected @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>News Type Name</label>
                                <input class="form-control" name="name" placeholder="Hãy nhập tên" value="{{ $news_type->name }}"/>
                            </div>
                            <button type="submit" class="btn btn-default">Lưu</button>
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->
@endsection()