<div class="row w-100">
	<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
	</button>
</div>
<nav id="sidebarMenu" class="">
	<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
		<div class="sidebar-header">
			<a class="nav-link text-white" href="../cod/index.php">
				<span class="home"></span>
				<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
			</a>
		</div>
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link" href="../cod/profile.php">
					<span data-feather="file"></span>
					<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cod/personal-information.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cod/upload_marks-information.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Upload Marks
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/approve_marks.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Approve Marks
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/approve_units.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Approve Units
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/classes.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Classes
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/assign_lecturer.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Assign Lectures
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/set_curriculum.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Set Curriculum
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/generate_attendance.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Generate Attendance
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/consolidated_sheets.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Consolidated sheets
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/approve_clearence.php">
					<span data-feather="file"></span>
					<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Approve Clearence.
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/approve_leave.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Approve Leaves
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/request_item.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Request Items
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../cod/apply_clearence.php">
					<span data-feather="shopping-cart"></span>
					<i class="fa fa-address-book mr-2" aria-hidden="true"></i> Apply Clearence
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cod/apply_leave.php">
					<span data-feather="users"></span>
					<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Apply leave
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cod/payslip.php">
					<span data-feather="users"></span>
					<i class="fa fa-users mr-2" aria-hidden="true"></i> Payslip
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../cod/password.php">
					<span data-feather="bar-chart-2"></span>
					<i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
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