  <div class="row w-100">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button>
  </div>
  <nav id="sidebarMenu" class="">
    <div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
      <div class="sidebar-header">
        <div class="nav-item">
          <a class="nav-link text-white" href="../admin/index.php">
            <span class="home"></span>
            <i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
          </a>
        </div>
      </div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="../admin/employee.php">
            <span data-feather="file"></span>
            <i class="fa fa-user mr-2" aria-hidden="true"></i>Employee Registration
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/student.php">
            <span data-feather="shopping-cart"></span>
            <i class="fa fa-user-circle mr-2" aria-hidden="true"></i> Student Registration
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/schools.php">
            <span data-feather="users"></span>
            <i class="fa fa-book mr-2" aria-hidden="true"></i>Schools
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/supper-staffs.php">
            <span data-feather="bar-chart-2"></span>
            <i class="fa fa-users mr-2" aria-hidden="true"></i>Supper staffs
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/time-table.php">
            <span data-feather="layers"></span>
            <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> Time Table
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/class-result.php">
            <span data-feather="layers"></span>
            <i class="fa fa-users mr-2" aria-hidden="true"></i> Class Results
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/staff-email.php">
            <span data-feather="layers"></span>
            <i class="fa fa-envelope mr-2" aria-hidden="true"></i> Staff Emails
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/student-attendance.php">
            <span data-feather="layers"></span>
            <i class="fa fa-check-square-o mr-2" aria-hidden="true"></i> Student Attendance
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/lecturer-attendance.php">
            <span data-feather="layers"></span>
            <i class="fa fa-check-square mr-2" aria-hidden="true"></i> Staff Attendance
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/student-fee.php">
            <span data-feather="layers"></span>
            <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i> Student Fee
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/student-password.php">
            <span data-feather="layers"></span>
            <i class="fa fa-cog mr-2" aria-hidden="true"></i> Student Issues
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/staff-password.php">
            <span data-feather="layers"></span>
            <i class="fa fa-money mr-2" aria-hidden="true"></i> Staff Issues
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/lecturer-salary.php">
            <span data-feather="layers"></span>
            <i class="fa fa-money mr-2" aria-hidden="true"></i> Lecturer Salary
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/set-examcard.php">
            <span data-feather="layers"></span>
            <i class="fa fa-id-card-o" aria-hidden="true"></i> Set Exam cards
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/bulk-enrollment.php">
            <span data-feather="layers"></span>
            <i class="fa fa-plus-square mr-2" aria-hidden="true"></i> Bulk enrollment
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/user-logs.php">
            <span data-feather="layers"></span>
            <i class="fa fa-eye mr-2" aria-hidden="true"></i>Users logs
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/system-config.php">
            <span data-feather="layers"></span>
            <i class="fa fa-eye mr-2" aria-hidden="true"></i>System Configurations
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/manage-accounts.php">
            <span data-feather="layers"></span>
            <i class="fa fa-key mr-2" aria-hidden="true"></i> Manage Account
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <script>
    const toggleBtn = document.querySelector(".show-btn");
    const sidebar = document.querySelector(".sidebar");
    // undefined
    toggleBtn.addEventListener("click", function() {
      sidebar.classList.toggle("show-sidebar");
    });
  </script>