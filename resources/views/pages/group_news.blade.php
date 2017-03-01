@extends('front.layouts.index')

@section('content')
<div class="title-top">
	<ol class="breadcrumb">
	@if (isset($news_type))
	  <li>Danh sách bài viết thuộc chủ đề <a href="{{ route('category.list', [$news_type->category->id, $news_type->category->cut_name]) }}"> {{ $news_type->category->name }} </a> / <a href="{{ route('news_type.list', [$news_type->id, $news_type->cut_name]) }}">{{ $news_type->name }}</a></li>
	@else
		<li>Danh sách bài viết thuộc chủ đề <a href="">{{ $category->name }} </a></li>
	@endif
	</ol>
</div>
<div class="list-news">
	<ul>
		@foreach ($list_news as $n)
		<li class="col-md-6">
			<div class="img-news"><img src="upload/news/{{ $n->img }}" alt=""></div>
			<h3>
				<a href="{{ route('news_type.list', [$n->news_type->id, $n->news_type->cut_name]) }}" title="" class="cate-title">[{{ $n->news_type->name }}]</a>
				<a href="{{ route('news.detail',[$n->id, $n->cut_title]) }}" class="news-title">{{ $n->title }}</a>
			</h3>
		</li>
		@endforeach
	</ul>
</div>
<div class="paginator">
	{{ $list_news->links() }}
</div>
@endsection()