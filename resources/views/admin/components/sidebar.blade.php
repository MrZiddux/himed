<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        {{-- <li class="active">
          <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
        </li> --}}
        <li class="menu-title">Data</li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-cogs"></i>Articles
          </a>
          <ul class="sub-menu children dropdown-menu">
            <li>
              <i class="fa fa-puzzle-piece"></i><a href="{{ route('article.index') }}">All Article</a>
            </li>
            <li>
              <i class="fa fa-puzzle-piece"></i><a href="{{ route('article.create') }}">Create Article</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</aside>