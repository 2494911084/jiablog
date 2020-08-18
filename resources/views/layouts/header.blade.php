<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
    <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach ($categories as $item)
            <li class="nav-item">
            <a class="nav-link {{ active_class(if_route('categories.show') && if_route_param('category', $item['id'])) }}" href="{{ route('categories.show', $item['id']) }}">{{ $item['name'] }}</span></a>
            </li>
        @endforeach

      </ul>

      <ul class="navbar-nav mr-right">
        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0" action="{{ route('topics.index') }}" method="post">
                @csrf
                @method('POST')
                <input class="form-control mr-sm-2" name="search" type="search" autocomplete="off"  placeholder="搜索" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
            </form>
        </li>
        <li class="nav-item">
            <a class="btn btn-outline-success my-2 my-sm-0 ml-2" href="{{ url('admin') }}">后台</a>
        </li>
       </ul>
    </div>
    </div>
  </nav>
