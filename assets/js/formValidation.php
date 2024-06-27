<script>
$(document).ready(function() {
//Displaying user list
function displayUser(){
      $.ajax({
      url:'../../controller/user_management/displayUser.php',
      type: 'post',
      dataType: 'json',
      success: function(data){

        $('#userTableBody').empty();
           if (data.length === 0) {
               var noDataRow = `<tr>
                   <td colspan="5" class="text-center">NO RECORD FOUND</td>
               </tr>`;
               tbody.append(noDataRow);
           } else {
            $.each(data, function(index, value){
            var row = $('<tr></tr>');
            row.append('<td>' + value.user_id + '</td>');
            row.append('<td>' + value.fullname + '</td>');
            row.append('<td>' + value.department_name + '</td>');
            row.append('<td>' + value.user_status + '</td>');
            row.append('<td>' + value.user_level_name + '</td>');
            row.append('<td>' + value.user_created_at + '</td>');
            row.append('<td>' + 
                '<button class="btn btn-sm btn-primary view-button" data-toggle="modal" data-target="#viewUserModal" data-id="' + value.user_id + '">View</button> ' +
                '<button class="btn btn-sm btn-secondary edit-button" data-toggle="modal" data-target="#editUserModal" data-id="' + value.user_id + '">Edit</button> ' +
                '<button class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#deleteUserModal" data-id="' + value.user_id + '">Delete</button>' +
                '</td>');
                $('#userTableBody').append(row);



        });
                $('.edit-button').on('click', function() {
                    clearForm('#editUserModal');
                    var userId = $(this).data('id');
                    fetchUser(userId)
                
                    // $('#applicationStatusEditId').val(statusId)
                    // $('#applicationStatusEditName').val(statusName)
                    // $('#applicationStatusEditDescription').val(statusDescription)
                    // $('#applicationStatusEditCreatedAt').val(createdAt)
            });        
        }

      },
      error: function(xhr, status, error){

    }
 })

}
displayUser();

//Displaying user list
$('#addUserModal, #editUserModal, #deleteUserModal, .userAddCloseBtn').on('hidden.bs.modal', function (e) {
        $('.modal-backdrop').remove(); // Manually remove the backdrop
        });       
        
function fetchUser(id){
    $.ajax({
        url:'../../controller/user_management/fetchUser.php',
        type:'post',
        data: {
            user_id: id
        },
        dataType: 'json',
        success: function(data){
            console.log(data)
            $('#userEditUserId').val(data.user_id)
            $('#userEditInputUserLevel').val(data.user_level)
            $('#userEditInputUserDepartment').val(data.user_level)
            $('#userEditInputFirstname').val(data.user_first_name)
            if(data.user_middle_name === "" || data.user_middle_name === null){
                $('#userEditInputNoMiddleName').prop('checked', true).trigger('change');
            }

            $('#userEditInputLastname').val(data.user_last_name)
            if(data.user_suffix === "" || data.user_suffix === "none"){
                $('#userEditInputUserSuffix').val('none')
            }else{
                $('#userEditInputUserSuffix').val(data.user_suffix)
            }
            
            $('#userEditInputEmail').val(data.email)

            // Format the phone number

            $('#userEditInputSex').val(data.user_sex)

            var formattedBirthDate = data.user_birthyear + '-' + data.user_birthmonth + '-' + data.user_birthday;

            // Set the formatted date to the input field using jQuery
            $('#userEditInputBirthDate').val(formattedBirthDate);

            var formattedPhoneNumber = "+" + data.user_phone_number.slice(0, 2) + " " + data.user_phone_number.slice(2, 5) + " " + data.user_phone_number.slice(5, 8) + " " + data.user_phone_number.slice(8);
            $('#userEditInputPhoneNumber').val(formattedPhoneNumber)


            $('#regionEdit').val(data.user_region).trigger('change'); // Trigger change event after setting value
            $('#regionEdit').removeClass('is-valid');

            setTimeout(() => {
                $('#provinceEdit').val(data.user_province).trigger('change'); // Trigger change event after setting value
                $('#provinceEdit').removeClass('is-valid');
            }, 100); // Adjust the timeout as necessary

            setTimeout(() => {
                $('#cityEdit').val(data.user_city_municipality).trigger('change'); // No need to trigger change for the last select
                $('#cityEdit').removeClass('is-valid');
            }, 200); // Adjust the timeout as necessary

            setTimeout(() => {
                $('#barangayEdit').val(data.user_barangay).trigger('change'); // No need to trigger change for the last select
                $('#barangayEdit').removeClass('is-valid');
            }, 300); // Adjust the timeout as necessary

            $('#streetTextEdit').val(data.user_street)
        },
        error: function(xhr, error, status){

        }
    })
}

//Displaying options for user level
$.ajax({
    url:'../../controller/user_management/displayUserLevel.php',
    type:'POST',
    dataType: 'json',
    success: function(data){
            var userLevelInput = $('#userAddInputUserLevel, #userEditInputUserLevel');
            userLevelInput.empty(); // Clear existing options
            var userLevelOptions = data;

            if (Array.isArray(userLevelOptions) && userLevelOptions.length > 0) {

                // Populate the select element with options
                    userLevelInput.append($('<option></option>').val("").text("Select user level.").prop('selected', true).prop('disabled', true))
                    userLevelOptions.forEach(function(userLevel) {

                        var ucEquivalentUserLevelNameOption = userLevel.user_level_name.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });
                        var option = $('<option></option>').val(userLevel.user_level).text(ucEquivalentUserLevelNameOption.trim());
                        userLevelInput.append(option);
                    });
            } else {

                userLevelInput.append($('<option></option>').val("").text('<option>No user levels found</option>'));
            }

    },
    error: function(xhr, status, error){

    }
});
//End of Displaying options for user level

//Displaying options for department
$.ajax({
    url:'../../controller/user_management/displayDepartment.php',
    type:'POST',
    dataType: 'json',
    success: function(data){
            var userDeparmentInput = $('#userAddInputUserDepartment, #userEditInputUserDepartment');
            userDeparmentInput.empty(); // Clear existing options
            var userDepartmentOptions = data;

            if (Array.isArray(userDepartmentOptions) && userDepartmentOptions.length > 0) {

                // Populate the select element with options
                    userDeparmentInput.append($('<option></option>').val("").text("Select department.").prop('selected', true).prop('disabled', true))
                    userDepartmentOptions.forEach(function(userLevel) {
                        var option = $('<option></option>').val(userLevel.department_id).text(userLevel.department_name.trim());
                        userDeparmentInput.append(option);
                    });
            } else {

                userDeparmentInput.append($('<option></option>').val("").text('No user deparment found'));
            }
            


    },
    error: function(xhr, status, error){

    }
});
//End of Displaying options for deparment    

function displayErrorMessage(inputField, message) {
    $(inputField).next('.form-text').remove();
    let messageParagraph = $('<small>', {
        class: 'error-message-text-group form-text text-danger',
        text: message
    });
    $(inputField).after(messageParagraph);
    $(inputField).addClass('is-invalid');
}

function clearErrorMessage(inputField) {
    $(inputField).next('.form-text').remove();
    $(inputField).removeClass('is-invalid');
}

function clearForm(form){
    // Reset all input fields
    $(form).find('input').each(function() {
        $(this).val('');
        $(this).removeClass('is-valid is-invalid');
    });

    // Remove all error messages
    $(form).find('.form-text').remove();

    // Reset other input elements such as checkboxes and radio buttons if any
    $(form).find('input[type="checkbox"], input[type="radio"]').prop('checked', false).removeClass('is-valid is-invalid');

    // Reset all select fields
    $(form).find('select').each(function() {
        $(this).val('');
        $(this).removeClass('is-valid is-invalid');
    });

    $(form).find('.form-control').each(function() {
        $(this).val('');
        $(this).removeClass('is-valid is-invalid');
    });

    // Reset all textarea fields
    $(form).find('textarea').each(function() {
        $(this).val('');
        $(this).removeClass('is-valid is-invalid');
    });
}
//FORM VALIDATION
//EMPTY INPUT FIELD VALIDATION
function emptyFieldExist(formInputs) {
    const userAddFields = $(formInputs);
    let emptyFieldExist = false;
    var emptyFIeldList ="";

    userAddFields.each(function() {
        const $this = $(this);
        // Remove previous validation classes


        if (!$this.prop('disabled') && !$this.val()) {
            emptyFieldExist = true;
            $(this).addClass('is-invalid')
            emptyFIeldList += $(this).attr('id') + '\n';
        } else if (!$this.prop('disabled') && $this.val()) {
            $(this).addClass('is-valid')

        }
    
    });

    return emptyFieldExist;
}
//END OF EMPTY FIELD VALIDATION

//EMAIL VALIDATION
const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
function validateEmail(inputField) {

    let isValid = true;

    if ($(inputField).val().trim() === "") {
        displayErrorMessage(inputField, '• Please enter an email address.');
        isValid = false;
    } else if (!emailPattern.test($(inputField).val().trim())) {
        displayErrorMessage(inputField, '• Please enter a valid email address.');
        isValid = false;
    } else {
        $(inputField).removeClass('is-invalid').addClass('is-valid');
        clearErrorMessage(inputField); 
    }

    return isValid;
}
//END OF EMAIL VALIDATION

//PHONE NUMBER INPUT VALIDATION
function validatePhoneNumber(inputField) {
    const phonePattern = /^\+63 \d{3} \d{3} \d{4}$/;
    let isValid = true;

    if ($(inputField).val().trim() === "") {
        displayErrorMessage(inputField, '• Please enter a phone number.');
        isValid = false;
    } else if (!phonePattern.test($(inputField).val().trim())) {
        displayErrorMessage(inputField, '• Phone number should follow this format "+63 XXX XXX XXXX".');
        isValid = false;
    } else {
        $(inputField).removeClass('is-invalid').addClass('is-valid');
    }

    return isValid;
}

//END OF PHONE NUMBER INPUT VALIDATION

//PHONE NUMBER INPUT VALIDATION
function userNameValidation(userNameInput){
    var userNameInputs = $(userNameInput)
    var regexForUserName = /^(?! )[A-Za-zñÑ][-' A-Za-zñÑ]*$/;
    userNameInputs.removeClass('is-invalid is-valid')
    userNameInputs.each(function(){
        if(regexForUserName.test($(this).val().trim())){
            $(this).addClass('is-valid');
        }else{  

            $(this).addClass('is-invalid');
        }
    })
}

function humanNameValidation(userNameInput) {
    const humanNameInputFields = $(userNameInput);
    let humanNameValidated = true;

    // Remove any existing error messages
    $('.incorrect-Lastname-format').remove();
    $('.incorrect-Firstname-format').remove();
    $('.incorrect-Middlename-format').remove();
    $('.incorrect-name-format').remove();

    // Regular expression for validating human names
    const regexForHumanName = /^(?! )[A-Za-zñÑ][-' A-Za-zñÑ]*$/;

    humanNameInputFields.each(function() {
        const id = $(this).attr('id');
        let fieldHumanName;

        if (id.startsWith('userAddInput')) {
            fieldHumanName = id.replace('userAddInput', '');
        } else if (id.startsWith('userEditInput')) {
            fieldHumanName = id.replace('userEditInput', '');
        }

        $(this).removeClass('is-invalid is-valid');

        const trimmedValue = $(this).val().trim();

        if (regexForHumanName.test(trimmedValue) && trimmedValue !== "") {
            clearErrorMessage($(this))
            $(this).addClass('is-valid');
        } else {
            if (!$(this).prop('disabled')) {
                displayErrorMessage($(this), `• Please enter a valid ${fieldHumanName.toLowerCase()}. Only letters, spaces, apostrophes, and hyphens are allowed`)
                humanNameValidated = false;
            } else {
                clearErrorMessage($(this))
                $(this).addClass('is-valid');
            }
        }
    });

    return humanNameValidated;
}
//END OF PHONE NUMBER INPUT VALIDATION          

//END OF FORM VALIDATION

//SERVER SIDE ADDING OF USER
function serverAddUser(){           
    $.ajax({
        url:'../../controller/user_management/addUser.php',
        type:'POST',
        dataType: 'json',
        data:{
            addUserLevel: $('#userAddInputUserLevel').val().trim(),
            addUserDepartment: $('#userAddInputUserDepartment').val().trim(),
            addUserFirstName: $('#userAddInputFirstname').val().trim(),
            addUserMiddleName: $('#userAddInputMiddlename').val().trim(),
            addUserLastName: $('#userAddInputLastname').val().trim(),
            addUserSuffix: $('#userAddInputUserSuffix').val().trim(),
            addUserSex: $('#userAddInputSex').val().trim(),
            addUserBirthdate: $('#userAddInputBirthDate').val().trim(),
            addUserEmail: $('#userAddInputEmail').val().trim(),
            addUserPhoneNumber: $('#userAddInputPhoneNumber').val().trim(),
            addUserRegion: $('#regionAdd option:selected').val().trim(),
            addUserProvince: $('#provinceAdd option:selected').val().trim(),
            addUserCity: $('#cityAdd option:selected').val().trim(),
            addUserBarangay: $('#barangayAdd option:selected').val().trim(),  
            addUserStreet: $('#streetTextAdd').val().trim(),             

        },

        success: function(response){
            // console.log(response); // Log the response to check server's response
            if (response.message === "User successfully added!") {
                // Display SweetAlert success message
                Swal.fire({
                    title: "User successfully added!",
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
                        // Redirect or perform any additional action
                        displayUser();
                        $('#addUserModal').modal('hide');
                        $('#addUserForm')[0].reset();
                        clearForm('#addUserForm');
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
                text: "An error occurred while adding the user.",
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
//END OF SERVER SIDE ADDING OF USER

//EVENT LISTENERS
//EDIT BUTTON
$('#userEditBtn').on('click', function(e){
    e.preventDefault();

    function generalValidation(){
        var generalValidationComplete = true;
        // console.log('hello')
        emptyFieldExist('.add-edit-form-input-group')
        if(emptyFieldExist('.edit-user-form-input-group')){
           console.log("MAYROONG WALANG LAMAN")
           generalValidationComplete = false;
        }

        if(!humanNameValidation('.user-edit-form-input-name')){
            console.log("HUMAN NAME ERROR")
            generalValidationComplete = false;
        }

        if(!validateEmail('#userEditInputEmail')){
            console.log("EMAIL FORMAT ERROR")
            generalValidationComplete = false;
        }

        if(!validatePhoneNumber('#userEditInputPhoneNumber')){
            console.log("PHONE NUMBER FORMAT ERROR")
            generalValidationComplete = false;
        }


        return generalValidationComplete;
    }

    if(generalValidation()){
        Swal.fire({
            title: 'Are you sure you want to edit the information of this user?',
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
                serverEditUser();
            }
        });
    }
})
//EDIT BUTTON

//EDIT USER FUNCTION
function serverEditUser(){           
    $.ajax({
        url:'../../controller/user_management/editUser.php',
        type:'POST',
        dataType: 'json',
        data:{
            editUserId: $('#userEditUserId').val().trim(),
            editUserLevel: $('#userEditInputUserLevel').val().trim(),
            editUserDepartment: $('#userEditInputUserDepartment').val().trim(),
            editUserFirstName: $('#userEditInputFirstname').val().trim(),
            editUserMiddleName: $('#userEditInputMiddlename').val().trim(),
            editUserLastName: $('#userEditInputLastname').val().trim(),
            editUserSuffix: $('#userEditInputUserSuffix').val().trim(),
            editUserSex: $('#userEditInputSex').val().trim(),
            editUserBirthdate: $('#userEditInputBirthDate').val().trim(),
            editUserEmail: $('#userEditInputEmail').val().trim(),
            editUserPhoneNumber: $('#userEditInputPhoneNumber').val().trim(),
            editUserRegion: $('#regionEdit option:selected').val().trim(),
            editUserProvince: $('#provinceEdit option:selected').val().trim(),
            editUserCity: $('#cityEdit option:selected').val().trim(),
            editUserBarangay: $('#barangayEdit option:selected').val().trim(),  
            editUserStreet: $('#streetTextEdit').val().trim(),             

        },

        success: function(response){
            // console.log(response); // Log the response to check server's response
            console.log('hello im here at ajax serve')
            if (response.message === "Record updated successfully.") {
                // Display SweetAlert success message
                Swal.fire({
                    title: "User successfully updated!",
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
                        // Redirect or perform any additional action
                        displayUser();
                        $('#editUserModal').modal('hide');
                        $('#editUserForm')[0].reset();
                        clearForm('#editUserForm');
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
                text: "An error occurred while editting the user.",
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
//END OF SERVER SIDE ADDING OF USER
//END OF EDIT USER FUNCTION
//SUBMIT BUTTON EVENT
$('#userAddSubmitBtn').on('click', function(e){
    e.preventDefault();

    function generalValidation(){
        var generalValidationComplete = true;
        // console.log('hello')
        emptyFieldExist('.add-user-form-input-group')
        if(emptyFieldExist('.add-user-form-input-group')){
           console.log("MAYROONG WALANG LAMAN")
           generalValidationComplete = false;
        }

        if(!humanNameValidation('.user-add-form-input-name')){
            console.log("HUMAN NAME ERROR")
            generalValidationComplete = false;
        }

        if(!validateEmail('#userAddInputEmail')){
            console.log("EMAIL FORMAT ERROR")
            generalValidationComplete = false;
        }

        if(!validatePhoneNumber('#userAddInputPhoneNumber')){
            console.log("PHONE NUMBER FORMAT ERROR")
            generalValidationComplete = false;
        }


        return generalValidationComplete;
    }

    if(generalValidation()){
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
                serverAddUser();
            }
        });
    }
});
//END OF SUBMIT BUTTON EVENT

//NO MIDDLE NAME
$('#userAddInputNoMiddleName').on('change', function(e){
    e.preventDefault();
    var userAddEmailInput = $('#userAddInputMiddlename')
    if($(this).is(':checked')){
        userAddEmailInput.removeClass('is-valid is-invalid');
        userAddEmailInput.val("");
        userAddEmailInput.prop('disabled',true);
        clearErrorMessage($('#userAddInputMiddlename'))
        userAddEmailInput.addClass('is-valid')
    }else{
        userAddEmailInput.prop('disabled',false);
        userAddEmailInput.removeClass('is-valid is-invalid');
    }
});

$('#userEditInputNoMiddleName').on('change', function(e){
    e.preventDefault();
    var userEditEmailInput = $('#userEditInputMiddlename')
    if($(this).is(':checked')){
        userEditEmailInput.removeClass('is-valid is-invalid');
        userEditEmailInput.val("");
        userEditEmailInput.prop('disabled',true);
        clearErrorMessage($('#userEditInputMiddlename'))
        userEditEmailInput.addClass('is-valid')
    }else{
        userEditEmailInput.prop('disabled',false);
        userEditEmailInput.removeClass('is-valid is-invalid');
    }
});
//END OF NO MIDDLE NAME

//BIRTHDATE CONTROLS
// Get the current date
let currentDate = new Date();

// Subtract 18 years from the current date
let dateBefore18Years = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());

// Format the date as YYYY-MM-DD
let formattedDate = dateBefore18Years.toISOString().split('T')[0];

$('#userAddInputBirthDate').prop('max',formattedDate);

$('#userAddInputBirthDate').on('input', function() {
    $(this).removeClass('is-valid is-invalid');
    let userInput = $(this).val().trim();

    if(userInput > formattedDate){
        // console.log('mas malaki yung selected date')
        $(this).val("");
        $(this).addClass('is-invalid');
    }else{
        $(this).addClass('is-valid');
    }
});        

$('#userAddInputBirthDate').on('change', function(){
    console.log($(this).val())
})
//END OF BIRTHDATE CONTROLS

$('#userAddInputPhoneNumber, #userEditInputPhoneNumber').on('input keypress', function(event) {
    // Allow only numbers (0-9) and control keys (backspace, delete, arrow keys)
    if (!(event.key >= '0' && event.key <= '9') &&
        event.key !== 'Backspace' &&
        event.key !== 'Delete' &&
        event.key !== 'ArrowLeft' &&
        event.key !== 'ArrowRight') {
        event.preventDefault();
    }

    setTimeout(() => {
        var input = $(this);
        var value = input.val().replace(/\D/g, ''); // Remove all non-digit characters

        if (value.startsWith('63')) {
            value = '+' + value;
        } else if (value.startsWith('3')) {
            value = '+6' + value;
        } else if (value.startsWith('6')) {
            value = '+63' + value;
        } else if (value.length > 0) {
            value = '+63' + value;
        }

        if (value.length > 3) {
            value = value.slice(0, 3) + ' ' + value.slice(3);
        }

        if (value.length > 7) {
            value = value.slice(0, 7) + ' ' + value.slice(7);
        }

        if (value.length > 11) {
            value = value.slice(0, 11) + ' ' + value.slice(11);
        }

        if (value.length > 16) {
            value = value.slice(0, 16); // Limit to the required length
        }

        input.val(value);
        $('.phonenumber-wrong').remove();
        input.removeClass('is-invalid is-valid');

        if (value.length !== 16) {
            displayErrorMessage($(this), '• Phone number should follow this format "+63 XXX XXX XXXX".');
        } else {
            clearErrorMessage($(this))
            input.addClass('is-valid');
        }
    }, 0);

    if ($(this).val().length >= 16) {
        event.preventDefault();
        return false;
    }
});

$('#userAddInputPhoneNumber, #userEditInputPhoneNumber').on('paste', function(event) {
    var input = $(this);
    var currInput = $(this).val();

    setTimeout(() => {
        // console.log(input.val())
        if(input.val().length-3 <= 11){
            if (/[^0-9]/.test(input.val().substr(1))) {
                input.val(currInput);
            }
        }else{
            input.val('+63');
        }
    }, 1);

});
//END OF PHONE NUMBER CONTROL

//SELECT OPTION CONTROL
    var selects = $('.form-control-select')
    selects.each(function(index, select){
        var select = $(select);

        select.on('change', function(){
            select.removeClass('is-invalid is-valid')
            if(select.val() === ""){
                select.addClass('is-invalid')
            }else{
                select.addClass('is-valid')
            }
        })

    });
//END OF SELECT OPTION CONTROL

//EMAIL ADDRESS CONTROL
$('#userAddInputEmail, #userEditInputEmail').on('input', function(){
    setTimeout(() => {
        if ($(this).val() == "") {
            displayErrorMessage($(this), '• Please enter an email address.')
            return false;
        } else {
            clearErrorMessage($(this));
        }
        if (!emailPattern.test($(this).val())) {
            displayErrorMessage($(this), '• Please enter a valid email address.')
            return false;
        } else {
            clearErrorMessage($(this));
            $(this).addClass('is-valid');
        }                    
    }, 1);
})
//END OF EMAIL ADDRESS CONTROL

//HUMAN NAME CONTROL 
$('.user-edit-form-input-name, .user-add-form-input-name').on('input', function() {
    var inputName = $(this).val().trim();
    var regexForName = /^(?! )[A-Za-zñÑ][-' A-Za-zñÑ]*$/;
    const id = $(this).attr('id');
        let fieldName;

        if (id.startsWith('userAddInput')) {
            fieldName = id.replace('userAddInput', '');
        } else if (id.startsWith('userEditInput')) {
            fieldName = id.replace('userEditInput', '');
        }

    $(this).removeClass('is-invalid is-valid');
    $('.incorrect-name-format').remove()
    // Remove existing incorrect format messages for this field
    $(`.incorrect-${fieldName}-format`).remove();

    // Check if input matches the name regex
    if (regexForName.test(inputName)) {
        clearErrorMessage($(this));
        $(this).addClass('is-valid');
    } else {
        displayErrorMessage($(this), `• Please enter a valid ${fieldName.toLowerCase()}. Only letters, spaces, apostrophes, and hyphens are allowed`)
    }
});
//END OF HUMAN NAME CONTROL


//CLOSE BUTTON EVENT LISTENER
$('.userAddCloseBtn').on('click', function(){
    $('.error-message-text-group').remove()
    $('.user-form-input').each(function(){
        $(this).removeClass('is-invalid is-valid')
    })

})

$('#addUserModal, #editUserModal, #deleteUserModal, .userAddCloseBtn').on('hidden.bs.modal', function (e) {
$('.modal-backdrop').remove(); // Manually remove the backdrop
});        
//END OF CLOSE BUTTON EVENT LISTENER

$('#addUserModalDisplayBtn').on('click', function(){
    clearForm('#addUserForm');
})
//END OF EVENT LISTENERS
});
</script>