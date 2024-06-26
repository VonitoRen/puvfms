 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="addApplicationStatusModal" tabindex="-1" role="dialog" aria-labelledby="addApplicationStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Add Application Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
                      <form id="applicationStatusForm" class="forms-sample" method="post">
                        
                        <div class="form-group">
                          <label for="applicationStatusId">Application Status Id</label>
                          <input type="text" class="form-control form-control-application-status" name="applicationStatusId" id="applicationStatusId">
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
                        <button type="button" class="btn btn-dark applicationStatusAddCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
                      </form>
      </div>
    </div>
  </div>
</div>

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
        console.log(response); // Log the response to check the server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Application Status added successfully!",
          icon: "success",
          button: "OK",
          closeOnClickOutside: false,
          closeOnEsc: false,
          timer: 3000,
          customClass: {
            popup: 'swal-theme',
            confirmButton: 'swal-button',
            cancelButton: 'swal-cancel',
            title: 'swal-title-custom',
            icon: 'icon-swal',
            container: 'swal-container'
          }
        }).then((value) => {
          if (value) {
            // Perform any additional action
            generateId();
            fetchApplicationStatus();
            window.location= "applicationStatusManagement.php"
          }
        });
      } else {
        // Display SweetAlert error message (if necessary)
        Swal.fire({
          title: "Error!",
          text: response.message,
          icon: "error",
          button: "OK",
          closeOnClickOutside: false,
          closeOnEsc: false,
          customClass: {
            popup: 'swal-theme',
            confirmButton: 'swal-button',
            cancelButton: 'swal-cancel',
            title: 'swal-title-custom',
            icon: 'icon-swal',
            container: 'swal-container'
          }
        });
      }
    },
    error: function(xhr, status, error) {
      console.error(xhr); // Log the full XHR object for detailed error information
      console.error('Status:', status); // Log the status of the error
      console.error('Error:', error); // Log the error message itself

      // Display SweetAlert error message for AJAX error (if necessary)
      Swal.fire({
        title: "Error!",
        text: "An error occurred while adding the application status.",
        icon: "error",
        button: "OK",
        closeOnClickOutside: false,
        closeOnEsc: false,
        customClass: {
          popup: 'swal-theme',
          confirmButton: 'swal-button',
          cancelButton: 'swal-cancel',
          title: 'swal-title-custom',
          icon: 'icon-swal',
          container: 'swal-container'
        }
      });
    }
  });
}
// END OF ADDING DOCUMENT APPLICATION STATUS
generateId();

  //VALIDATION OF FIELDS
  $(document).ready(function() {  
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
      Swal.fire({
        title: 'Are you sure you want to submit?',
        text: "",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        customClass: {
          popup: 'swal-theme',
          confirmButton: 'swal-button',
          cancelButton: 'swal-cancel',
          title: 'swal-title-custom',
          icon: 'icon-swal',
          container: 'swal-container'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          addDocumentApplicationStatus();
        }
      });
    }
  });

  })



  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>