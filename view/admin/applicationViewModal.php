 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->



<div class="modal fade" id="viewApplicationModal" tabindex="-1" role="dialog"
    aria-labelledby="viewApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewApplicationModalLabel">
                    View Documents 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit user form content goes here -->
                <form id="applicationForm" class="forms-sample" method="post">
                    <hr>
                    <button type="button" class="btn btn-primary mr-2" id="addApplicationSubmitBtn">
                        Submit
                    </button>
                    <button type="button" class="btn btn-dark applicationAddCloseBtn" data-dismiss="modal"
                        id="cancelBtn">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filePreviewModal" tabindex="-1" role="dialog" aria-labelledby="filePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filePreviewModalLabel">File Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Iframe for file preview -->
                <iframe id="filePreviewFrame" width="100%" height="800px"></iframe>
            </div>
        </div>
    </div>
</div>
<script>
// Get the modal

</script>



  </body>
</html>