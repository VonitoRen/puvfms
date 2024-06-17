<?php 
    include_once('../../static/session.php');
    session_check('../../index.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php 
      include_once('../sidebar.php');
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php
        include_once('../topbar.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <!-- content-wrapper starts-->
          <div class="content-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add User</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="userLevel">User Level</label>
                                        <select class="form-control" id="userLevel">
                                            <option>Admin</option>
                                            <option>User</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control" id="userAddInputLastname" placeholder="Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control" id="userAddInputFirstname" placeholder="Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="middlename">Middlename</label>
                                        <input type="text" class="form-control" id="userAddInputMiddlename" placeholder="Middlename">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputEmail">Email Address</label>
                                        <input type="email" class="form-control" id="userAddInputEmail" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputPassword">Password</label>
                                        <input type="password" class="form-control" id="userAddInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputGender">Gender</label>
                                        <select class="form-control" id="userAddInputGender">
                                            <option value="" selected disabled>Select your sex:</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Region *</label>
                                        <select name="region" class="form-control form-control-md" id="region"></select>
                                        <input type="hidden" class="form-control form-control-md" name="region_text" id="region-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Province *</label>
                                        <select name="province" class="form-control form-control-md" id="province"></select>
                                        <input type="hidden" class="form-control form-control-md" name="province_text" id="province-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">City / Municipality *</label>
                                        <select name="city" class="form-control form-control-md" id="city"></select>
                                        <input type="hidden" class="form-control form-control-md" name="city_text" id="city-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Barangay *</label>
                                        <select name="barangay" class="form-control form-control-md" id="barangay"></select>
                                        <input type="hidden" class="form-control form-control-md" name="barangay_text" id="barangay-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="street-text" class="form-label">Street (Optional)</label>
                                        <input type="text" class="form-control form-control-md" name="street_text" id="street-text">
                                    </div>                                    

                                    <!-- <div class="form-group">
                                        <label for="userAddInputRegion">Region</label>
                                        <select name="userAddInputRegion" id="userAddInputRegion">
                                        <option value="" selected disabled>Select your region:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputProvince">Province</label>
                                        <select name="userAddInputProvince" id="userAddInputProvince">
                                        <option value="" selected disabled>Select your province:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputCity">City/Municipality</label>
                                        <select name="userAddInputCity" id="userAddInputCity">
                                        <option value="" selected disabled>Select your city/municipality:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputBarangay">City/Municipality</label>
                                        <select name="userAddInputBarangay" id="userAddInputBarangay">
                                        <option value="" selected disabled>Select your barangay:</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Textarea</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                    </div>
                                    <button id="userAddSubmitBtn" class="btn btn-primary mr-2">Submit</button>
                                    <button type="button" class="btn btn-dark">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php 
          include_once('../footer.php');
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../philippine-address-selector-main/ph-address-selector.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>