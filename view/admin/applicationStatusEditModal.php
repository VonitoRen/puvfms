 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="editApplicationStatusModal" tabindex="-1" role="dialog" aria-labelledby="editApplicationStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit Application Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="applicationStatusForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="applicationStatusEditId">Application Status Id</label>
              <input type="text" class="form-control form-control-application-status" name="applicationStatusEditId" id="applicationStatusEditId" disabled>
            </div>
            <div class="form-group">
              <label for="applicationStatusEditName">Application Status</label>
               <input type="text" id="applicationStatusEditName" name ="applicationStatusEditName" class="form-control form-control-application-status" >
            </div>
            <div class="form-group">
              <label for="applicationStatusEditDescription" >Application Status Description</label>
              <textarea class="form-control form-control-application-status" name ="applicationStatusEditDescription" id="applicationStatusEditDescription" rows="4" ></textarea>
            </div>

     
            <button type="button" class="btn btn-primary mr-2" id="editApplicationStatusSubmitBtn">Edit</button>
            <button type="button" class="btn btn-dark applicationStatusEditCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
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
  function editApplicationStatus(){
    $.ajax({
      url: "../../controller/application_status_management/editApplicationStatus.php",
      type: "POST",
      data:{
        applicationStatusId: $('#applicationStatusEditId').val().trim(),
        applicationStatusName: $('#applicationStatusEditName').val().trim(),
        applicationStatusDescription: $('#applicationStatusEditDescription').val().trim(),
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
          title: response.message,
          text: "response.message",
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
  function isEmptyField(){
    var isEmptyField = false;
    if($('#applicationStatusEditName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#applicationStatusEditDescription').val().trim() === ""){
      var isEmptyField = true;
    }
    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#editApplicationStatusSubmitBtn').on('click', function(e){
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
          editApplicationStatus();
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>