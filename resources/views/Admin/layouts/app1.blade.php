<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>UG | Admin </title>
    <link rel="stylesheet" href="/../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="/../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="/../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="/../assets/css/style.css" />
    <link rel="icon"  href="img/logo2.ico"/>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="http://localhost:8000/index"> <img src="img/logo2.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="http://localhost:8000/index"><img src="img/mini_logo.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">Administrateur</span>
                <span class="font-weight-normal">{{ Auth()->user()->nom }}  {{ Auth()->user()->prenom }}</span>
              </div>
             
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/index">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Tableau de board</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/utilisateurs">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Utilisateurs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Suivi livres</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link" href="/pret">En prêt</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/disponible">Disponible</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/ajout-livre">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Ajouts</span>
            </a>
          </li>
          
          
          
          
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                
                <ul class="mt-4 pl-0">
                  <li>  <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>

      @yield('content')

      <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © UG 2023</span>
              
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>