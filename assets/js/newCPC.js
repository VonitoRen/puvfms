$(document).ready(function() {
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


    
    $('#newCPCStatusSubmitBtn').on('click', function(e) {
        e.preventDefault();
        var isEmpty = false;
        var formData = new FormData();
        var responseMessages = [];

        // Check if any required input fields are empty
        $('#newCPCForm input[required], #newCPCForm select[required]').each(function() {
            if ($(this).is(':visible')) {
                if ($(this).val() === null || $(this).val() === "") {
                    isEmpty = true;
                    responseMessages.push('Please fill out the required field: ' + $(this).attr('id'));
                    // $(this).addClass('is-invalid')
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
        console.log (responseMessages)
        if(isEmpty){
            console.log("please fill up")
            return false;
        }
        
        function uploadFile(){
            var formData = new FormData();


            // Loop through each input and append to formData
            for (var i = 1; i <= 10; i++) {
                var inputVal = $('#input' + i).val();
                formData.append('inputs[' + i + ']', inputVal);
            }

            // Additional condition for input5 based on isCarDriver selection
            if ($('#isCarDriver').val() === 'yes') {
                var input5Val = $('#input5').val();
                formData.append('input5', input5Val);
            }

            $.ajax({
               url: '../../controller/application_management/uploadApplicationFile.php', // URL to your PHP upload script
               type: 'POST',
               data: formData,
               processData: false,
               contentType: false,
               beforeSend: function() {

               },
               success: function(response) {
                console.log(response)
               },
               error: function(xhr, status, error) {
   
               }
           });
        }
    });
});

