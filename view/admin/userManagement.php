<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php 
      include_once('../sidebar.php');
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php
        include_once('../topbar.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
          <!-- content-wrapper starts-->
          <div class="content-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add User</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="userLevel">User Level</label>
                                        <select class="form-control user-form-input form-control-select" id="userAddInputUserLevel">

                                        </select>
                                    </div>

                                    <!-- NAME INPUT-->
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" class="form-control user-form-input user-form-input-name" id="userAddInputLastname" placeholder="Lastname">
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" class="form-control user-form-input user-form-input-name" id="userAddInputFirstname" placeholder="Firstname">
                                    </div>

                                    <div class="form-group">
                                        <div class="row" >
                                            <div class="col-1"> 
                                                <input type="checkbox" class="form-control" id="userAddInputNoMiddleName">
                                            </div>

                                            <div class="col d-flex align-items-center" style="left:-1em;">
                                                <span>I have no middle name</span>
                                            </div>
                                        </div>
                                    </div>
                                       

                                    <div class="form-group">
                                        <label for="middlename">Middlename</label>
                                        <input type="text" class="form-control user-form-input user-form-input-name" id="userAddInputMiddlename" placeholder="Middlename">
                                    </div>

                                    <div class="form-group">
                                    <label for="userSuffix">Suffix</label>
                                        <select class="form-control user-form-input form-control-select" id="userAddInputUserSuffix">
                                            <option value="" selected disabled>Suffix</option>
                                            <option value="none">N/A</option>
                                            <option value="Jr.">Jr.</option>
                                            <option value="Sr.">Sr.</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>

                                    <!-- END OF NAME INPUT-->
                                    <div class="form-group">
                                        <label for="userAddInputSex">Sex</label>
                                        <select class="form-control user-form-input form-control-select" id="userAddInputSex">
                                            <option value="" selected disabled>Select your sex:</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="userAddInputBirthDate">Birthdate</label>
                                        <input type="date" class="form-control user-form-input" id="userAddInputBirthDate">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputEmail">Email Address</label>
                                        <input type="email" class="form-control user-form-input" id="userAddInputEmail" placeholder="email@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputPhoneNumber">Phone Number</label>
                                        <input type="text" class="form-control  user-form-input" id="userAddInputPhoneNumber" placeholder="+63 XX XXX XXXX">
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputPassword">Password</label>
                                        <input type="password" class="form-control user-form-input" id="userAddInputPassword" placeholder="******">
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label">Region</label>
                                        <select name="region" class="form-control user-form-input form-control user-form-input-md form-control-select" id="region"></select>
                                        <input type="hidden" class="form-control user-form-input form-control user-form-input-md" name="region_text" id="region-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Province</label>
                                        <select name="province" class="form-control user-form-input form-control user-form-input-md form-control-select" id="province"></select>
                                        <input type="hidden" class="form-control user-form-input form-control user-form-input-md" name="province_text" id="province-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">City / Municipality</label>
                                        <select name="city" class="form-control user-form-input form-control user-form-input-md form-control-select" id="city"></select>
                                        <input type="hidden" class="form-control user-form-input form-control user-form-input-md" name="city_text" id="city-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Barangay</label>
                                        <select name="barangay" class="form-control user-form-input form-control user-form-input-md form-control-select" id="barangay"></select>
                                        <input type="hidden" class="form-control user-form-input form-control user-form-input-md" name="barangay_text" id="barangay-text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="street-text" class="form-label">Street (Optional)</label>
                                        <input type="text" class="form-control form-control" name="street_text" id="street-text">
                                    </div>                                    

                                    <!-- <div class="form-group">
                                        <label for="userAddInputRegion">Region</label>
                                        <select name="userAddInputRegion" id="userAddInputRegion">
                                        <option value="" selected disabled>Select your region:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputProvince">Province</label>
                                        <select name="userAddInputProvince" id="userAddInputProvince">
                                        <option value="" selected disabled>Select your province:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputCity">City/Municipality</label>
                                        <select name="userAddInputCity" id="userAddInputCity">
                                        <option value="" selected disabled>Select your city/municipality:</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddInputBarangay">City/Municipality</label>
                                        <select name="userAddInputBarangay" id="userAddInputBarangay">
                                        <option value="" selected disabled>Select your barangay:</option>
                                        </select>
                                    </div> -->
                                    <button id="userAddSubmitBtn" class="btn btn-primary mr-2">Submit</button>
                                    <button type="button" class="btn btn-dark">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php 
          include_once('../footer.php');
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/ph-address-selector.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->

    <script>
        //Displaying options for user level
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
                            userLevelInput.append($('<option></option>').val("").text("Select user level."))
                            userLevelOptions.forEach(function(userLevel) {
                                console.log(userLevel);
                                var option = $('<option></option>').val(userLevel.user_level).text(userLevel.user_level_name.trim());
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
    //End of Displaying options for user level

    //FORM VALIDATION
        //EMPTY INPUT FIELD VALIDATION
        function emptyFieldExist() {
            const userAddFields = $('.user-form-input');
            let emptyFieldExist = false;

            userAddFields.each(function() {
                const $this = $(this);
                // Remove previous validation classes


                if (!$this.prop('disabled') && !$this.val()) {
                    emptyFieldExist = true;

                } else if (!$this.prop('disabled') && $this.val()) {

                }
            });

            return emptyFieldExist;
        }
        //END OF EMPTY FIELD VALIDATION

        //EMAIL AND PASSWORD VALIDATION
            const userAddEmailInput = $('#userAddInputEmail');
            const userAddPasswordInput = $('#userAddInputPassword');
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;		
            function emailAndPasswordValidation() {


                //EMAIL VALIDATION
                if (userAddEmailInput.val() == "") {
                    userAddEmailInput.next('.form-text').remove();
                    let messageParagraph = $('<small>', {
                        class: 'form-text text-danger',
                        text: '• Please enter an email address.'
                    });
                    userAddEmailInput.after(messageParagraph);
                    userAddEmailInput.addClass('is-invalid');
                    return false;
                } else {
                    userAddEmailInput.next('.form-text').remove();
                    userAddEmailInput.removeClass('is-invalid');
                }

                if (!emailPattern.test(userAddEmailInput.val())) {
                    userAddEmailInput.next('.form-text').remove();
                    let messageParagraph = $('<small>', {
                        class: 'form-text text-danger',
                        text: '• Please enter a valid email address.'
                    });
                    userAddEmailInput.after(messageParagraph);
                    userAddEmailInput.addClass('is-invalid');
                    return false;
                } else {
                    userAddEmailInput.next('.form-text').remove();
                    userAddEmailInput.removeClass('is-invalid');
                }
                //END OF EMAIL VALIDATION


                return true;
            }

        //END OF EMAIL AND PASSWORD VALIDATION

        //PHONE NUMBER INPUT VALIDATION
            function phoneNumberInputValidation(){
                var userPhoneNumberInput = $('#userAddInputPhoneNumber')
                userPhoneNumberInput.removeClass('is-invalid is-valid')
                $('.phonenumber-wrong').remove();
                if(userPhoneNumberInput.val() === "+63 "){
                    userPhoneNumberInput.addClass('is-invalid');
                }

                if(userPhoneNumberInput.val().length != 16){

                        let messageParagraph1 = $('<small>', {
                            class: 'phonenumber-wrong text-danger mt-2',
                            html: '• Phone number should follow this format "+63 XXX XXX XXXX".<br>'

                        });     
                        $(userPhoneNumberInput).after(messageParagraph1);  
                        $(userPhoneNumberInput).addClass('is-invalid');
                    userPhoneNumberInput.addClass('is-invalid')
                }else{
                    userPhoneNumberInput.addClass('is-valid')     
                }
            }
        //END OF PHONE NUMBER INPUT VALIDATION

        //PHONE NUMBER INPUT VALIDATION
        function userNameValidation(){
                var userNameInputs = $('.user-form-input-name')
                var regexForUserName = /^([A-Za-z]|[-' ]?[A-Za-z]+)*$/;
                userNameInputs.removeClass('is-invalid is-valid')

                userNameInputs.each(function(){
                    if(regexForUserName.test($(this).val().trim())){

                        $(this).addClass('is-valid');
                    }else{  
                        console.log("this contains bitch;")
                        $(this).addClass('is-invalid');
                    }
                })
            }
        //END OF PHONE NUMBER INPUT VALIDATION  

        //PHONE NUMBER INPUT VALIDATION
        function passwordValidation(){
                var password = $('#userAddInputPassword').val();
                var specialCharPattern = /[!@#$%^&*(),.?":{}|<>]/;
                var noError = true;
                // Remove existing error messages
                $('.form-text1').remove();
                $('.form-text2').remove();
                $('#userAddInputPassword').removeClass('is-invalid');
                // Validate password length
                if (password.length < 6) {
                    let messageParagraph1 = $('<small>', {
                        class: 'form-text1 text-danger mt-2',
                        html: '• Password should be a 6-digit character.<br>'

                    });     
                    $('#userAddInputPassword').after(messageParagraph1);  
                    $('#userAddInputPassword').addClass('is-invalid');
                    
                    noError = false;
                }
                // Validate special characters
                if (!specialCharPattern.test(password)) {
                    let messageParagraph2 = $('<small>', {
                        class: 'form-text2 text-danger mt-2',
                        html: '• Password should contain at least 1 special character.<br>'
                    });     
                    $('#userAddInputPassword').after(messageParagraph2);  
                    $('#userAddInputPassword').addClass('is-invalid');
                    noError = false;
                }   
                console.log
                
                if(noError){
                    $('#userAddInputPassword').removeClass('is-invalid');
                    $('#userAddInputPassword').addClass('is-valid');
                }
            }
        //END OF PHONE NUMBER INPUT VALIDATION  

        //PHONE NUMBER INPUT VALIDATION
        function humanNameValidation(){
                var humanNameInputFields = $('.user-form-input-name')
                $('.incorrect-Lastname-format').remove();
                $('.incorrect-Firstname-format').remove();
                $('.incorrect-Middlename-format').remove();
                $('.incorrect-name-format').remove()
                var regexForHumanName = /^([A-Za-z]|[-' ]?[A-Za-z]+)*$/;
                humanNameInputFields.each(function(){
                var fieldHumanName = $(this).attr('id').replace('userAddInput', ''); 
                $(this).removeClass('is-invalid is-valid');
                    if (regexForHumanName.test($(this).val().trim())) {
                        $(this).addClass('is-valid');
                    } else {
                        let incorrentNameFormatMessage = $('<small>', {
                        class: `incorrect-${fieldHumanName}-format text-danger mt-2`,
                        html: `• Please enter a valid ${fieldHumanName.toLowerCase()}. Only letters, spaces, apostrophes, and hyphens are allowed.<br>`
                        });     
                        $(this).after(incorrentNameFormatMessage);  
                        $(this).addClass('is-invalid');
                    }
                })

        }
        //END OF PHONE NUMBER INPUT VALIDATION          

    //END OF FORM VALIDATION

    //EVENT LISTENERS
        //SUBMIT BUTTON EVENT
        $('#userAddSubmitBtn').on('click', function(e){
            e.preventDefault();



            if(emptyFieldExist()){
                console.log("MAYROONG WALANG LAMAN")
            }else{
                console.log("MAY LAMAN")
                humanNameValidation()
                userNameValidation();
                emailAndPasswordValidation();
                phoneNumberInputValidation();
                passwordValidation();
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
                $('.incorrect-Middlename-format').remove();
            }else{
                userAddEmailInput.prop('disabled',false);
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
                console.log('mas malaki yung selected date')
                $(this).val("");
                $(this).addClass('is-invalid');
            }else{
                $(this).addClass('is-valid');
            }
        });        
        //END OF BIRTHDATE CONTROLS

        //PASSWORD INFORMATION RECOMMENDATION CONTROL
        $('#userAddInputPassword').on('focus',function(){
            $(this).append('<p></p>')
        });
        //END OF PASSWORD INFORMATION RECOMMENDATION CONTROL

        //PHONE NUMBER CONTROL
        // $('#userAddInputPhoneNumber').on('focus',function(){
        //     if (!$(this).val().startsWith('+63 ')) {
        //         $(this).val('+63 ');
        //     }
        // });

        // $('#userAddInputPhoneNumber').on('keyup',function(){
        //     if (!$(this).val().startsWith('+63 ')) {
        //         $(this).val('+63 ');
        //     }
        // });
        
        $('#userAddInputPhoneNumber').on('input keypress', function(event) {
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
                    let messageParagraphWrongPhoneNumberFormat = $('<small>', {
                        class: 'phonenumber-wrong text-danger mt-2',
                        html: '• Phone number should follow this format "+63 XXX XXX XXXX".<br>'
                    });
                    input.after(messageParagraphWrongPhoneNumberFormat);
                    input.addClass('is-invalid');
                } else {
                    input.addClass('is-valid');
                }
            }, 0);

            if ($(this).val().length >= 16) {
                event.preventDefault();
                return false;
            }
        });

        $('#userAddInputPhoneNumber').on('paste', function(event) {
            var input = $(this);
            var currInput = $(this).val();

            setTimeout(() => {
                console.log(input.val())
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

        //USER PASSWORD CONTROL
        $('#userAddInputPassword').on('input', function(event){
            setTimeout(() => {
                console.log($(this).val())
                    var password = $(this).val();
                    var specialCharPattern = /[!@#$%^&*(),.?":{}|<>]/;
                    var noError = true;
                    // Remove existing error messages
                    $('.form-text1').remove();
                    $('.form-text2').remove();
                    $(this).removeClass('is-invalid');

                    // Validate password length
                    if (password.length < 6) {
                        
                        let messageParagraph1 = $('<small>', {
                            class: 'form-text1 text-danger mt-2',
                            html: '• Password should be a 6-digit character.<br>'

                        });     
                        $(this).after(messageParagraph1);  
                        $(this).addClass('is-invalid');
                        
                        noError = false;
                    }

                    // Validate special characters
                    if (!specialCharPattern.test(password)) {
                        let messageParagraph2 = $('<small>', {
                            class: 'form-text2 text-danger mt-2',
                            html: '• Password should contain at least 1 special character.<br>'
                        });     
                        $(this).after(messageParagraph2);  
                        $(this).addClass('is-invalid');
                        noError = false;
                    }   
                    console.log
                    
                    if(noError){
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                    }
            }, 1);
        });
        //END OF USER PASSWORD CONTROL

        //EMAIL ADDRESS CONTROL
        userAddEmailInput.on('input', function(){
            setTimeout(() => {
                if ($(this).val() == "") {
                    $(this).next('.form-text').remove();
                    let messageParagraph = $('<small>', {
                        class: 'form-text text-danger',
                        text: '• Please enter an email address.'
                    });
                    $(this).after(messageParagraph);
                    $(this).addClass('is-invalid');
                    return false;
                } else {
                    $(this).next('.form-text').remove();
                    $(this).removeClass('is-invalid');
                }
                if (!emailPattern.test($(this).val())) {
                    $(this).next('.form-text').remove();
                    let messageParagraph = $('<small>', {
                        class: 'form-text text-danger',
                        text: '• Please enter a valid email address.'
                    });
                    $(this).after(messageParagraph);
                    $(this).addClass('is-invalid');
                    return false;
                } else {
                    $(this).next('.form-text').remove();
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }                    
            }, 1);
        })
        //END OF EMAIL ADDRESS CONTROL

        //HUMAN NAME CONTROL 
        $('#userAddInputLastname, #userAddInputFirstname, #userAddInputMiddlename').on('input', function() {
            var inputName = $(this).val().trim();
            var regexForName = /^([A-Za-z]|[-' ]?[A-Za-z]+)*$/;
            var fieldName = $(this).attr('id').replace('userAddInput', ''); // Extract field name (e.g., Lastname, Firstname, Middlename)
            $(this).removeClass('is-invalid is-valid');
            $('.incorrect-name-format').remove()
            // Remove existing incorrect format messages for this field
            $(`.incorrect-${fieldName}-format`).remove();

            // Check if input matches the name regex
            if (regexForName.test(inputName)) {
                $(this).addClass('is-valid');
            } else {
                $(this).addClass('is-invalid');
                let incorrectNameFormatMessage = $('<small>', {
                    class: `incorrect-${fieldName}-format text-danger mt-2`,
                    html: `• Please enter a valid ${fieldName.toLowerCase()}. Only letters, spaces, apostrophes, and hyphens are allowed.<br>`
                }); 


                $(this).after(incorrectNameFormatMessage);
                $(this).addClass('is-invalid');
            }
        });
        //END OF HUMAN NAME CONTROL
    //END OF EVENT LISTENERS
    </script>
    <!-- End custom js for this page -->
  </body>
</html>