<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
          class="logo-name">Pradhan House</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown active">
        <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            data-feather="briefcase"></i><span>Widgets</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#">Company Setup</a></li>
          <li><a class="nav-link" href="{{route('category.index')}}">Category Setup</a></li>
          <li><a class="nav-link" href="{{route('product.index')}}">Product Setup</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="printer"></i><span>Orders</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('order.index')}}">Bills</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Apps</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="chat.html">Chat</a></li>
          <li><a class="nav-link" href="portfolio.html">Portfolio</a></li>
          <li><a class="nav-link" href="blog.html">Blog</a></li>
          <li><a class="nav-link" href="calendar.html">Calendar</a></li>
        </ul>
      </li>
    </ul>
  </aside>
