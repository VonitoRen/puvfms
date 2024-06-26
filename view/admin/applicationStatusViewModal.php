 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="viewApplicationStatusModal" tabindex="-1" role="dialog" aria-labelledby="viewApplicationStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">View Application Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="applicationStatusForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="applicationStatusViewId">Application Status Id</label>
              <input type="text" class="form-control form-control-application-status" name="applicationStatusViewId" id="applicationStatusViewId" disabled>
            </div>
            <div class="form-group">
              <label for="applicationStatusViewName">Application Status</label>
               <input type="text" id="applicationStatusViewName" name ="applicationStatusViewName" class="form-control form-control-application-status" disabled>
            </div>
            <div class="form-group">
              <label for="applicationStatusViewDescription" >Application Status Description</label>
              <textarea class="form-control form-control-application-status" name ="applicationStatusViewDescription" id="applicationStatusViewDescription" rows="4" disabled></textarea>
            </div>
            <div class="form-group">
              <label for="applicationStatusViewNameCreatedAt">Created At</label>
               <input type="text" id="applicationStatusViewCreatedAt" name ="applicationStatusViewCreatedAt" class="form-control form-control-application-status" disabled>
            </div>
            <button type="button" class="btn btn-dark applicationStatusViewCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
    
</script>



  </body>
</html>