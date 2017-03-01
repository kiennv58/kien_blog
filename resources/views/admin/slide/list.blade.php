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
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Link</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $slides as $slide )
                    <tr class="odd gradeX" align="center">
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->name }}</td>
                        <td>{{ $slide->content }}</td>
                        @if (file_exists("upload/slide/".$slide->img)) 
                            <td><img src="upload/slide/{{ $slide->img }}" width="100px" height="60px" alt=""></td>
                        @else
                            <td>Không có ảnh</td>
                        @endif
                        <td>{{ $slide->link }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{ $slide->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{ $slide->id }}">Edit</a></td>
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