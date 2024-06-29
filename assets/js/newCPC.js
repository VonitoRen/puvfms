$(document).ready(function() {
    // Setting file input attributes
    $('input[type="file"]').attr('accept', '.pdf,.docx,.xlsx,.jpeg,.png');
    $('input[type="file"]').attr('required', true);
    $('select').attr('required', true);
    $('input[type="file"]').attr('accept', '.pdf,.docx,.xlsx,.jpeg,.png');
    $('input[type="file"]').attr('required', true);
    $('select').attr('required', true);

    $('#newCPCForm input, #newCPCForm select').each(function() {
        $(this).prop('required', true);
    });
    
    $('#logoutBtn').on('click', function () {
        alert('gumagana');
        window.location = "../../index.php";
    })

    $('#divQuestion1').on('change', function(){
        if($(this).val() === 'Yes'){
            $('#divQuestion1Requirement').prop('hidden', false);
        }else{
            $('#divQuestion1Requirement').prop('hidden', true);
        }
    })

    $('#divQuestion2').on('change', function(){
        $(".divQuestion2Requirement").each(function(){
            $(this).prop('hidden', true);
        })

        if($(this).val() == 2){
            $('#divQuestion2Requirement1').prop('hidden', false)
        }

        if($(this).val() == 3){
            $('#divQuestion2Requirement2').prop('hidden', false)
        }

        if($(this).val() == 4){
            $('#divQuestion2Requirement3').prop('hidden', false)
        }
    })

    $('#divQuestion3').on('change',function(){
        $('#divQuestion3Requirement1').prop('hidden', false)
        if($(this).val() === 'Yes'){
            $('#divQuestion3Requirement1').prop('hidden', true)
        }
    })

    $('#divQuestion4').on('change',function(){
        $('#divQuestion4Requirement1').prop('hidden', true)
        $('#divQuestion4Requirement2').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion4Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion4Requirement2').prop('hidden', false)
        }

    })

    $('#divQuestion5').on('change', function(){
        $('#divQuestion5Requirement1').prop('hidden', true)
        $('#divQuestion5Requirement2').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion5Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion5Requirement2').prop('hidden', false)
        }
    })

    $('#divQuestion6').on('change', function(){
        $('#divQuestion6Requirement1').prop('hidden', true)
        $('#divQuestion6Requirement2').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion6Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion6Requirement2').prop('hidden', false)
        }
    })

    $('#divQuestion7').on('change', function(){
        $('#divQuestion7Requirement1').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion7Requirement1').prop('hidden', false)
        }
    })

    $('#divQuestion8').on('change', function(){
        $('#divQuestion8Requirement1').prop('hidden', true)
        $('#divQuestion8Requirement2').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion8Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion8Requirement2').prop('hidden', false)
        }
    })

    $('#divQuestion9').on('change', function(){
        $('#divQuestion9Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion9Requirement1').prop('hidden', false)
        }
    })

    $('#divQuestion10').on('change', function(){
        $('#divQuestion10Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion10Requirement1').prop('hidden', false)
        }
    })

    
    $('#divQuestion11').on('change', function(){
        $('#divQuestion11Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion11Requirement1').prop('hidden', false)
        }
    })

    $('#divQuestion12').on('change', function(){
        $('#divQuestion12Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion12Requirement1').prop('hidden', false)
        }
    })

    $('#divQuestion13').on('change', function(){
        $('#divQuestion13Requirement1').prop('hidden', true)
        $('#divQuestion13Requirement2').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion13Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion13Requirement2').prop('hidden', false)
        }
    })
    
    $('#divQuestion14').on('change', function(){
        $('#divQuestion14Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion14Requirement1').prop('hidden', false)
        }


    })

    $('#divQuestion15').on('change', function(){
        $('#divQuestion15Requirement1').prop('hidden', true)


        if($(this).val() == 1){
            $('#divQuestion15Requirement1').prop('hidden', false)
        }


    })

    $('#divQuestion16').on('change', function(){
        $('#divQuestion16Requirement1').prop('hidden', true)
        $('#divQuestion16Requirement2').prop('hidden', true)
        $('#divQuestion16Requirement3').prop('hidden', true)
        $('#divQuestion16Requirement4').prop('hidden', true)
        $('#divQuestion16Requirement5').prop('hidden', true)
        $('#divQuestion16Requirement6').prop('hidden', true)

        if($(this).val() == 1){
            $('#divQuestion16Requirement1').prop('hidden', false)
        }

        if($(this).val() == 2){
            $('#divQuestion16Requirement2').prop('hidden', false)
        }

        if($(this).val() == 3){
            $('#divQuestion16Requirement3').prop('hidden', false)
        }

        if($(this).val() == 4){
            $('#divQuestion16Requirement4').prop('hidden', false)
        }

        if($(this).val() == 5){
            $('#divQuestion16Requirement5').prop('hidden', false)
        }

        if($(this).val() == 6){
            $('#divQuestion16Requirement6').prop('hidden', false)
        }




    })
    // Function to generate applicant number
    function generateApplicantNumber(callback) {
        $.ajax({
            url: '../../controller/application_management/generateApplicantNumber.php',
            type: 'post',
            success: function(response) {
                var applicantNumber = response.trim();
                callback(applicantNumber); // Pass applicantNumber to callback function
            },
            error: function(xhr, status, error) {
                console.error('Error generating applicant number:', error);
                callback(null); // Handle error case
            }
        });
    }

    // Event handler for form submission
    $('#newCPCStatusSubmitBtn').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData();
        
        // Check for empty required fields
        var isEmpty = false;
        $('#newCPCForm input[required], #newCPCForm select[required]').each(function() {
            $(this).removeClass('is-valid is-invalid');
            if ($(this).is(':visible')) {
                if ($(this).val() === null || $(this).val() === "") {
                    isEmpty = true;
                    $(this).addClass('is-invalid');
                } else {
                    if ($(this).attr('type') === 'file') {
                        var files = $(this)[0].files;
                        for (var i = 0; i < files.length; i++) {
                            formData.append($(this).attr('id') + '[]', files[i]);
                        }
                    } else {
                        formData.append($(this).attr('id'), $(this).val());
                    }
                }
            }
        });

        if (isEmpty) {
            console.log("Please fill in all required fields.");
            return;
        }

        // Function to upload files
        function uploadFile(generatedApplicantNumber) {
            $('input[type="file"][required]').each(function(index, element) {
                var files = element.files;
                var inputId = $(this).attr('id');
                var inputName = $(this).attr('name');
                var prefix = '';

                // Assign prefix based on inputId
                // Add your prefix logic here as per your requirement

                // Iterate over each file selected in the input
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var fileName = file.name;
                    var fileExt = fileName.split('.').pop(); // Get file extension
                    var newName = generatedApplicantNumber + '_' + prefix + '_' + i + '.' + fileExt;

                    formData.append(inputName, file, newName); // Append file with the new name
                }
            });

            formData.append('applicantNumber', generatedApplicantNumber);

            // Perform AJAX request to upload files
            $.ajax({
                url: '../../controller/application_management/uploadApplicationFile.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // Any actions before sending request
                },
                success: function(response) {
                    console.log('File upload successful:', response);
                    // Handle success response as needed
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading files:', error);
                    // Handle error case
                }
            });
        }

        // Call generateApplicantNumber to get the number and then upload files
        generateApplicantNumber(function(applicantNumber) {
            if (applicantNumber) {
                console.log('Generated Applicant Number:', applicantNumber);
                uploadFile(applicantNumber);
            } else {
                console.log('Failed to generate applicant number.');
            }
        });
    });

    // Additional event handlers for form elements
    // Handle question change events as needed
});



$(document).ready(function() {
    // Setting file input attributes
    $('input[type="file"]').attr('accept', '.pdf,.docx,.xlsx,.jpeg,.png');
    $('input[type="file"]').attr('required', true);
    $('select').attr('required', true);

    // Function to generate applicant number
    function generateApplicantNumber(callback) {
        $.ajax({
            url: '../../controller/application_management/generateApplicantNumber.php',
            type: 'post',
            success: function(response) {
                var applicantNumber = response.trim();
                callback(applicantNumber); // Pass applicantNumber to callback function
            },
            error: function(xhr, status, error) {
                console.error('Error generating applicant number:', error);
                callback(null); // Handle error case
            }
        });
    }

    // Event handler for form submission
    $('#newCPCStatusSubmitBtn').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData();
        
        // Check for empty required fields
        var isEmpty = false;
        $('#newCPCForm input[required], #newCPCForm select[required]').each(function() {
            $(this).removeClass('is-valid is-invalid');
            if ($(this).is(':visible')) {
                if ($(this).val() === null || $(this).val() === "") {
                    isEmpty = true;
                    $(this).addClass('is-invalid');
                } else {
                    if ($(this).attr('type') === 'file') {
                        var files = $(this)[0].files;
                        for (var i = 0; i < files.length; i++) {
                            formData.append($(this).attr('id') + '[]', files[i]);
                        }
                    } else {
                        formData.append($(this).attr('id'), $(this).val());
                    }
                }
            }
        });

        if (isEmpty) {
            console.log("Please fill in all required fields.");
            return;
        }

        // Function to upload files
        function uploadFile(generatedApplicantNumber) {
            $('input[type="file"][required]').each(function(index, element) {
                var files = element.files;
                var inputId = $(this).attr('id');
                var inputName = $(this).attr('name');
                var prefix = '';

                // Check each inputId separately
                if (inputId === 'file1') {
                    prefix = 'application_form';
                }

                if (inputId === 'file2') {
                    prefix = 'notarized_form';
                }

                // Check each inputId separately
                if (inputId === 'file3') {
                    prefix = 'attestation_paper';
                }

                if (inputId === 'file4') {
                    prefix = 'lto_or_cr';
                }
                
                if (inputId === 'file5') {
                    prefix = 'certificate_of_conformity';
                }

                if (inputId === 'file6') {
                    prefix = 'affidavit_of_undertaking';
                }
                if (inputId === 'file7') {
                    prefix = 'certificate_of_year_model_jao_2024_02_TH';
                }

                if (inputId === 'file8') {
                    prefix = 'certificate_of_business_name';
                }

                if (inputId === 'file9') {
                    prefix = 'proof_of_filipino_citizenship';
                }

                if (inputId === 'file10') {
                    prefix = 'articles_of_partnership_incorporations_and_by_laws';
                }

                if (inputId === 'file11') {
                    prefix = 'certificate_of_registration1';
                }
                
                if (inputId === 'file12') {
                    prefix = 'articles_of_cooperation_and_by_laws';
                }

                if (inputId === 'file13') {
                    prefix = 'certificate_of_registration2';
                }

                if (inputId === 'file14') {
                    prefix = 'certificate_of_good_standing';
                }

                if (inputId === 'file15') {
                    prefix = 'tct_or_tax_declaration';
                }

                if (inputId === 'file16') {
                    prefix = 'contract_of_lease_authority';
                }

                if (inputId === 'file17') {
                    prefix = 'income_tax_return_of_registration_bir';
                }

                if (inputId === 'file18') {
                    prefix = 'proof_of_bank_deposit1';
                }

                if (inputId === 'file19') {
                    prefix = 'proof_of_bank_deposit2';
                }

                if (inputId === 'file20') {
                    prefix = 'audited_financial_statement';
                }

                if (inputId === 'file21') {
                    prefix = 'ltfrb_inspection_report';
                }  

                if (inputId === 'file22') {
                    prefix = 'fleet_management_system';
                }  

                if (inputId === 'file23') {
                    prefix = 'afcs';
                }  

                if (inputId === 'file24') {
                    prefix = 'undertaking_to_with_afcs';
                }  
                
                if (inputId === 'file25') {
                    prefix = 'MC_2020-076';
                }  

                if (inputId === 'file26') {
                    prefix = 'ots';
                }  

                if (inputId === 'file27') {
                    prefix = 'ednorsement_letter_dotr_dot';
                }  

                if (inputId === 'file28') {
                    prefix = 'school_approval_letter';
                }  

                if (inputId === 'file29') {
                    prefix = 'proof_of_public_need';
                }  

                if (inputId === 'file30') {
                    prefix = 'shuttle_service_contract';
                }  

                if (inputId === 'file31') {
                    prefix = 'proof_certificate_of_existence_of_endpoint_terminals';
                }  


                // Iterate over each file selected in the input
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var fileName = file.name;
                    var fileExt = fileName.split('.').pop(); // Get file extension
                    var newName = generatedApplicantNumber + '_' + prefix + '_' + i + '.' + fileExt;
        
                    formData.append(inputName + '[' + i + ']', file, newName); // Append file with the new name
                }
            });

            formData.append('applicantNumber', generatedApplicantNumber);
            console.log(formData);
            // Perform AJAX request to upload files
            $.ajax({
                url: '../../controller/application_management/uploadApplicationFile.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // Any actions before sending request
                },
                success: function(response) {
                    console.log('File upload successful:', response);
                    // Handle success response as needed
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading files:', error);
                    // Handle error case
                }
            });
        }

        // Call generateApplicantNumber to get the number and then upload files
        generateApplicantNumber(function(applicantNumber) {
            if (applicantNumber) {
                console.log('Generated Applicant Number:', applicantNumber);
                uploadFile(applicantNumber);
            } else {
                console.log('Failed to generate applicant number.');
            }
        });
    });

    // Additional event handlers for form elements
    // Handle question change events as needed
});