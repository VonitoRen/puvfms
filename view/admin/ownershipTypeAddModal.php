 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>
<!-- Edit Ownership Type Modal -->
<div class="modal fade" id="addOwnershipTypeModal" tabindex="-1" role="dialog" aria-labelledby="addOwnershipTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="ownership">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addOwnershipTypeModalLabel">Add Ownership Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
<form class="forms-sample" id="ownershipTypeForm" method="POST">

<div class="form-group">
    <label for="ownershipTypeIdInput">Ownership Type Id</label>
    <input type="text" class="form-control form-control-ownership-type-add" name="ownershipTypeIdInput" id="ownershipTypeIdInput">
</div>

<div class="form-group">
    <label for="ownershipTypeNameInput">Ownership Type Name</label>
    <input type="text" class="form-control form-control-ownership-type-add" id="ownershipTypeNameInput" name="ownershipTypeNameInput" placeholder="Ownership Type Name">
</div>

<div class="form-group">
    <label for="ownershipTypeDescriptionInput">Ownership Type Description</label>
    <textarea class="form-control form-control-ownership-type-add" name="ownershipTypeDescriptionInput" id="ownershipTypeDescriptionInput" rows="4"></textarea>
</div>
<button id="addOwnershipTypeSubmitBtn" class="btn btn-primary mr-2">Submit</button>
<button type="button" class="btn btn-dark ownershipTypeAddCloseBtn" data-dismiss="modal" >Cancel</button>
</form>
      </div>
    </div>
  </div>
</div>  

<script>
  $('#ownershipTypeIdInput').prop('disabled', true)

  //GENERATE DOCUMENT TYPE ID
  function generateId(){
    $.ajax({
      url: "../../controller/ownership_type_management/generateOwnershipTypeId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#ownershipTypeIdInput').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT TYPE
    function addOwnershipType(){
    $.ajax({
      url: "../../controller/ownership_type_management/addOwnershipType.php",
      type: "POST",
      data:{
        ownershipTypeIdInput: $('#ownershipTypeIdInput').val().trim(),
        ownershipTypeNameInput: $('#ownershipTypeNameInput').val().trim(),
        ownershipTypeDescriptionInput: $('#ownershipTypeDescriptionInput').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response); // Log the response to check server's response
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
             window.location="ownershipTypeManagement.php"
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
        text: "An error occurred while adding the ownership type.",
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




  //SUBMIT BUTTON FUNCTION
    $('#addOwnershipTypeSubmitBtn').on('click', function(e){
      e.preventDefault();

      if(isEmptyField('.form-control-ownership-type-add')){
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
          addOwnershipType();
        }
      });
    }
  });

  //END OF SUBMIT BUTTON FUNCTION

</script>

  </body>
</html>