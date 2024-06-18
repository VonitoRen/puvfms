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
                                <h4 class="card-title">Add Document Type</h4>

                                <form class="forms-sample" id="documentTypeForm" method="POST">

                                    <div class="form-group">
                                        <label for="documentTypeIdInput">Document Type Id</label>
                                        <input type="text" class="form-control form-control-document-type" name="documentTypeIdInput" id="documentTypeIdInput">
                                    </div>

                                    <div class="form-group">
                                        <label for="documentTypeNameInput">Document Type Name</label>
                                        <input type="text" class="form-control form-control-document-type" id="documentTypeNameInput" name="documentTypeNameInput" placeholder="Document Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="documentTypeDescriptionInput">Document Type Description</label>
                                        <textarea class="form-control form-control-document-type" name="documentTypeDescriptionInput" id="documentTypeDescriptionInput" rows="4"></textarea>
                                    </div>
                                    <button id="addDocumentTypeSubmitBtn" class="btn btn-primary mr-2">Submit</button>
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

<script>
  $('#documentTypeIdInput').prop('disabled', true)

  //GENERATE DOCUMENT TYPE ID
  function generateId(){
    $.ajax({
      url: "../../controller/document_type_management/generateDocumentTypeId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#documentTypeIdInput').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT TYPE
    function addDocumentType(){
    $.ajax({
      url: "../../controller/document_type_management/addDocumentType.php",
      type: "POST",
      data:{
        documentTypeIdInput: $('#documentTypeIdInput').val().trim(),
        documentTypeNameInput: $('#documentTypeNameInput').val().trim(),
        documentTypeDescriptionInput: $('#documentTypeDescriptionInput').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response);
        if(response.status === "success"){
          generateId();
          $('#documentTypeNameInput').val("");
          $('#documentTypeDescriptionInput').val("");
          alert("Added Successfuly!")
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
      if($('#documentTypeNameInput').val().trim() === ""){
        var isEmptyField = true;
      }

      if($('#documentTypeDescriptionInput').val().trim() === ""){
        var isEmptyField = true;
      }
      return isEmptyField;
    }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
    $('#addDocumentTypeSubmitBtn').on('click', function(e){
      e.preventDefault();

      if(isEmptyField()){
        alert('Empty Field')

      }else{
        addDocumentType();
      }
    })

  //END OF SUBMIT BUTTON FUNCTION

</script>

  </body>
</html>