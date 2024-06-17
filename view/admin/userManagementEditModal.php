  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Edit user form content goes here -->
          <form id="editUserForm">
            <div class="form-group">
              <label for="userName">User Name</label>
              <input type="text" class="form-control" id="userName" placeholder="Enter user name">
            </div>
            <div class="form-group">
              <label for="userEmail">Email address</label>
              <input type="email" class="form-control" id="userEmail" placeholder="Enter email">
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>