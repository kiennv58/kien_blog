@extends('front.layouts.index')

@section('content')
<div class="title-top">
	<ol class="breadcrumb">
	  <li><a href="category/{{ $news->news_type->category->id }}">Chuyên mục {{ $news->news_type->category->name }}</a> / <a href="news_type/{{ $news->news_type->id }}">{{ $news->news_type->name }}</a></li>
	</ol>
</div>
<div class="news-detail">
	<div class="title-news">{{ $news->title }}</div>
	<div class="description">
		{{ $news->description }}
	</div>
	<div class="img-news-detail">
		<img src="upload/news/{{ $news->img }}" alt="">
	</div>
	<div class="content-news-detail">
		<p>{{ $news->content }}</p>
	</div>
	<div class="author">
		Người đăng: Nguyễn Văn Kiên
	</div>
</div>
<div class="comment">
	<div class="panel panel-success">
		<div class="panel-heading">Bình luận</div>
		<div class="panel-body">
			@foreach ($comments as $comment)
				<div class="other-comment">
					<div class="user-name">
						{{ $comment->user ? $comment->user->name : 'Người dùng ẩn'}}
					</div>
					<div class="content-comment">{{ $comment->content }}</div>
				</div>
			@endforeach
			<form action="comment/{{ $news->id }}" method="post" class="" accept-charset="utf-8">
				{{ csrf_field() }}
				<input type="hidden" name="user_id" value="{{ $user = isset(Auth::user()->id)? Auth::user()->id : null }}">
				<div class="form-group">
			    <label for="content">Viết bình luận ngay:</label>
			    <textarea class="form-control" rows="3" name="content" id="content"></textarea>
			  	</div>
				<button type="submit" class="btn btn-default">Đăng bình luận</button>
			</form>
		</div>
	</div>
</div>
@endsection()