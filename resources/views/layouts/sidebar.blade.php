<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->routeIs('dashboard') ? "active" : "" }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-house-user"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <div class="sidebar-heading">
    Gerenciamento
  </div>

  <li class="nav-item {{ request()->routeIs('income-*') || request()->routeIs('income.*') ? "active" : "" }}">
    <a class="nav-link" href="{{ route('income.index') }}">
      <i class="fas fa-fw fa-money-bill-wave"></i>
      <span>Ingresos</span></a>
  </li>

  <li class="nav-item {{ request()->routeIs('expense-*') || request()->routeIs('expense.*') ? "active" : "" }}">
    <a class="nav-link" href="{{ route('expense.index') }}">
      <i class="fas fa-fw fa-money-bill"></i>
      <span>Egresos</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block mt-4">

  <li class="nav-item {{ request()->routeIs('profile') ? "active" : "" }}">
    <a class="nav-link" href="{{ route('profile') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Perfil</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block mt-4">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>