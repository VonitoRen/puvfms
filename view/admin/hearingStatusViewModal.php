 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="viewHearingStatusModal" tabindex="-1" role="dialog" aria-labelledby="viewHearingStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="viewHearingStatusModalLabel">View Hearing Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="hearingStatusForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="hearingStatusViewId">Hearing Status Id</label>
              <input type="text" class="form-control form-control-hearing-status" name="hearingStatusViewId" id="hearingStatusViewId" disabled>
            </div>
            <div class="form-group">
              <label for="hearingStatusViewName">Hearing Status</label>
               <input type="text" id="hearingStatusViewName" name ="hearingStatusViewName" class="form-control form-control-hearing-status" disabled>
            </div>
            <div class="form-group">
              <label for="hearingStatusViewDescription" >Hearing Status Description</label>
              <textarea class="form-control form-control-hearing-status" name ="hearingStatusViewDescription" id="hearingStatusViewDescription" rows="4" disabled></textarea>
            </div>
            <div class="form-group">
              <label for="hearingStatusViewNameCreatedAt">Created At</label>
               <input type="text" id="hearingStatusViewCreatedAt" name ="hearingStatusViewCreatedAt" class="form-control form-control-hearing-status" disabled>
            </div>
            <button type="button" class="btn btn-dark hearingStatusViewCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
    
</script>



  </body>
</html>