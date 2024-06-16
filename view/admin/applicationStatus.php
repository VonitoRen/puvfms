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
                          <input type="text" class="form-control form-control-application-status form" name="applicationStatusId" id="applicationStatusId">
                        </div>
                        <div class="form-group">
                          <label for="applicationStatusName">Application Status</label>
                           <input type="text" id="applicationStatusName" name ="applicationStatusName" class="form-control form-control-application-status">
                        </div>
                        <div class="form-group">
                          <label for="applicationStatusDescription">Application Status Description</label>
                          <textarea class="form-control form-control-application-status" name ="applicationStatusDescription" id="applicationStatusDescription" rows="4"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" id="addApplicationStatusSubmitBtn">Submit</button>
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
  
  $('#applicationStatusId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/application_status_management/generateApplicationStatusId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#applicationStatusId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function addDocumentApplicationStatus(){
    $.ajax({
      url: "../../controller/application_status_management/addApplicationStatus.php",
      type: "POST",
      data:{
        applicationStatusId: $('#applicationStatusId').val().trim(),
        applicationStatusName: $('#applicationStatusName').val().trim(),
        applicationStatusDescription: $('#applicationStatusDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response);
        if(response.status === "success"){
          generateId();
          $('#applicationStatusName').val("");
          $('#applicationStatusDescription').val("");
          alert("NAIDAGDAG ANG APP STATUS")
        }
   
      },
      error: function(xhr, status, error){
        console.log(xhr)
      }
    })
  }
  //END OF ADDING DOCUMENT APPLICATION STATUS  
  generateId();

  //VALIDATION OF FIELDS
  function isEmptyField(){
    var isEmptyField = false;
    if($('#applicationStatusName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#applicationStatusDescription').val().trim() === ""){
      var isEmptyField = true;
    }
    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#addApplicationStatusSubmitBtn').on('click', function(e){
    e.preventDefault();

    if(isEmptyField()){
      alert('Empty Field')
      
    }else{
      addDocumentApplicationStatus();
    }
  })

  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>
