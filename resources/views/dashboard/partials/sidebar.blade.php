 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}"
                         class="nav-link {{ Request::is('dashboard') ? ' active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MASTER DATA</li>
                 <li class="nav-item">
                     <a href="{{ route('kriteria') }}"
                         class="nav-link {{ Request::is(['kriteria', 'subkriteria/*/view']) ? ' active' : '' }}">
                         <i class="nav-icon fas fa-cube"></i>
                         <p>
                             Kriteria
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('periode') }}" class="nav-link {{ Request::is(['periode']) ? ' active' : '' }}">
                         <i class="nav-icon fas fa-calendar-check"></i>
                         <p>
                             Periode
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('alternatif') }}"
                         class="nav-link {{ Request::is(['alternatif']) ? ' active' : '' }}">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Alternatif
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MAIN DATA</li>
                 <li class="nav-item">
                     <a href="{{ route('perhitungan') }}"
                         class="nav-link {{ Request::is(['perhitungan']) ? ' active' : '' }}">
                         <i class="nav-icon fas fa-divide"></i>
                         <p>
                             Perhitungan(MOORA)
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('perhitungan') }}"
                         class="nav-link {{ Request::is(['perhitungan']) ? ' active' : '' }}">
                         <i class="nav-icon fas fa-file-medical-alt"></i>
                         <p>
                             Hasil Perhitungan
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
