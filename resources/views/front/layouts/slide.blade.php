<div id="slider">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    @foreach ($slides as $slide)
	    <div class="item @if ($slide == $slides->first()) active @endif">
	      <img src="upload/slide/{{ $slide->img }}" alt="...">
	      <div class="carousel-caption">
	        {{ $slide->content }}
	      </div>
	    </div>
	  	@endforeach
	  </div>

	</div>
</div>