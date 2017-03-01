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
                        <form action="admin/news/them" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Tên slide</label>
                                <input class="form-control" name="name" value="{{ $slide->name }}" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Nhập Tóm tắt">{{ $slide->content }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" value="{{ $slide->link }}" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Ảnh </label><br>
                                @if (file_exists("upload/slide/" . $slide->img))
                                <img src="upload/slide/{{ $slide->img }}" alt="" width="450px" height="350px" class="img-thumbnail">
                                @else
                                    <p>Chưa có ảnh</p><br>
                                @endif
                                <input type="file" name="img" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
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