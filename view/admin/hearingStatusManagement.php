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
    <title>PUVFMS LTFRB-RO1</title>
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
                        <h4 class="card-title">Hearing Status</h4>
                        <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addHearingStatusModal">Add Hearing Status</button>
                        </div>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Functions</th>
                            </tr>
                            </thead>
                            <tbody id="hearingStatusTableBody">

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

        

     </script>

<script>


        function fetchHearingStatus() {
            $.ajax({
                url: '../../controller/hearing_status_management/fetchHearingStatus.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var tbody = $('#hearingStatusTableBody');
                    tbody.empty(); // Clear the table body
                    if (data.length === 0) {
                        var noDataRow = `<tr>
                            <td colspan="5" class="text-center">NO RECORD FOUND</td>
                        </tr>`;
                        tbody.append(noDataRow);
                    } else {
                    data.forEach(function (hearingStatus) {
                        var row = `<tr>
                            <td>${hearingStatus.hearing_status_id}</td>
                            <td>${hearingStatus.hearing_status_name}</td>
                            <td hidden>${hearingStatus.hearing_status_description}</td>
                            <td>${hearingStatus.hearing_status_created_at}</td>
                            <td>
                                <button class="btn btn-sm btn-primary view-button" data-toggle="modal" data-target="#viewHearingStatusModal" data-id="${hearingStatus.application_status_id}" >View</button>
                                <button class="btn btn-sm btn-secondary edit-button" data-toggle="modal" data-target="#editHearingStatusModal" data-id="${hearingStatus.application_status_id}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteHearingStatusModal" data-id="${hearingStatus.application_status_id}">Delete</button>     
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                  }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', status, error);
                }
            });
        }

        // Call fetchDocumentTypes on page load
        fetchHearingStatus();
 
        $('#addHearingStatusModal, #editHearingStatusModal, #deleteHearingStatusModal, .hearingStatusAddCloseBtn').on('hidden.bs.modal', function (e) {
        $('.modal-backdrop').remove(); // Manually remove the backdrop
        });    
  //END OF DISPLAYING DATA
$(document).ready(function() {
  $('.view-button').on('click', function() {
    var statusId = $(this).closest('tr').find('td:eq(0)').text().trim(); // Application Status ID
    var statusName = $(this).closest('tr').find('td:eq(1)').text().trim(); // Application Status Name
    var statusDescription = $(this).closest('tr').find('td:eq(2)').text().trim(); // Application Status Description (hidden)
    var createdAt = $(this).closest('tr').find('td:eq(3)').text().trim(); // Application Status Created At
    console.log('Application Status ID:', statusId);
    console.log('Application Status Name:', statusName);
    console.log('Application Status Description:', statusDescription);
    console.log('Application Status Created At:', createdAt);
    $('#hearingStatusViewId').val(statusId)
    $('#hearingStatusViewName').val(statusName)
    $('#hearingStatusViewDescription').val(statusDescription)
    $('#hearingStatusViewCreatedAt').val(createdAt)
    // Optionally, retrieve other data from the table row if needed
    // var status = $(this).closest('tr').find('td:first').text(); 
    // var description = $(this).closest('tr').find('td:eq(1)').text(); 
    
    // Perform actions based on the button click
    // For example, open a modal or navigate to another page
    
    // Example: Open a modal (replace '#viewModal' with your modal ID)
    // $('#viewModal').modal('show');
  });

  $('.edit-button').on('click', function() {
    var statusId = $(this).closest('tr').find('td:eq(0)').text().trim(); // Application Status ID
    var statusName = $(this).closest('tr').find('td:eq(1)').text().trim(); // Application Status Name
    var statusDescription = $(this).closest('tr').find('td:eq(2)').text().trim(); // Application Status Description (hidden)
    var createdAt = $(this).closest('tr').find('td:eq(3)').text().trim(); // Application Status Created At
    console.log('Application Status ID:', statusId);
    console.log('Application Status Name:', statusName);
    console.log('Application Status Description:', statusDescription);
    console.log('Application Status Created At:', createdAt);
    $('#hearingStatusEditId').val(statusId)
    $('#hearingStatusEditName').val(statusName)
    $('#hearingStatusEditDescription').val(statusDescription)
    $('#hearingStatusEditCreatedAt').val(createdAt)
    // Optionally, retrieve other data from the table row if needed
    // var status = $(this).closest('tr').find('td:first').text(); 
    // var description = $(this).closest('tr').find('td:eq(1)').text(); 
    
    // Perform actions based on the button click
    // For example, open a modal or navigate to another page
    
    // Example: Open a modal (replace '#viewModal' with your modal ID)
    // $('#viewModal').modal('show');
  });
});  
</script>
<?php include_once('hearingStatusAddModal.php');?>
<?php include_once('hearingStatusEditModal.php');?>
  </body>
</html>