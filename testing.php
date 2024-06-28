<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Upload PDF File</h2>
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf">
        <button type="button" id="uploadBtn">Upload</button>
    </form>

    <div id="uploadStatus"></div>

    <script>
        $(document).ready(function() {
            $('#uploadBtn').on('click', function() {
                var formData = new FormData();
                formData.append('pdfFile', $('#pdfFile')[0].files[0]);

                $.ajax({
                    url: 'upload.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#uploadStatus').html(response);
                    },
                    error: function(xhr, status, error) {
                        $('#uploadStatus').html('File upload failed.');
                    }
                });
            });
        });
    </script>
</body>
</html>