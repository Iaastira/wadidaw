<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('default-avatar.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="{{ (!Request::segment(2) ? 'treeview active' : '')}}">
          <a href="{{ route('home') }}">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>

          @guest
        {{-- - --}}
             @else
        @role('Admin')
        <li class="{{ ( Request::segment(2) == 'article' || Request::segment(2) == 'category' || Request::segment(2) == 'tag') ? 'active treeview menu-open' : 'treeview' }}">
          <a href="#">
            <i class="fa fa-globe"></i>
            <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (Request::segment(2) == 'article') ? 'active' : '' }}"><a href="{{ route('article.index') }}"><i class="fa fa-circle-o"></i>Articles</a></li>
            <li class="{{ (Request::segment(2) == 'category') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>Categories</a></li>
            <li class="{{ (Request::segment(2) == 'tag') ? 'active' : '' }}"><a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
          </ul>
        </li>
        <li class="{{ (Request::segment(2) == 'service') ? 'treeview active' : ''}}">
          <a href="{{ route('service.index') }}">
            <i class="fa fa-cogs"></i> <span>Services</span>
          </a>
        </li>

        <li class="{{ (Request::segment(2) == 'gallery') ? 'treeview active' : ''}}">
          <a href="{{ route('gallery.index') }}">
            <i class="fa fa-camera"></i> <span>Gallery</span>
          </a>
        </li>

        <li class="{{ (Request::segment(2) == 'about') ? 'treeview active' : ''}}">
          <a href="{{ route('about.index') }}">
            <i class="fa fa-info-circle"></i> <span>About</span>
          </a>
        </li>
        <li class="{{ (Request::segment(2) == 'user') ? 'treeview active' : ''}}">
          <a href="{{ route('user.index') }}">
            <i class="fa fa-cog"></i> <span>Manage User</span>
          </a>
        </li>
        @endrole

         @role('Member')
             <li class="{{ ( Request::segment(2) == 'article' || Request::segment(2) == 'category' || Request::segment(2) == 'tag') ? 'active treeview menu-open' : 'treeview' }}">
              <a href="#">
                <i class="fa fa-globe"></i>
                <span>Blog</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ (Request::segment(2) == 'article') ? 'active' : '' }}"><a href="/article"><i class="fa fa-circle-o"></i>Articles</a></li>
                <li class="{{ (Request::segment(2) == 'category') ? 'active' : '' }}"><a href="/category"><i class="fa fa-circle-o"></i>Categories</a></li>
                <li class="{{ (Request::segment(2) == 'tag') ? 'active' : '' }}"><a href="/tag"><i class="fa fa-circle-o"></i>Tags</a></li>
              </ul>
            </li>
            @endrole
          @endguest
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>  