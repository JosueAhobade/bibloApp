


@extends('Admin.layouts.app1')

@section('content')
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              
              
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                  <span class="profile-name">Henry Klein</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hello, bienvenue à l'UG!
              </h3>
              <div class="d-flex">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modifier les informations d'un  livre</h4>
                    <p class="card-description">Formulaire de modification de livre </p>
                    <form action="/modif" method="post" class="forms-sample">
                      @csrf
                      
                      <input type="hidden" name="id_livre" value="{{$model->id}}">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Titre du livre</label>
                        <input type="text" value="{{ $model->titre }}" name="titre" class="form-control" id="exampleInputUsername1"  required="" />
                      </div>
                      <div class="form-group">
                        <label for="">Auteur du livre</label>
                        <input type="text" value="{{ $model->auteur }}" name="auteur" class="form-control" id="exampleInputEmail1" required="" />
                      </div>
                      <div class="form-group">
                        <label for="">Date de publication</label>
                        <input type="date" value="{{ $model->date_pub }}" name="date_pub" class="form-control" id="exampleInputPassword1" required="" />
                      </div>
                      <div class="form-group">
                        <label for="">Maison d'édition</label>
                        <input type="text" value="{{ $model->maison_edition }}" name="maison_edition" class="form-control" id=""   required="" />
                      </div>
                      <div class="form-group">
                        <label for="">Langue</label>
                        <input type="text" value="{{ $model->langue }}" name="langue" class="form-control" id=""  required="" />
                      </div>
                      <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" value="{{ $model->description }}" name="description" class="form-control" id=""  required="" />
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2"> Modifier </button>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div> 
          </div>
@endsection          



