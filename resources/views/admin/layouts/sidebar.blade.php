   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="../../index3.html" class="brand-link">
           <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light">ЭнергоУчет</span>

       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="{{ asset('assets/admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                       alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">{{ auth()->user()->name }}</a>
               </div>
           </div>

           <!-- SidebarSearch Form -->
           <div class="form-inline">
               <div class="input-group" data-widget="sidebar-search">
                   <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                   <div class="input-group-append">
                       <button class="btn btn-sidebar">
                           <i class="fas fa-search fa-fw"></i>
                       </button>
                   </div>
               </div>
           </div>

           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="true">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   <li class="nav-item">
                       <a href="{{ route('logout') }}" class="nav-link">

                           <i class="nav-icon fas fa-sign-out-alt"></i>

                           <p>
                               Выйти
                           </p>
                       </a>
                   </li>
                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                               Персонал

                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">


                       </ul>
                   </li>
                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-map"></i>
                           <p>
                               Локации
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('areas.index') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Список</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('areas.create') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Создать</p>
                               </a>
                           </li>


                       </ul>
                   </li>
                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-plug"></i>
                           <p>
                               Потребители

                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('consumers.index') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Список</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('consumers.export') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Экспортировать</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('consumers.create') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Импортировать</p>
                               </a>
                           </li>

                       </ul>
                   </li>


               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
