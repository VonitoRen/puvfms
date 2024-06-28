<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CERTIFICATE FOR CPC</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
    <div class="container p-5 form-sample">
        <div class="card">
            <form action="" id="newCPCForm">
                <div class="container p-5 form-sample pre-scrollable">
                    <form action="">
                        <h4 class="fs-2">APPLICATION FOR ISSUANCE FOR A NEW CERTIFICATE OF PUBLIC CONVENIENCE <br></h4>
                        <p class="fs-5">(Executive Order 202, DO No. 2015-018, MC Nos. 92-009, 97-1097, 2010-22, 2011-018, 2011-014, 2011-016, 2013-004, 2013-006, 2015-011, 2015-008) </p>

                        <hr>
                        <form action="">
                        <h4 class="fs-2">Primary Requirements:<br></h4>
                        <hr>
                        <div class="form-group">
                            <label for="file1" class="form-label">Template of Application for New CPC.</label>
                            <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file1" required multiple>
                        </div>

                        <div class="form-group">
                            <label for="file2" class="form-label">Proof of notarization of application/petition form.</label>
                            <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file2" required multiple>
                        </div>

                        <div class="form-group">
                            <label for="divQuestion1" class="form-label">Are you a RFRO adopting Online Hearing?</label>
                            <select name="divQuestion1" id="divQuestion1" class="form-control mb-3" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <div id="divQuestion1Requirement" hidden>
                            <label for="file3" class="form-label">Attestation (as to the authenticity and truthfulness of the documents submitted).</label>
                            <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file3" required multiple>
                            </div>
                        </div>                        


                        <hr>
                        <h4 class="fs-2">Additional Requirements:<br></h4>
                        <hr>
                        <div class="form-group">
                            <hr>
                            <label for="file4" class="form-label">LTO OR/CR of authorized unit/s with year model?</label>
                            <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file4" required multiple>
                            <hr>
                            <label for="divQuestion2" class="form-label">What is the curret status of your unit?</label>
                            <select name="divQuestion2" id="divQuestion2" class="form-control" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="1">N/A</option>
                                <option value="2">Encumbered</option>
                                <option value="3">Leased</option>
                                <option value="4">Imported or Rebuilt</option>
                            </select>
                           
                            <!-- OPTIONS-->
                            <div id="divQuestion2Requirement1" class="divQuestion2Requirement mt-3" hidden>
                                <label for="file5" class="form-label">Certificate of Conformity</label>
                                <input class="form-control form-control-mandatory " accept=".pdf,.jpg,.jpeg,.png" type="file" id="file5" required multiple>
                            </div>

                            <div id="divQuestion2Requirement2" class="divQuestion2Requirement mt-3"  hidden>
                                <label for="file6" class="form-label">Affidavit of Undertaking</label>
                                <input class="form-control form-control-mandatory " accept=".pdf,.jpg,.jpeg,.png" type="file" id="file6" required multiple>
                            </div>

                            <div id="divQuestion2Requirement3" class="divQuestion2Requirement mt-3"  hidden>
                                <label for="file7" class="form-label">Certificate of Year Model (JAO 2014- 02) TH</label>
                                <input class="form-control form-control-mandatory " accept=".pdf,.jpg,.jpeg,.png" type="file" id="file7" required multiple>
                            </div>
                            <hr>

                        </div>  

                        <div class="form-group">
                            <label for="divQuestion3" class="form-label">Are you considered as either partnership, corpration, cooperative and individual PUJ operator?</label>
                            <select name="divQuestion3" id="divQuestion3" class="form-control mb-3" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>

                            <div id="divQuestion3Requirement1" hidden>
                                <label for="file7" class="form-label">Certificate of Business Name.</label>
                                <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file7" required multiple>
                            </div>
                        </div>  

                        <hr>

                        <h4 class="fs-2">Proof of Citizenship:<br></h4>
                        <hr>
                        <div class="form-group">
                            <label for="divQuestion4" class="form-label">Are you considered as Individual Application or Juridical Entity?</label>
                            <select name="divQuestion4" id="divQuestion4" class="form-control mb-3" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="1">Individual Applicant</option>
                                <option value="2">Juridical Entity</option>
                            </select>

                            <div id="divQuestion4Requirement1" hidden>
                                <label for="file8" class="form-label">Certificate of Business Name.</label>
                                <input class="form-control form-control-mandatory"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file8" required multiple>
                              
                            </div>

                            <div id="divQuestion4Requirement2" hidden>
                                <label for="divQuestion5" class="form-label">Are you categorized as Corporation or Cooperative?</label>
                                <select name="divQuestion5" id="divQuestion5" class="form-control mb-3" required>
                                    <option value="" selected disabled>Please select an option (Mandatory).</option>
                                    <option value="1">Corporation</option>
                                    <option value="2">Cooperative</option>
                                </select>

                                <div id="divQuestion5Requirement1" hidden>
                                    <label for="file9" class="form-label">Articles of Partnership/Incorporation and By-laws.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file9" required multiple>

                                    <label for="file10" class="form-label">Certificate of Registration.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file10" required multiple>
                                
                                </div>    

                                <div id="divQuestion5Requirement2" hidden>

                                    <label for="file10" class="form-label">Articles of Cooperation and By Laws s.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file10" required multiple>

                                    <label for="file11" class="form-label">Certificate of Registration.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file11" required multiple>

                                    <label for="file12" class="form-label">Certificate of Good Standing.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file12" required multiple>
                                
                                </div>    
                            </div>
                            <hr>
                        </div>  
                        <h4 class="fs-2">Proof of Existence and Sufficiency Garage:<br></h4>
                        <hr>
                        <div class="form-group">
                            <label for="divQuestion6" class="form-label">Are you the owner of the unit?</label>
                            <select name="divQuestion6" id="divQuestion6" class="form-control mb-3" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>

                                <div id="divQuestion6Requirement1" hidden>
                                    <label for="file12" class="form-label">Transfer Certificate of Title (TCT)/ Tax Declaration in the name of the applicant.</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file12" required multiple>

                                
                                </div>    

                                <div id="divQuestion6Requirement2" hidden>
                                    <label for="file13" class="form-label">Notarized Contract of Lease/Authority to use with TCT of Lessor</label>
                                    <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file13" required multiple>
                                </div>
                                <hr>                                
                        </div>
                        <h4 class="fs-2">Proof of Financial Capability:<br></h4>
                        <hr>
                        <div class="form-group">
                            <label for="divQuestion7" class="form-label">Are you a newly registered operator?</label>
                            <select name="divQuestion7" id="divQuestion7" class="form-control mb-3" required>
                                <option value="" selected disabled>Please select an option (Mandatory).</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>

                            <div id="divQuestion7Requirement1" hidden>
                                <label for="file14" class="form-label">Stamped received of Latest Income Tax Return or Certificate of Registration with BIR (Transportation as line of business).</label>
                                <input class="form-control form-control-mandatory mb-3"  accept=".pdf,.jpg,.jpeg,.png" type="file" id="file14" required multiple>
                            </div>

                            <hr>                                
                        </div>


                        <button id="newCPCStatusSubmitBtn" class="btn btn-primary mr-2">Submit</button>                  
                        <button type="button" class="btn btn-dark newCPCStatusAddCloseBtn" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>

    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/newCPC.js"></script>
    <!-- End custom js for this page -->


</body>

</html>