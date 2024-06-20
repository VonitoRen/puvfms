<!-- Edit User Modal -->
<div class="modal fade" id="addDocumentTypeModal" tabindex="-1" role="dialog" aria-labelledby="addDocumentTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addDocumentTypeModalLabel">Edit User</h5>
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
        console.log(response);
        if(response.status === "success"){
          generateId();
          $('#documentTypeNameInput').val("");
          $('#documentTypeDescriptionInput').val("");
          $('#addDocumentTypeModal').modal('hide');
          alert("Added Successfuly!")

          fetchDocumentTypes();
        }
   
      },
      error: function(xhr, status, error){
        console.log(xhr)
      }
    })
  }
  //END OF ADDING DOCUMENT APPLICATION STATUS  
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
        addDocumentType();
      }
    })

  //END OF SUBMIT BUTTON FUNCTION

</script>

  </body>
</html>