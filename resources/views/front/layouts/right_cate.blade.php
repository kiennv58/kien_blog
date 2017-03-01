<div class="right-cate">
						<div class="most-view">
							<div class="title-column">
								<a href="#" >xem nhiều</a>
							</div>
							<ul class="list-item">
								@foreach ($top_view as $news)
								<li>
									<a href="{{ route('news.detail', [$news->id, $news->cut_title]) }}" title="">
									<img src="upload/news/{{ $news->img }}" alt="">
									<p>{{ $news->title }}</p>
									</a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="most-view">
							<div class="title-column">
								<a href="#" >bình luận mới</a>
							</div>
							<ul class="list-item">
								@foreach ($top_comment as $comment)
								<li>
									<a href="{{ route('news.detail', [$comment->news->id, $comment->news->cut_title]) }}" title="">
									<img src="upload/news/{{ $comment->news->img }}" alt="">
									<p>{{ $comment->news->title }}</p>
									</a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="most-view">
							<div class="title-column">
								<a href="#" >Có thể bạn thích?</a>
							</div>
							<ul class="list-item">
								<li>
									<a href="#" title="">
									<img src="img/news1.jpg" alt="">
									<p>Vẻ đẹp của trường Đại học Quốc gia HN</p>
									</a>
								</li>
								<li>
									<a href="#" title="">
									<img src="img/news1.jpg" alt="">
									<p>Vẻ đẹp của trường Đại học Quốc gia HN</p>
									</a>
								</li>
								<li>
									<a href="#" title="">
									<img src="img/news1.jpg" alt="">
									<p>Vẻ đẹp của trường Đại học Quốc gia HN</p>
									</a>
								</li>
							</ul>
						</div>
</div>