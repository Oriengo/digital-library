	<div class="row w-100">
		<button class="show-btn button-show ml-auto">
			<i class="fa fa-bars py-1" aria-hidden="true"></i>
		</button>
	</div>
	<nav id="sidebarMenu" class="">
		<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
			<div class="sidebar-header">
				<a class="nav-link text-white" href="../admissions-office/index.php">
					<span class="home"></span>
					<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
				</a>
			</div>
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link" href="../admin/display-...php">
						<span data-feather="file"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/personal-information.php">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/set-dates.php">
						<span data-feather="file"></span>
						<i class="fa fa-calendar-plus-o mr-2" aria-hidden="true"></i> Set Semester-Dates
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/programmes.php">
						<span data-feather="file"></span>
						<i class="fa fa-book mr-2" aria-hidden="true"></i> Programmes
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/classes.php">
						<span data-feather="file"></span>
						<i class="fa fa-users mr-2" aria-hidden="true"></i> Classes
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/admit-student.php">
						<span data-feather="file"></span>
						<i class="fa fa-user-plus mr-2" aria-hidden="true"></i> Admit student(s)
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/online-registration.php">
						<span data-feather="file"></span>
						<i class="fa fa-user-plus mr-2" aria-hidden="true"></i> Online Registration
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/de-register-student.php">
						<span data-feather="file"></span>
						<i class="fa fa-user-times mr-2" aria-hidden="true"></i> De-register student(s)
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/process-defferment.php">
						<span data-feather="file"></span>
						<i class="fa fa-book mr-2" aria-hidden="true"></i> Process Defferments
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/approve-graduadionlist.php">
						<span data-feather="file"></span>
						<i class="fa fa-graduation-cap mr-2" aria-hidden="true"></i> Approve graduation list
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/request-item.php">
						<span data-feather="file"></span>
						<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Request Items
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/apply-clearence.php">
						<span data-feather="shopping-cart"></span>
						<i class="fa fa-address-book mr-2" aria-hidden="true"></i> Apply Clearence
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/apply-leave.php">
						<span data-feather="users"></span>
						<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Apply leave
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/payslip.php">
						<span data-feather="users"></span>
						<i class="fa fa-credit-card mr-2" aria-hidden="true"></i> Payslip
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../admissions-office/password.php">
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