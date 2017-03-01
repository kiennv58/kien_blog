@extends('front.layouts.index')

@section('content')
@include('front.layouts.slide')
<div class="title-top">
	<ol class="breadcrumb">
	  <li><a href="#">{{ $title_top }}</a></li>
	</ol>
</div>
<div class="list-news">
	<ul>
		@foreach ($news as $n)
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
	{{ $news->links() }}
</div>
@endsection()