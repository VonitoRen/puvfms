<!-- SWAL -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css" />
<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close userEditCloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-12 grid-margin">
                <!-- Edit user form content goes here -->
                <form class="forms-sample" id="editUserForm">
                    <h6 class="card-description"> User Info </h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="userEditUserId">User Id</label>
                                <input type="text" name="userEditUserId" id="userEditUserId" class="form-control" disabled>

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="userEditInputUserLevel">User Level</label>

                                <select
                                    class="form-control edit-user-form-input-group user-form-input form-control-select"
                                    id="userEditInputUserLevel">
                                </select>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="userEditInputUserDepartment">Department</label>

                                <select
                                    class="form-control edit-user-form-input-group user-form-input form-control-select"
                                    id="userEditInputUserDepartment">
                                </select>


                            </div>
                        </div>

                        <hr class="col-md-12">
                        <h6 class="card-description col-md-12 mb-4"> Personal Info </h6>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="userEditInputFirstname">Firstname</label>

                                <input type="text"
                                    class="form-control edit-user-form-input-group user-form-input user-edit-form-input-name"
                                    id="userEditInputFirstname" placeholder="Firstname">


                            </div>
                        </div>

                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div class="form-group m-1 border">
                                <div class="col p-0 ml-3 border">
                                    <input type="checkbox" class="ml-3-form-check-input"
                                        id="userEditInputNoMiddleName"><span>I have no middle name</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text"
                                    class="form-control edit-user-form-input-group user-form-input user-edit-form-input-name"
                                    id="userEditInputMiddlename" placeholder="Middlename">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- NAME INPUT-->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>

                                <input type="text"
                                    class="form-control edit-user-form-input-group user-form-input user-edit-form-input-name"
                                    id="userEditInputLastname" placeholder="Lastname">

                            </div>
                        </div>


                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="userEditInputUserSuffix">Suffix</label>
                                <select
                                    class="form-control edit-user-form-input-group user-form-input form-control-select"
                                    id="userEditInputUserSuffix">
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
                        </div>

                        <div class="col-md-6">
                            <!-- END OF NAME INPUT-->
                            <div class="form-group">
                                <label for="userEditInputSex">Sex</label>
                                <select
                                    class="form-control edit-user-form-input-group user-form-input form-control-select"
                                    id="userEditInputSex">
                                    <option value="" selected disabled>Select your sex:</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userEditInputBirthDate">Birthdate</label>
                                <input type="date" class="form-control edit-user-form-input-group user-form-input" id="userEditInputBirthDate">
                            </div>
                        </div>

                        <hr class="col-md-12">

                        <h6 class="card-description col-md-12 mb-4"> Account Info </h6>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userEditInputEmail">Email Address</label>
                                <input type="email" class="form-control edit-user-form-input-group user-form-input" id="userEditInputEmail"
                                    placeholder="email@gmail.com">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userEditInputPhoneNumber">Phone Number</label>
                                <input type="text" class="form-control edit-user-form-input-group  user-form-input" id="userEditInputPhoneNumber"
                                    placeholder="+63 XX XXX XXXX">
                            </div>
                        </div>

                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="userEditInputPassword">Password</label>
                                <input type="password" class="form-control edit-user-form-input-group user-form-input" id="userEditInputPassword"
                                    placeholder="******">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userEditInputPassword">Confirm Password</label>
                                <input type="password" class="form-control edit-user-form-input-group user-form-input" id="userEditInputPassword"
                                    placeholder="******">
                            </div>
                        </div> -->

                        <hr class="col-md-12">
                        <h6 class="card-description col-md-12 mb-4"> Location Info </h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Region</label>
                                <select name="region"
                                    class="form-control user-form-input edit-user-form-input-group form-control user-form-input-md form-control-select region"
                                    id="regionEdit"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md region-combobox region-text"
                                    name="regionTextEdit" id="regionTextEdit" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Province</label>
                                <select name="province"
                                    class="form-control user-form-input edit-user-form-input-group form-control user-form-input-md form-control-select province"
                                    id="provinceEdit"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md province-text"
                                    name="provinceTextEdit" id="provinceTextEdit" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">City / Municipality</label>
                                <select name="city"
                                    class="form-control user-form-input edit-user-form-input-group form-control user-form-input-md form-control-select city"
                                    id="cityEdit"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md city-text"
                                    name="cityTextEdit" id="cityTextEdit" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barangay</label>
                                <select name="barangay"
                                    class="form-control user-form-input edit-user-form-input-group form-control user-form-input-md form-control-select barangay"
                                    id="barangayEdit"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md barangay-text"
                                    name="barangayTextEdit" id="barangayTextEdit" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetTextEdit" class="form-label">Street (Optional)</label>
                                <input type="text" class="form-control form-control street-text" name="streetTextEdit"
                                    id="streetTextEdit">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 bg-light text-right">
                        <button type="button" id="userEditBtn" class="btn btn-primary mr-2">Edit</button>
                        <button type="button" class="btn btn-dark userEditCloseBtn" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>