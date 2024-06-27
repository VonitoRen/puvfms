 <!-- SWAL -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css"/>

<!-- Edit User Modal -->
<div class="modal fade" id="viewServiceModal" tabindex="-1" role="dialog" aria-labelledby="viewServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModalLabel">View Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Edit user form content goes here -->
          <form id="serviceForm" class="forms-sample" method="post">
            
            <div class="form-group">
              <label for="serviceViewId">Service Id</label>
              <input type="text" class="form-control form-control-application-status" name="serviceViewId" id="serviceViewId" disabled>
            </div>
            <div class="form-group">
              <label for="serviceViewName">Service</label>
               <input type="text" id="serviceViewName" name ="serviceViewName" class="form-control form-control-application-status" disabled>
            </div>
            <div class="form-group">
              <label for="serviceViewDescription" >Service Description</label>
              <textarea class="form-control form-control-application-status" name ="serviceViewDescription" id="serviceViewDescription" rows="4" disabled></textarea>
            </div>
            <div class="form-group">
              <label for="serviceViewNameCreatedAt">Created At</label>
               <input type="text" id="serviceViewCreatedAt" name ="serviceViewCreatedAt" class="form-control form-control-application-status" disabled>
            </div>
            <button type="button" class="btn btn-dark serviceViewCloseBtn" data-dismiss="modal" id="cancelBtn">Cancel</button>
          </form>
      </div>
    </div>
  </div>
</div>

<script>
  
    
</script>



  </body>
</html>