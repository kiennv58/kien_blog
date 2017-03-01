@extends('admin.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-md-8">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                </div>
                @endif
                @if (session('note'))
                    <div class="alert alert-success">{{ session('note') }}</div>
                @endif
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Link</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($news_types as $news_type)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $news_type->id }}</td>
                        <td>{{ $news_type->name }}</td>
                        <td>{{ $news_type->category->name }}</td>
                        <td>{{ $news_type->cut_name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news_type/xoa/{{ $news_type->id }}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news_type/sua/{{ $news_type->id }}">Edit</a></td>
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