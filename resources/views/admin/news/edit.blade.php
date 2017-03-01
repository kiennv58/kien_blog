@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>List</small>
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
                        <form action="admin/news/sua/{{ $news->id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">---Chon---</option>
                                    @foreach ($category as $cate)
                                        <option value="{{ $cate->id }}" @if ($news->news_type->category->id == $cate->id) {{ "selected" }} @endif>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>News Type Name</label>
                                <select class="form-control" name="news_type_id" id="news-type">
                                    <option value="">--- Chọn ---</option>
                                    @foreach ( $news_type as $nt )
                                        <option value="{{ $nt->id }}" @if ($news->news_type->id == $nt->id) {{ "selected" }} @endif>{{ $nt->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="" value="{{ $news->title }}" />
                            </div>

                            <div class="form-group">
                                <label>Tóm tắt nội dung</label>
                                <textarea class="form-control" name="description" rows="3">{{ $news->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Nội dung bài viết</label>
                                <textarea class="form-control ckeditor" name="content" rows="4" value="" >{{ $news->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh: </label><br>
                                <img src="upload/news/{{ $news->img }}" alt="" width="450px" height="350px" class="img-thumbnail">
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tin nóng: </label>
                                <label class="radio-inline">
                                    <input name="high_light" value="1" @if ($news->high_light == 1) {{ "checked" }} @endif type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="high_light" value="2" @if ($news->high_light == 2) {{ "checked" }} @endif type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Lưu thay đổi</button>
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                    </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection()

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