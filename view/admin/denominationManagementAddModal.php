 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="addDenominationManagementModal" tabindex="-1" role="dialog" aria-labelledby="addDenominationManagementModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addDenominationManagementModalLabel">Add denomination</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
                      <form id="denominationForm" class="forms-sample" method="post">
                        
                        <div class="form-group">
                          <label for="denominationId">Denomination Id</label>
                          <input type="text" class="form-control form-control-denomination-status" name="denominationId" id="denominationId">
                        </div>
                        
                        <div class="form-group">
                          <label for="denominationCodeName">Denomination Code</label>
                           <input type="text" id="denominationCodeName" name ="denominationCodeName" class="form-control form-control-denomination-status">
                        </div>

                        <div class="form-group">
                          <label for="denominationName">Denomination Name</label>
                           <input type="text" id="denominationName" name ="denominationName" class="form-control form-control-denomination-status">
                        </div>

                        <div class="form-group">
                            <label for="denominationDescription">Denomination Description</label>
                            <textarea class="form-control form-control-hearing-status form" id="denominationDescription" rows="4"></textarea>
                        </div>

                        <button type="button" class="btn btn-primary mr-2" id="addDenominationSubmitBtn">Submit</button>
                        <button type="button" class="btn btn-dark denominationAddCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
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
  function addDenomination(){
    $.ajax({
      url: "../../controller/denomination_management/addDenomination.php",
      type: "POST",
      data:{
        denominationId: $('#denominationId').val().trim(),
        denominationCodeName: $('#denominationCodeName').val().trim(),
        denominationName: $('#denominationName').val().trim(),
        denominationDescription: $('#denominationDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response);
        if(response.status === "success"){
          Swal.fire({
          title: "denomination added successfully!",
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
            window.location="denominationManagement.php"
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
        text: "An error occurred while adding the denomination.",
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
    if($('#denominationCodeName').val().trim() === ""){
      var isEmptyField = true;
    }if($('#denominationName').val().trim() === ""){
      var isEmptyField = true;
    }if($('#denominationDescription').val().trim() === ""){
      var isEmptyField = true;
    }


    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#addDenominationSubmitBtn').on('click', function(e){
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
          addDenomination();
        }
      });
    }
  });

  //END OF SUBMIT BUTTON FUNCTION


</script>


  </body>
</html>