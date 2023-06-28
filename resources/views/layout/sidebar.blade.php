<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Pla<span>nner</span>
    </a>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category" style="text-align: center;">Admin Panel</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item {{ active_class(['user']) }}">
        <a href="{{ route('user') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">User</span>
        </a>
      </li>

      <li class="nav-item {{ active_class(['category']) }}">
        <a href="{{ route('category.index') }}" class="nav-link">
          <i class="link-icon" data-feather="codepen"></i>
          <span class="link-title">Event Categories</span>
        </a>
      </li>

      <li class="nav-item {{ active_class(['category-listing-index']) }}">
        <a href="{{ route('category.listing.index') }}" class="nav-link">
          <i class="link-icon" data-feather="list"></i>
          <span class="link-title">Product</span>
        </a>
      </li>

      <li class="nav-item {{ active_class(['trending']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#advanced-ui" role="button" aria-expanded="{{ is_active_route(['trending']) }}" aria-controls="advanced-ui">
          <i class="link-icon" data-feather="anchor"></i>
          <span class="link-title">Home Screen</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['trending' ]) }}" id="advanced-ui">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('trending.index') }}" class="nav-link {{ active_class(['trending']) }}">Trending</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('banner.index') }}" class="nav-link {{ active_class(['banner']) }}">Banner</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ active_class(['create-invition']) }}">
          <a href="{{ route('create.invition.index') }}" class="nav-link">
            <i class="link-icon" data-feather="maximize"></i>
            <span class="link-title">Create Invitation</span>
          </a>
      </li>

      <li class="nav-item {{ active_class(['subscription']) }}">
          <a href="{{ route('subscription.index') }}" class="nav-link">
            <i class="link-icon" data-feather="layers"></i>
            <span class="link-title">Subscription</span>
          </a>
      </li>

      <li class="nav-item {{ active_class(['faq']) }}">
          <a href="{{ route('faq.index') }}" class="nav-link">
            <i class="link-icon" data-feather="file-text"></i>
            <span class="link-title">FAQ</span>
          </a>
      </li>

      <li class="nav-item {{ active_class(['tables/*']) }}">
        <a href="{{ route('logout') }}" class="nav-link">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Logout</span>
        </a>
      </li>

    </ul>
  </div>
</nav>
