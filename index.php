<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
	<link href="assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body>
    
<div class="container" id="container" style="margin-top: 10%;">
	<div class="form-container sign-in-container">
		<form id = "userLoginForm">
			<h1>Login</h1>
				<div class="form-group" style="width: 23em;">
                    <input type="text" class="form-control form-control-user" id="userInputEmail" aria-describedby="usernameHelp"  placeholder="Email">
                </div>
                <div class="form-group" style="width: 23em;">
                    <input type="password" class="form-control form-control-user" id="userInputPassword" aria-describedby="passwordHelp" placeholder="Password">
                </div>
                <button  id="loginBtn" style="width: 12em; height: 2.7em;background-color: #fcd116; color: white; border: none; border-radius: 20px;" class="btn btn-user btn-block mt-4">LOGIN</button>
		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
            <img src="assets/images/ltftblogo.png" alt="logo" style="width:100px; margin-bottom:20px;">
				<h1>Public Utility Vehicle Franchise Management System</h1>
                <a href="#" id="signIn" style="color:white;margin-top:50px;">Cancel</a>
				
			</div>
			<div class="overlay-panel overlay-right">
                <img src="assets/images/ltftblogo.png" alt="logo" style="width:100px; margin-bottom:20px;">
				<h1 style="margin-bottom:20px;">Public Utility Vehicle Franchise Management System</h1>
			</div>
		</div>
	</div>
</div>

    <!-- inserting external JS -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>

	<script>
    const userEmailInput = $('#userInputEmail');
    const userPasswordInput = $('#userInputPassword');
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;		
    function checkForEmptyField() {


		//EMAIL VALIDATION
        if (userEmailInput.val() == "") {
            userEmailInput.next('.form-text').remove();
            let messageParagraph = $('<small>', {
                class: 'form-text text-danger',
                text: 'Please enter an email address or phone number.'
            });
            userEmailInput.after(messageParagraph);
            userEmailInput.addClass('is-invalid');
            return false;
        } else {
            userEmailInput.next('.form-text').remove();
            userEmailInput.removeClass('is-invalid');
        }

        if (!emailPattern.test(userEmailInput.val())) {
            userEmailInput.next('.form-text').remove();
            let messageParagraph = $('<small>', {
                class: 'form-text text-danger',
                text: 'Please enter a valid email address.'
            });
            userEmailInput.after(messageParagraph);
            userEmailInput.addClass('is-invalid');
            return false;
        } else {
            userEmailInput.next('.form-text').remove();
            userEmailInput.removeClass('is-invalid');
        }
		//END OF EMAIL VALIDATION

		//PASSWORD VALIDATION
        if (userPasswordInput.val() == "") {
            userPasswordInput.next('.form-text').remove();
            let messageParagraph = $('<small>', {
                class: 'form-text text-danger',
                text: 'Please enter a password.'
            });		
			userPasswordInput.after(messageParagraph);	
            userPasswordInput.addClass('is-invalid');
            return false;
        } else {
            userPasswordInput.next('.form-text').remove();
            userPasswordInput.removeClass('is-invalid');
        }

        if (userPasswordInput.val().length < 6) {
            userPasswordInput.next('.form-text').remove();
            let messageParagraph = $('<small>', {
                class: 'form-text text-danger',
                text: 'The password you provided must have at least 6 characters.'
            });		
			userPasswordInput.after(messageParagraph);	
            userPasswordInput.addClass('is-invalid');
            return false;
        } else {
            userPasswordInput.next('.form-text').remove();
            userPasswordInput.removeClass('is-invalid');
        }
		//END OF PASSWORD VALIDATION
        return true;
    }


    $('#loginBtn').on('click', function(e) {
        e.preventDefault(); // Prevent form submission


		if(checkForEmptyField()){
			serverAuthetication();
		}

		function serverAuthetication(){
			$.ajax({
				url:'controller/authentication.php',
				type:'POST',
				data:{
					email: $('#userInputEmail').val(),
					password: $('#userInputPassword').val()
				},
				success: function(response){
					console.log(response.trim());
					function authenticate(response){
						if(response.trim() == "User not found or error occurred."){
							userPasswordInput.next('.form-text').remove();
							let messageParagraph1 = $('<small>', {
								class: 'form-text text-danger',
								text: 'Incorrect email or password. Please try again.'
							});		
							userPasswordInput.after(messageParagraph1);	
							userPasswordInput.addClass('is-invalid');

							userEmailInput.next('.form-text').remove();
							let messageParagraph2 = $('<small>', {
								class: 'form-text text-danger',
								text: 'Incorrect email or password. Please try again.'
							});		
							userEmailInput.after(messageParagraph2);	
							userEmailInput.addClass('is-invalid');
							return false;
						} else {
							userPasswordInput.next('.form-text').remove();
							userPasswordInput.removeClass('is-invalid');
							userEmailInput.next('.form-text').remove();
							userEmailInput.removeClass('is-invalid');
							window.location = "view/admin/homepage.php";
						}
					}

				authenticate(response);


				},
				error: function(error, status, xhr){

				}
			})
		}
    });


</script>
</body>
</html>

<!-- <div class="form-container sign-up-container">
		<form action="#">
			<h1>Forgot Password</h1>
	
			<input type="text" placeholder="Username" />
			<input type="password" placeholder="Password" />
			<input type="password" placeholder="Confirm Password" />
			<button>Confirm</button>
		</form>
	</div> -->
