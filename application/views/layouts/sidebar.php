<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bend Kas</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item" id="nav-dashboard">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Navigasi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item" id="nav-kas">
        <a class="nav-link collapsed" href="<?php echo site_url('kas') ?>">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Kas</span>
        </a>
      </li>

      <li class="nav-item" id="nav-income">
        <a class="nav-link collapsed" href="<?php echo site_url('income') ?>">
          <i class="fas fa-fw fa-money-check-alt"></i>
          <span>Pemasukan</span>
        </a>
      </li>

      <li class="nav-item" id="nav-spending">
        <a class="nav-link collapsed" href="<?php echo site_url('spending') ?>">
          <i class="fas fa-fw fa-money-check-alt"></i>
          <span>Pengeluaran</span>
        </a>
      </li>

      <li class="nav-item" id="nav-collection">
        <a class="nav-link collapsed" href="<?php echo site_url('collection') ?>">
          <i class="fas fa-fw fa-money-check-alt"></i>
          <span>Penarikan</span>
        </a>
      </li>

      <li class="nav-item" id="nav-schedule">
        <a class="nav-link collapsed" href="<?php echo site_url('schedule') ?>">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Jadwal</span>
        </a>
      </li>

      <li class="nav-item" id="nav-user">
        <a class="nav-link collapsed" href="<?php echo site_url('user') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>User</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->