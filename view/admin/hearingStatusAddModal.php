 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>
<!-- Edit User Modal -->
<div class="modal fade" id="addHearingStatusModal" tabindex="-1" role="dialog" aria-labelledby="addHearingStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addHearingStatusModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
                                <form class="forms-sample" id="hearingStatusForm" method="POST">

                                    <div class="form-group">
                                        <label for="hearingStatusId">Hearing Status Id</label>
                                        <input type="text" class="form-control form-control-hearing-status form" id="hearingStatusId">
                                    </div>

                                    <div class="form-group">
                                        <label for="hearingStatusName">Hearing Status Name</label>
                                        <input type="text" class="form-control form-control-hearing-status form" id="hearingStatusName" placeholder="Hearing Status Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="hearingStatusDescription">Hearing Status Description</label>
                                        <textarea class="form-control form-control-hearing-status form" id="hearingStatusDescription" rows="4"></textarea>
                                    </div>

                                    <button id="hearingStatusSubmitBtn" class="btn btn-primary mr-2">Submit</button>
                                    <button type="button" class="btn btn-dark hearingStatusAddCloseBtn" data-dismiss="modal">Cancel</button>
                                </form>
      </div>
    </div>
  </div>
</div>
<script>

$('#hearingStatusId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/hearing_status_management/generateHearingStatusId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#hearingStatusId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function addHearingStatus(){
    $.ajax({
      url: "../../controller/hearing_status_management/addHearingStatus.php",
      type: "POST",
      data:{
        hearingStatusId: $('#hearingStatusId').val().trim(),
        hearingStatusName: $('#hearingStatusName').val().trim(),
        hearingStatusDescription: $('#hearingStatusDescription').val().trim(),
      },
      dataType: 'json',
      success: function(response){
      console.log(response);
        if(response.status === "success"){
          Swal.fire({
          title: "Hearing Status added successfully!",
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
            fetchHearingStatus();
            window.location="hearingStatusManagement.php"
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
        text: "An error occurred while adding the hearing status.",
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
    if($('#hearingStatusName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#hearingStatusDescription').val().trim() === ""){
      var isEmptyField = true;
    }
    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
  $('#hearingStatusSubmitBtn').on('click', function(e){
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
          addHearingStatus();
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION




</script>