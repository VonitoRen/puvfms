 <!-- SWAL -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>
1<!-- Edit User Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="addRoleModalLabel">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
                      <form id="roleForm" class="forms-sample" method="post">

                        <div class="form-group">
                          <label for="roleId">User Level</label>
                          <select name="roleId" id="userAddInputUserLevel" class="form-control">

                          </select>
                        </div>                

                        <div class="form-group">
                          <label for="roleId">Role Id</label>
                          <input type="text" class="form-control form-control-application-status" name="roleId" id="roleId">
                        </div>
                        <div class="form-group">
                          <label for="roleName">Role Name</label>
                           <input type="text" id="roleName" name ="roleName" class="form-control form-control-application-status">
                        </div>
                        <div class="form-group">
                          <label for="roleDescription">Role Description</label>
                          <textarea class="form-control form-control-application-status" name ="roleDescription" id="roleDescription" rows="4"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary mr-2" id="addRoleSubmitBtn">Submit</button>
                        <button type="button" class="btn btn-dark roleAddCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
                      </form>
      </div>
    </div>
  </div>
</div>

<script>
  
  $('#roleId').prop('disabled', true)

  //GENERATE APPLICATION STATUS ID
  function generateId(){
    $.ajax({
      url: "../../controller/role_management/generateRoleId.php",
      type: "POST",
      data:{},
      success: function(response){
        console.log(response.trim());
        $('#roleId').val(response.trim());
      },
      error: function(xhr, status, error){

      }
    })
  }
  //END OF GENERATE APPLICATION STATUS ID

  //ADDING DOCUMENT APPLICATION STATUS
  function addRole(){
    $.ajax({
      url: "../../controller/role_management/addRole.php",
      type: "POST",
      data:{
        roleId: $('#roleId').val().trim(),
        roleName: $('#roleName').val().trim(),
        roleDescription: $('#roleDescription').val().trim(),
        user_level: $('#userAddInputUserLevel').val().trim(),
      },
      dataType: 'json',
      success: function(response) {
      console.log(response); // Log the response to check server's response
      if (response.status === "success") {
        // Display SweetAlert success message
        Swal.fire({
          title: "Role added successfully!",
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
            window.location = "roleManagement.php";
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
        text: "An error occurred while adding the role.",
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
  $('#addRoleSubmitBtn').on('click', function(e){
    e.preventDefault();
    console.log($('#userAddInputUserLevel').val())
    if(isEmptyField()){
      alert('Empty Field')

    } else {
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
          addRole();
        }
      });
    }
  });


  //END OF SUBMIT BUTTON FUNCTION
        $.ajax({
            url:'../../controller/user_management/displayUserLevel.php',
            type:'POST',
            dataType: 'json',
            success: function(data){
                    var userLevelInput = $('#userAddInputUserLevel');
                    userLevelInput.empty(); // Clear existing options
                    var userLevelOptions = data;

                    if (Array.isArray(userLevelOptions) && userLevelOptions.length > 0) {
                        console.log('not empty');
                        // Populate the select element with options
                            userLevelInput.append($('<option></option>').val("").text("Select user level.").prop('selected', true).prop('disabled', true))
                            userLevelOptions.forEach(function(userLevel) {
                                console.log(userLevel);
                                var ucEquivalentUserLevelNameOption = userLevel.user_level_name.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                                var option = $('<option></option>').val(userLevel.user_level).text(ucEquivalentUserLevelNameOption.trim());
                                userLevelInput.append(option);
                            });
                    } else {

                        userLevelInput.append($('<option></option>').val("").text('<option>No user levels found</option>'));
                    }
                    console.log(userLevelOptions);
            },
            error: function(xhr, status, error){

            }
        });
  //VALIDATION OF FIELDS
  function isEmptyField(){
    var isEmptyField = false;
    if($('#roleName').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#roleDescription').val().trim() === ""){
      var isEmptyField = true;
    }

    if($('#userAddInputUserLevel').val() == null || $('#userAddInputUserLevel').val() == ""){
      var isEmptyField = true;
      console.log('may laman')
    }

    return isEmptyField;
  }
  //END OF VALIDATION OF FIELDS
</script>



  </body>
</html>