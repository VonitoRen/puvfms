<!-- Edit User Modal -->
<div class="modal fade" id="addApplicationStatusModal" tabindex="-1" role="dialog" aria-labelledby="addApplicationStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
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
        console.log(response);
        if(response.status === "success"){
          generateId();
          $('#applicationStatusName').val("");
          $('#applicationStatusDescription').val("");
          $('#addApplicationStatusModal').modal('hide');
          alert("Added Successfuly!")
          fetchApplicationStatus();
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
      addDocumentApplicationStatus();
    }
  })

  //END OF SUBMIT BUTTON FUNCTION


</script>



  </body>
</html>