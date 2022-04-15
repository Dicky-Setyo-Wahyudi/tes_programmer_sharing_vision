<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Article </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/feather/feather.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/mdi/css/materialdesignicons.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/ti-icons/css/themify-icons.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/typicons/typicons.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendors/css/vendor.bundle.base.css')?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/datatables/css/dataTables.bootstrap4.css')?>">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/vertical-layout-light/style.css')?>">
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>" /> -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title"> Posts </span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Posts')?>"> All Posts </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Add_New')?>"> Add New </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('Preview')?>"> Preview </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <?php
                      $isi_publish  = $this->db->query("SELECT count(Title) AS JUMLAH_PUBLISH FROM posts WHERE Status = 'Publish'")->row_array();
                    ?>
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="true"> Published | <?php echo ($isi_publish['JUMLAH_PUBLISH']) ?> </a>
                    </li>

                    <?php
                      $isi_draft  = $this->db->query("SELECT count(Title) AS JUMLAH_DRAFT FROM posts WHERE Status = 'Draft'")->row_array();
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#draft" role="tab" aria-selected="false">Draft | <?php echo ($isi_draft['JUMLAH_DRAFT']) ?> </a>
                    </li>

                    <?php
                      $isi_trash  = $this->db->query("SELECT count(Title) AS JUMLAH_TRASH FROM posts WHERE Status = 'Trash'")->row_array();
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#trashed" role="tab" aria-selected="false">Trash | <?php echo ($isi_trash['JUMLAH_TRASH']) ?> </a>
                    </li>
                  </ul>
                </div>

                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="main-panel">
                          <div class="content-wrapper">
                            <div class="row">
                              <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title"> Article Published </h4>
                                    <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                            <tr>
                                              <th> No </th>
                                              <th> Title </th>
                                              <th> Category </th>
                                              <th> Aksi  </th>
                                            </tr>
                                          </thead>
                                        
                                          <tbody>
                                              <?php
                                                $no = 0;
                                                foreach ($lstPublish as $publish) 
                                                  {
                                                    $no++;
                                              ?>

                                                <tr>
                                                    <td> <?php echo $no ?> </td>
                                                    <td> <?php echo $publish->Title ?> </td>
                                                    <td> <?php echo $publish->Category ?> </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo base_url() .'Posts/edit_article/'.$publish->Id?>"><i class="mdi mdi-grease-pencil"></i></a>
                                                        <a class="btn btn-danger" href="<?php echo base_url() .'Posts/hapus_article/'.$publish->Id?>"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                              <?php } ?>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade show active" id="draft" role="tabpanel" aria-labelledby="draft"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="main-panel">
                          <div class="content-wrapper">
                            <div class="row">
                              <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title"> Article Draft </h4>
                                    <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                            <tr>
                                              <th> No </th>
                                              <th> Title </th>
                                              <th> Category </th>
                                              <th> Aksi  </th>
                                            </tr>
                                          </thead>
                                        
                                          <tbody>
                                              <?php
                                                $no = 0;
                                                foreach ($lstDraft as $draft) 
                                                  {
                                                    $no++
                                              ?>

                                                <tr>
                                                    <td> <?php echo $no ?> </td>
                                                    <td> <?php echo $draft->Title ?> </td>
                                                    <td> <?php echo $draft->Category ?> </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo base_url() .'Posts/edit_article/'.$draft->Id?>"><i class="mdi mdi-grease-pencil"></i></a>
                                                        <a class="btn btn-danger" href="<?php echo base_url() .'Posts/hapus_article/'.$draft->Id?>"><i class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>

                                              <?php } ?>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade show active" id="trashed" role="tabpanel" aria-labelledby="trashed"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="main-panel">
                          <div class="content-wrapper">
                            <div class="row">
                              <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                  <div class="card-body">
                                    <h4 class="card-title"> Article Trashed </h4>
                                    <div class="table-responsive">
                                      <table class="table">
                                          <thead>
                                            <tr>
                                              <th> No </th>
                                              <th> Title </th>
                                              <th> Category </th>
                                              <th> Aksi  </th>
                                            </tr>
                                          </thead>
                                        
                                          <tbody>
                                              <?php
                                                $no = 0;
                                                foreach ($lstTrash as $trash) 
                                                  {
                                                    $no++
                                              ?>

                                                <tr>
                                                    <td> <?php echo $no ?> </td>
                                                    <td> <?php echo $trash->Title ?> </td>
                                                    <td> <?php echo $trash->Category ?> </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="<?php echo base_url() .'Posts/edit_article/'.$trash->Id?>"><i class="mdi mdi-grease-pencil"></i></a> 
                                                    </td>
                                                </tr>

                                              <?php } ?>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js')?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?php echo base_url('assets/vendors/progressbar.js/progressbar.min.js')?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url('assets/js/off-canvas.js')?>"></script>
  <script src="<?php echo base_url('assets/js/hoverable-collapse.js')?>"></script>
  <script src="<?php echo base_url('assets/js/template.js')?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js')?>"></script>
  <script src="<?php echo base_url('assets/js/todolist.js')?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url('assets/js/jquery.cookie.js')?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>
  <script src="<?php echo base_url('assets/js/Chart.roundedBarCharts.js')?>"></script>
  <!-- End custom js for this page-->

  <!-- Data Tables -->
  <script src="<?php echo base_url('assets/vendors/datatables/js/datatables.min.js')?>"></script>
</body>

</html>

