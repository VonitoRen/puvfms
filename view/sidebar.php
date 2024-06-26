<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-lg-flex  fixed-top">
          <a class="sidebar-brand brand-logo" href="homepage.php"><img src="../../assets/images/ltftblogo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="homepage.php"><img class="sidebar-brand brand-logo-mini" src="../../assets/images/ltftblogo.png" alt="logo" /></a>
        </div>
        
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <!-- <img src="../../assets/images/lieu.png" class="rounded-circle" style="width:30px; height:30px;" alt="profilepic"> -->
           
                </div>
                <div class="profile-name">
                <?php 
                    $userFullName = ucwords(mb_strtolower($_SESSION['userData']['user_first_name'], 'UTF-8'))." ".
                    ucwords(mb_strtolower($_SESSION['userData']['user_middle_name'], 'UTF-8'))." ".
                    ucwords(mb_strtolower($_SESSION['userData']['user_last_name'], 'UTF-8'));

                    switch ($_SESSION['userData']['user_level']) {
                      case 1:
                        $userLevel = "ADMIN";
                        break;
                      case 2:
                        $userLevel = "JUDICIAL";
                        break;
                      case 3:
                        $userLevel = "TECHNICAL";
                        break;
                      default:
                        //code block
                    }
                    ?>
                    <p class="mb-0 d-none d-sm-block sidebar-profile-name"><?=$userFullName." "."(".$userLevel.")"?></p>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.html">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="userManagement.php">
              <span class="menu-icon">
              <i class="mdi mdi-account"></i>
              </span>
              <span class="menu-title">User</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="roleManagment.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-box-outline"></i>
              </span>
              <span class="menu-title">Role</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="departmentManagement.php">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Department</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-file-document"></i>
              </span>
              <span class="menu-title">Applicant Document</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=""> New CPC</a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Extension of CPC </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Modification of Route </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Change of Name </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Consolidation of Cases </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Adoption of Color Scheme </a></li>
                <li class="nav-item"> <a class="nav-link" href=""> Change of Party Applicant</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-icon">
                <i class="mdi mdi-bank"></i>
              </span>
              <span class="menu-title">Hearing</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">PUV</span>
            </a>
          </li>

          <li class="nav-item menu-items">

            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
              <span class="menu-icon">
                <i class="mdi mdi-wrench"></i>
              </span>

              <span class="menu-title">Utilities</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="services.php"> Services </a></li>
                <li class="nav-item"> <a class="nav-link" href="documentTypeManagement.php"> Document Type </a></li>
                <li class="nav-item"> <a class="nav-link" href="applicationStatusManagement.php"> Application Status </a></li>
                <li class="nav-item"> <a class="nav-link" href="hearingStatusManagement.php"> Hearing Status </a></li>
                <li class="nav-item"> <a class="nav-link" href="ownershipTypeManagement.php"> Ownership Type </a></li>
                <li class="nav-item"> <a class="nav-link" href="denominationManagement.php"> Denomination </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Backup and Restore </a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>