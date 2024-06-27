 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="editOwnershipTypeModal" tabindex="-1" role="dialog" aria-labelledby="editOwnershipTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit Ownership Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="ownershipTypeForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="ownershipTypeEditId">Ownership Type Id</label>
              <input type="text" class="form-control form-control-ownership-type-edit" name="ownershipTypeEditId" id="ownershipTypeEditId" disabled>
            </div>
            <div class="form-group">
              <label for="ownershipTypeEditName">Ownership Type</label>
               <input type="text" id="ownershipTypeEditName" name ="ownershipTypeEditName" class="form-control form-control-ownership-type-edit" >
            </div>
            <div class="form-group">
              <label for="ownershipTypeEditDescription" >Ownership Type Description</label>
              <textarea class="form-control form-control-ownership-type-edit" name ="ownershipTypeEditDescription" id="ownershipTypeEditDescription" rows="4" ></textarea>
            </div>

     
            <button type="button" class="btn btn-primary mr-2" id="editOwnershipTypeSubmitBtn">Edit</button>
            <button type="button" class="btn btn-dark ownershipTypeEditCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
  $('#ownershipTypeId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/ownership_type_management/generateOwnershipTypeId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#ownershipTypeId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function editOwnershipType(){
    $.ajax({
      url: "../../controller/ownership_type_management/editOwnershipType.php",
      type: "POST",
      data:{
        ownershipTypeId: $('#ownershipTypeEditId').val().trim(),
        ownershipTypeName: $('#ownershipTypeEditName').val().trim(),
        ownershipTypeDescription: $('#ownershipTypeEditDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response); // Log the response to check the server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Ownership Type added successfully!",
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
            fetchOwnershipType();
            window.location= "ownershipTypeManagement.php"
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
  function isEmptyField(inputs) {
    var $inputs = $(inputs); // Ensure inputs are wrapped in jQuery

    var isEmptyField = false;
    
    $inputs.each(function() {
        if ($(this).val().trim() === '') {
            isEmptyField = true;
            return false; // Exit the loop early if any field is empty
        }
    });
    
    return isEmptyField;
}


  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#editOwnershipTypeSubmitBtn').on('click', function(e){
    e.preventDefault();

    if(isEmptyField('.form-control-ownership-type-edit')){
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
          editOwnershipType();
          window.location= "ownershipTypeManagement.php"
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>