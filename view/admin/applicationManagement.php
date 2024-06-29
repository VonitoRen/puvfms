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
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <h4 class="card-title">Application </h4>
                        <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#addApplicationModal">Add Application </button>
                        </div>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Application Number</th>
                                <th></th>
                                <th>Date Applied</th>
                                <th>Functions</th>
                            </tr>
                            </thead>
                            <tbody id="applicationTableBody">

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

  // Displaying of DATA 
  $.noConflict();
  jQuery(document).ready(function($) {  
    function fetchApplication() {
        $.ajax({
            url: '../../controller/application_management/fetchApplication.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var tbody = $('#applicationTableBody');
                tbody.empty(); // Clear the table body
                if (data.length === 0) {
                    var noDataRow = `<tr>
                        <td colspan="5" class="text-center">NO RECORD FOUND</td>
                    </tr>`;
                    tbody.append(noDataRow);
                } else {
                    data.forEach(function (application) {
                        var row = `<tr>
                            <td>${application.application_number}</td>
                            <td>${application.application_status_name}</td>
                            <td>${application.application_applied_at}</td>
                            <td>
                                <button class="btn btn-sm btn-primary view-button" data-toggle="modal" data-target="#viewApplicationModal" data-id="${application.application_number}">View</button>
                                <button class="btn btn-sm btn-secondary edit-button" data-toggle="modal" data-target="#editApplicationModal" data-id="${application.application_number}">Edit</button>
                                <button class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteApplicationModal" data-id="${application.application_number}">Delete</button>                                
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

    // Call fetchApplication on page load
    fetchApplication();
    
    $('#addApplicationModal, #viewApplicationModal, #editApplicationModal, #deleteApplicationModal, .applicationAddCloseBtn').on('hidden.bs.modal', function (e) {
        $('.modal-backdrop').remove(); // Manually remove the backdrop
    });    

    // Use event delegation to handle click events on dynamically created .view-button elements
    $(document).on('click', '.view-button', function() {
    // Get the modal element
    var $modal = $('#filePreviewModal');
    console.log('Modal:', $modal); // Check if modal is correctly selected

    // Get the iframe element
    var $iframe = $('#filePreviewFrame');

    // When the user clicks on <span> (x), close the modal
    $modal.find('.close').on('click', function() {
        console.log('Close button clicked');
        $modal.hide();
        $iframe.attr('src', ''); // Clear iframe src
    });

    // Function to open modal and load file content
    function openFileModal(url) {
        var fullPath = '../../controller/application_management/' + url;
        console.log('Opening file:', fullPath); // Log the full URL for debugging
        $modal.modal('show')
        $iframe.attr('src', fullPath);
    }

        // Attach the function to the global window object so it can be called from anywhere
        window.openFileModal = openFileModal;
      
        var applicantNumber = $(this).closest('tr').find('td:eq(0)').text().trim();
        console.log(applicantNumber);
        console.log('hello');

        $.ajax({
            url: '../../controller/application_management/fetchApplicationDocuments.php',
            type: 'POST',
            dataType: 'json',
            data: {
                applicant_number: applicantNumber
            },
            success: function(response) {
                console.log(response.length);
                console.log(response)
                var fileContainer = $('#applicationForm');
                fileContainer.empty(); // Clear the table body
                if (response.length === 0) {
                    var noDataRow = `<tr>
                        <td colspan="5" class="text-center">NO RECORD FOUND</td>
                    </tr>`;
                    fileContainer.append(noDataRow);
                } else {
                  for (let index = 0; index < response.length; index++) {
                    var filePath = response[index];
                    var fileName = filePath.split('/').pop(); // Extract the file name from the path
                    console.log(fileName);
                    var truncatedName = (truncateFileName(fileName, 100)).substring(30); // Adjust the length as needed
                    var fileLink = `<a class= "text-primary" "href="javascript:void(0);" onclick="openFileModal('${filePath}');">${truncatedName}</a><br>`;
                    
                    fileContainer.append(fileLink);
                }
                
                // Function to truncate file name
                function truncateFileName(fileName, maxLength) {
                    if (fileName.length > maxLength) {
                        return fileName.substr(0, maxLength) + '...'; // Truncate and add ellipsis if necessary
                    }
                    return fileName;
                }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                console.error('XHR:', xhr);
            }
        });
    });

});

  //   console.log($(this));
  // })
  //END OF VIEWING OF INFORMATION
</script>
<?php 

include_once('applicationViewModal.php');

?>
  </body>
</html>