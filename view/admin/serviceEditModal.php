 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="serviceForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="serviceEditId">Service Id</label>
              <input type="text" class="form-control form-control-application-status" name="serviceEditId" id="serviceEditId" disabled>
            </div>
            <div class="form-group">
              <label for="serviceEditName">Service</label>
               <input type="text" id="serviceEditName" name ="serviceEditName" class="form-control form-control-application-status" >
            </div>
            <div class="form-group">
              <label for="serviceEditDescription" >Service Description</label>
              <textarea class="form-control form-control-application-status" name ="serviceEditDescription" id="serviceEditDescription" rows="4" ></textarea>
            </div>

     
            <button type="button" class="btn btn-primary mr-2" id="editServiceSubmitBtn">Edit</button>
            <button type="button" class="btn btn-dark serviceEditCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
  $('#serviceId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/service_management/generateServiceId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#serviceId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function editService(){
    $.ajax({
      url: "../../controller/service_management/editService.php",
      type: "POST",
      data:{
        serviceId: $('#serviceEditId').val().trim(),
        serviceName: $('#serviceEditName').val().trim(),
        serviceDescription: $('#serviceEditDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response); // Log the response to check the server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Service added successfully!",
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
            fetchService();
            window.location= "serviceManagement.php"
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
    if($('#serviceEditName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#serviceEditDescription').val().trim() === ""){
      var isEmptyField = true;
    }
    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#editServiceSubmitBtn').on('click', function(e){
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
          editService();
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>