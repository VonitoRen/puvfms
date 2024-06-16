<?php 
session_start();
include_once "../../static/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      <?php include_once('../sidebar.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('../topbar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <!-- content-wrapper starts-->
          <div class="content-wrapper">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Add Application Status</h4>

                      <form id="applicationStatusForm" class="forms-sample" method="post">
                        <div class="form-group">
                          <label for="applicationStatusId">Application Status Id</label>
                          <input type="text" class="form-control" id="applicationStatusId" required>
                        </div>
                        <div class="form-group">
                          <label for="applicationStatusName">Application Status</label>
                           <input type="text" id="applicationStatusName" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="applicationStatusDescription">Application Status Description</label>
                          <textarea class="form-control" id="applicationStatusDescription" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" id="addApplicationStatusSubmitBtn">Submit</button>
                        <button type="button" class="btn btn-dark" id="cancelBtn">Cancel</button>
                      </form>
                      <div id="feedback" class="mt-3"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php include_once('../footer.php'); ?>
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
    



<script>
$(document).ready(function() {
  $('#applicationStatusForm').submit(function(e) {
    e.preventDefault(); // Prevent default form submission

    // Serialize form data
    var formData = {
      id: $('#applicationStatusId').val(),
      name: $('#applicationStatusName').val(),
      description: $('#applicationStatusDescription').val()
    };

    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: "../../controller/application_status_management/addApplicationStatus.php", // Update the path
      data: formData,
      dataType: 'json', // Expect JSON response from the server
      success: function(response) {
        // Handle successful response
        $('#feedback').html('<div class="alert alert-success">Data added successfully!</div>');
        $('#applicationStatusForm')[0].reset(); // Reset form
        // Example function to fetch latest ID or perform other actions
        fetchLatestId();
      },
      error: function(xhr, status, error) {
        // Handle error
        console.error(xhr.responseText);
        $('#feedback').html('<div class="alert alert-danger">Error adding data. Please try again.</div>');
      }
    });
  });
});
</script>

<script>
  // Cancel button click handler
  $('#cancelBtn').click(function(e) {
    e.preventDefault();
    $('#applicationStatusForm')[0].reset();
    $('#feedback').empty();
    fetchLatestId();
  });

  database->fetch all record
    -if none (default = 1)
    -if exist(latest 1+1)
    
</script>

  </body>
</html>
