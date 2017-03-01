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
            @if (session('note'))
                <div class="col-lg-8">
                    <div class="alert alert-success">{{ session('note') }}</div>
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tắt</th>
                        <th>Ảnh</th>
                        <th>Thể loại</th>
                        <th>Loại tin</th>
                        <th>Lượt xem</th>
                        <th>Nổi bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $news as $n )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $n->id }}</td>
                        <td>{{ $n->title }}</td>
                        <td>{{ $n->description }}</td>
                        @if (file_exists("upload/news/".$n->img)) 
                            <td><img src="upload/news/{{ $n->img }}" width="100px" height="60px" alt=""></td>
                        @else
                            <td>Không có ảnh</td>
                        @endif
                        <td>{{ $n->news_type->category->name }}</td>
                        <td>{{ $n->news_type->name }}</td>
                        <td>{{ $n->view }}</td>
                        <td>{{ $n->high_light }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/xoa/{{ $n->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/sua/{{ $n->id }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection()