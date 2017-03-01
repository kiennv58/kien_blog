<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Kien'Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ isset($category) ? null : 'active' }}"><a href="#">Trang chủ <span class="sr-only">(current)</span></a></li>
        @foreach ( $list_category as $cate )
        <li class="{{ isset($category) && ($category->id == $cate->id) ? 'active' : null }}"><a href="{{ route('category.list', [$cate->id, $cate->cut_name]) }}">{{ $cate->name }}</a></li>
        @endforeach
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (!Auth::check())
          <li><a href="/dangky">Đăng ký</a></li>
          <li><a href="/dangnhap">Đăng nhập</a></li>
        @else
        <li><a href="/admin/category/danhsach">Trang quản trị</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
              <li><a href="#"><i class="fa fa-user fa-fw"></i>Thông tin tài khoản</a>
              </li>
              <li><a href="#"><i class="fa fa-gear fa-fw"></i>Cài đặt</a>
              </li>
              <li class="divider"></li>
              <li><a href="/dangxuat"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
              </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>