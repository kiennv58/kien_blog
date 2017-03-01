@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
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
                    @if (session('note'))
                        <div class="alert alert-success">
                            {{ session('note') }}
                        </div>
                    @endif
                        <form action="admin/news_type/them" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id" >
                                    <option value="">---Chon---</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                            </div>

                            <button type="submit" class="btn btn-default">News Type Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection