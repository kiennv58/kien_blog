@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Tên slide</label>
                                <input class="form-control" name="name" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="content" rows="3" placeholder="Nhập Tóm tắt"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="" />
                            </div>

                            <div class="form-group">
                                <label>Ảnh </label>
                                <input type="file" name="img" class="form-control">
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