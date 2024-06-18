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

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Document Type</h4>
                        <div class="d-flex justify-content-end">
                        <button type="button" id="addBtn" class="btn btn-primary btn-fw">Add Document Type</button>
                        </div>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Functions</th>
                            </tr>
                            </thead>
                            <tbody id="documentTypeTableBody">

                            </tbody>
                        </table>
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
        $('#logoutBtn').on('click', function(){
          alert('gumagana');
          window.location = "../../index.php";
        })

        
    //Add Application Status
  
        $(document).ready(function() {
            $('#addBtn').click(function() {
                // URL to send the AJAX request to
                var url = 'documentType.php'; 

                // Perform the AJAX request
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                        // Handle success if needed, or directly redirect
                        console.log('AJAX request successful');
                        // Perform the redirection after successful AJAX call
                        window.location.href = 'documentType.php';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', status, error);
                    }
                });
            });
        });
        
    //END ADD APPLICATION STATUS
     </script>


<script>

  // Displaying of DATA 
    $(document).ready(function () {
        
        function fetchDocumentTypes() {
            $.ajax({
                url: '../../controller/document_type_management/fetchDocumentType.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var tbody = $('#documentTypeTableBody');
                    tbody.empty(); // Clear the table body

                    data.forEach(function (documentType) {
                        var row = `<tr>
                            <td>${documentType.document_type_id}</td>
                            <td>${documentType.document_type_name}</td>
                            <td>${documentType.document_type_description}</td>
                            <td>${documentType.document_type_created_at}</td>
                            <td>
                                <button class="btn btn-sm btn-warning editBtn" data-id="${documentType.document_type_id}">Edit</button>
                                <button class="btn btn-sm btn-danger deleteBtn" data-id="${documentType.document_type_id}">Delete</button>
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });
        }

        // Call fetchDocumentTypes on page load
        fetchDocumentTypes();
      });
   

  //END OF DISPLAYING DATA
</script>
  </body>
</html>