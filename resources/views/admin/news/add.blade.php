@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm mới</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-8">
                        @if ( count($errors) > 0 )
                            <div class="alert alert-danger">
                                @foreach ( $errors->all() as $er )
                                    {{ $er }}<br>
                                @endforeach
                            </div>
                        @endif
                        @if ( session('note') )
                            <div class="alert alert-success">{{ session('note') }}</div>
                        @endif
                    </div>
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/news/them" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">---Chon---</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>News Type Name</label>
                                <select class="form-control" name="news_type_id" id="news-type">
                                    <option value="">--- Chọn ---</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Tóm tắt nội dung</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Nhập Tóm tắt"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Nội dung bài viết</label>
                                <textarea class="form-control ckeditor" name="content" rows="4" ></textarea>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tin nóng: </label>
                                <label class="radio-inline">
                                    <input name="high_light" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="high_light" value="2" type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#category").change(function(){
                var categoryId = $(this).val();
                $.get("admin/ajax/news_type/"+categoryId, function(data){
                    $("#news-type").html(data);
                });
            });
        });
    </script>
@endsection