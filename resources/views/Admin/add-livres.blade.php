@extends('Admin.layouts.app')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>AJOUT DES LIVRES</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">

                  <div class="x_content">


                    <!-- Smart Wizard -->

                    <div id="wizard" class="form_wizard wizard_horizontal">

                      <div id="step-1">
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="/add-books">
                            @csrf
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nom  du livre <span class="required" style="color: red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="name" id="first-name" required="required" class="form-control  ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Auteur du livre <span class="required" style="color: red">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" name="auteur" id="last-name" name="last-name" required="required" class="form-control ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Date de parution</label>
                            <div class="col-md-6 col-sm-6 ">
                              <input id="middle-name" name="date_parution" class="form-control col" type="date" name="middle-name">
                            </div>
                          </div>
                                <br>

                          <button class="btn-success  col-md-6 col-sm-6 offset-5" style="width:120px " type="submit">Ajouter</button>

                        </form>

                      </div>



                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection