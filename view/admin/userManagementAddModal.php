<!-- SWAL -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../../swal/swal.css" />
<!-- Edit User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close userAddCloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-12 grid-margin">
                <!-- Edit user form content goes here -->
                <form class="forms-sample" id="addUserForm">
                    <h6 class="card-description"> User Info </h6>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="userLevel">User Level</label>

                                <select
                                    class="form-control add-user-form-input-group user-form-input form-control-select"
                                    id="userAddInputUserLevel">
                                </select>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="userDepartment">Department</label>

                                <select
                                    class="form-control add-user-form-input-group user-form-input form-control-select"
                                    id="userAddInputUserDepartment">
                                </select>


                            </div>
                        </div>

                        <hr class="col-md-12">
                        <h6 class="card-description col-md-12 mb-4"> Personal Info </h6>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>

                                <input type="text"
                                    class="form-control add-user-form-input-group user-form-input user-add-form-input-name"
                                    id="userAddInputFirstname" placeholder="Firstname">


                            </div>
                        </div>

                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                            <div class="form-group m-1 border">
                                <div class="col p-0 ml-3 border">
                                    <input type="checkbox" class="ml-3-form-check-input"
                                        id="userAddInputNoMiddleName"><span>I have no middle name</span>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text"
                                    class="form-control add-user-form-input-group user-form-input user-add-form-input-name"
                                    id="userAddInputMiddlename" placeholder="Middlename">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- NAME INPUT-->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>

                                <input type="text"
                                    class="form-control add-user-form-input-group user-form-input user-add-form-input-name"
                                    id="userAddInputLastname" placeholder="Lastname">

                            </div>
                        </div>


                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="userSuffix">Suffix</label>
                                <select
                                    class="form-control add-user-form-input-group user-form-input form-control-select"
                                    id="userAddInputUserSuffix">
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
                                <label for="userAddInputSex">Sex</label>
                                <select
                                    class="form-control add-user-form-input-group user-form-input form-control-select"
                                    id="userAddInputSex">
                                    <option value="" selected disabled>Select your sex:</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userAddInputBirthDate">Birthdate</label>
                                <input type="date" class="form-control add-user-form-input-group user-form-input" id="userAddInputBirthDate">
                            </div>
                        </div>

                        <hr class="col-md-12">

                        <h6 class="card-description col-md-12 mb-4"> Account Info </h6>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userAddInputEmail">Email Address</label>
                                <input type="email" class="form-control add-user-form-input-group user-form-input" id="userAddInputEmail"
                                    placeholder="email@gmail.com">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="userAddInputPhoneNumber">Phone Number</label>
                                <input type="text" class="form-control add-user-form-input-group  user-form-input" id="userAddInputPhoneNumber"
                                    placeholder="+63 XX XXX XXXX">
                            </div>
                        </div>


                        <hr class="col-md-12">
                        <h6 class="card-description col-md-12 mb-4"> Location Info </h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Region</label>
                                <select name="region"
                                    class="form-control user-form-input add-user-form-input-group form-control user-form-input-md form-control-select region"
                                    id="regionAdd"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md region-combobox region-text"
                                    name="regionTextAdd" id="regionTextAdd" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Province</label>
                                <select name="province"
                                    class="form-control user-form-input add-user-form-input-group form-control user-form-input-md form-control-select province"
                                    id="provinceAdd"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md province-text"
                                    name="provinceTextAdd" id="provinceTextAdd" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">City / Municipality</label>
                                <select name="city"
                                    class="form-control user-form-input add-user-form-input-group form-control user-form-input-md form-control-select city"
                                    id="cityAdd"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md city-text"
                                    name="cityTextAdd" id="cityTextAdd" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Barangay</label>
                                <select name="barangay"
                                    class="form-control user-form-input add-user-form-input-group form-control user-form-input-md form-control-select barangay"
                                    id="barangayAdd"></select>
                                <input type="hidden"
                                    class="form-control user-form-input form-control user-form-input-md barangay-text"
                                    name="barangayTextAdd" id="barangayTextAdd" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetTextAdd" class="form-label">Street (Optional)</label>
                                <input type="text" class="form-control form-control street-text" name="streetTextAdd"
                                    id="streetTextAdd">
                            </div>
                        </div>

                    </div>
                    <!-- <div class="form-group">
                                     <label for="userAddInputRegion">Region</label>
                                     <select name="userAddInputRegion" id="userAddInputRegion">
                                     <option value="" selected disabled>Select your region:</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="userAddInputProvince">Province</label>
                                     <select name="userAddInputProvince" id="userAddInputProvince">
                                     <option value="" selected disabled>Select your province:</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="userAddInputCity">City/Municipality</label>
                                     <select name="userAddInputCity" id="userAddInputCity">
                                     <option value="" selected disabled>Select your city/municipality:</option>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="userAddInputBarangay">City/Municipality</label>
                                     <select name="userAddInputBarangay" id="userAddInputBarangay">
                                     <option value="" selected disabled>Select your barangay:</option>
                                     </select>
                                 </div> -->
                    <div class="col-md-12 bg-light text-right">
                        <button type="button" id="userAddSubmitBtn" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" class="btn btn-dark userAddCloseBtn" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../assets/js/jquery-3.7.1.min.js"></script>
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<script>

</script>
<!-- End custom js for this page -->