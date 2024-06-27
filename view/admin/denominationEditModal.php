 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="editDenominationModal" tabindex="-1" role="dialog" aria-labelledby="editDenominationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit Denomination</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="denominationForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="denominationEditId">Denomination Id</label>
              <input type="text" class="form-control form-control-application-status" name="denominationEditId" id="denominationEditId" disabled>
            </div>

            <div class="form-group">
              <label for="denominationEditName">Denomination Code</label>
               <input type="text" id="denominationEditName" name ="denominationEditName" class="form-control form-control-application-status" >
            </div>

            <div class="form-group">
              <label for="denominationEditCodeName">Denomination Name</label>
               <input type="text" id="denominationEditCodeName" name ="denominationEditCodeName" class="form-control form-control-application-status" >
            </div>

            <div class="form-group">
              <label for="denominationEditDescription" >Denomination Description</label>
              <textarea class="form-control form-control-application-status" name ="denominationEditDescription" id="denominationEditDescription" rows="4" ></textarea>
            </div>

     
            <button type="button" class="btn btn-primary mr-2" id="editDenominationSubmitBtn">Edit</button>
            <button type="button" class="btn btn-dark denominationEditCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
  $('#denominationId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/denomination_management/generateDenominationId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#denominationId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function editDenomination(){
    $.ajax({
      url: "../../controller/denomination_management/editDenomination.php",
      type: "POST",
      data:{
        denominationId: $('#denominationEditId').val().trim(),
        denominationName: $('#denominationEditName').val().trim(),
        denominationCodeName: $('#denominationEditCodeName').val().trim(),
        denominationDescription: $('#denominationEditDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response); // Log the response to check the server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Denomination added successfully!",
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
            fetchDenomination();
            window.location= "denominationManagement.php"
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
    if($('#denominationEditName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#denominationEditDescription').val().trim() === ""){
      var isEmptyField = true;
    }
    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#editDenominationSubmitBtn').on('click', function(e){
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
          editDenomination();
          window.location= "denominationManagement.php"
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>