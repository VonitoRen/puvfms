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
                        <h4 class="card-title">Users</h4>
                        <div class="row d-flex justify-content-start ">
                            <div class="col-5 d-flex justify-content-start">
                                <div class="mr-2">
                                    <select name="" class="form-control" id="">
                                        <option value="" selected disabled>Department</option>
                                        <option value="">All</option>
                                        <option value="">Judicial</option>
                                        <option value="">Technical</option>
                                    </select>
                                </div>
                                <div>
                                    <select name="" class="form-control" id="">
                                        <option value="" selected disabled>Activity Status</option>
                                        <option value="">All</option>
                                        <option value="">Active</option>
                                        <option value="">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end">
                            <button type="button" class="btn btn-primary btn-fw" id="addUserModalDisplayBtn" data-toggle="modal" data-target="#addUserModal">Add User</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>User Status</th>
                                <th>User Level</th>
                                <th>Date Created</th>
                                <th>Functions</th>
                            </tr>
                            </thead>
                            <tbody id="userTableBody">

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
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/ph-address-selector.js"></script>
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
  <script>
    function displayUser(){
      $.ajax({
      url:'../../controller/user_management/displayUser.php',
      type: 'post',
      dataType: 'json',
      success: function(data){
        console.log(data);
        console.log('hello')
        $('#userTableBody').empty();
                   if (data.length === 0) {
                       var noDataRow = `<tr>
                           <td colspan="5" class="text-center">NO RECORD FOUND</td>
                       </tr>`;
                       tbody.append(noDataRow);
                   } else {
                    $.each(data, function(index, value){
          var row = $('<tr></tr>');
          row.append('<td>' + value.user_id + '</td>');
          row.append('<td>' + value.fullname + '</td>');
          row.append('<td>' + value.department_name + '</td>');
          row.append('<td>' + value.user_status + '</td>');
          row.append('<td>' + value.user_level_name + '</td>');
          row.append('<td>' + value.user_created_at + '</td>');
          row.append('<td>' + 
          '<button type="button" class="btn btn-primary btn-fw w-25 editUserBtn" data-userid="' + value.user_id + '" data-toggle="modal" data-target="#editUserModal">Edit User</button> ' +
          '<button type="button" class="btn btn-danger btn-fw w-25 deleteUserBtn" data-userid="' + value.user_id + '" data-toggle="modal" data-target="#deleteUserModal">Delete User</button>' +
            '</td>');



            $('#userTableBody').append(row);
          // Event delegation for dynamically added buttons
          $('#userTableBody').on('click', '.editUserBtn', function(){
            var userId = $(this).data('userid');
            console.log('Edit button clicked for user ID: ' + userId);
            // Perform edit action, e.g., open modal, etc.
          });

          $('#userTableBody').on('click', '.deleteUserBtn', function(){
            var userId = $(this).data('userid');
            console.log('Delete button clicked for user ID: ' + userId);
            // Perform delete action, e.g., show confirmation dialog, etc.
          });

        });
                   }

      },
      error: function(xhr, status, error){

      }
    })

    }
    displayUser();

    //OPEN EDIT USER MODAL
    // Additional JavaScript to handle form submission, etc.
    $('#editUserForm').on('submit', function(event) {
      event.preventDefault();
      // Handle form submission logic here
      console.log('Edit User Form submitted');
    });    
    //END OF OPEN EDIT USER MODAL
    $('#addUserModal, #editUserModal, #deleteUserModal, .userAddCloseBtn').on('hidden.bs.modal', function (e) {
        $('.modal-backdrop').remove(); // Manually remove the backdrop
        });        
  </script>
    <?php
    include_once('userManagementEditModal.php');
    include_once('userManagementAddModal.php');
    ?>  
  <!-- End custom js for this page -->
  </body>
</html>