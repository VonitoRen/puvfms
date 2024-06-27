 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>
<!-- Edit User Modal -->
<div class="modal fade" id="addDocumentTypeModal" tabindex="-1" role="dialog" aria-labelledby="addDocumentTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addDocumentTypeModalLabel">Add Document Typer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
<form class="forms-sample" id="documentTypeForm" method="POST">

<div class="form-group">
    <label for="documentTypeIdInput">Document Type Id</label>
    <input type="text" class="form-control form-control-document-type" name="documentTypeIdInput" id="documentTypeIdInput">
</div>

<div class="form-group">
    <label for="documentTypeNameInput">Document Type Name</label>
    <input type="text" class="form-control form-control-document-type" id="documentTypeNameInput" name="documentTypeNameInput" placeholder="Document Type Name">
</div>

<div class="form-group">
    <label for="documentTypeDescriptionInput">Document Type Description</label>
    <textarea class="form-control form-control-document-type" name="documentTypeDescriptionInput" id="documentTypeDescriptionInput" rows="4"></textarea>
</div>
<button id="addDocumentTypeSubmitBtn" class="btn btn-primary mr-2">Submit</button>
<button type="button" class="btn btn-dark documentTypeAddCloseBtn" data-dismiss="modal" >Cancel</button>
</form>
      </div>
    </div>
  </div>
</div>  

<script>
  $('#documentTypeIdInput').prop('disabled', true)

  //GENERATE DOCUMENT TYPE ID
  function generateId(){
    $.ajax({
      url: "../../controller/document_type_management/generateDocumentTypeId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#documentTypeIdInput').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT TYPE
    function addDocumentType(){
    $.ajax({
      url: "../../controller/document_type_management/addDocumentType.php",
      type: "POST",
      data:{
        documentTypeIdInput: $('#documentTypeIdInput').val().trim(),
        documentTypeNameInput: $('#documentTypeNameInput').val().trim(),
        documentTypeDescriptionInput: $('#documentTypeDescriptionInput').val().trim(),
      },
      dataType: 'json',
      success: function(response){
        console.log(response); // Log the response to check server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Document Type added successfully!",
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
             window.location="documentTypeManagement.php"
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
        text: "An error occurred while adding the document type.",
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
      if($('#documentTypeNameInput').val().trim() === ""){
        var isEmptyField = true;
      }

      if($('#documentTypeDescriptionInput').val().trim() === ""){
        var isEmptyField = true;
      }
      return isEmptyField;
    }
  //END OF VALIDATION OF FIELDS

  //SUBMIT BUTTON FUNCTION
    $('#addDocumentTypeSubmitBtn').on('click', function(e){
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
          addDocumentType();
        }
      });
    }
  });

  //END OF SUBMIT BUTTON FUNCTION

</script>

  </body>
</html>