<style>
	/* unvisited link */
	a:link {
		color: green;
	}

	/* visited link */
	a:visited {
		color: green;
	}

	/* mouse over link */
	a:hover {
		color: red;
	}

	/* selected link */
	a:active {
		color: yellow;
	}
</style>



<div class="row w-100">
	<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
	</button>
</div>
<nav id="sidebarMenu" class="">
	<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
		<div class="sidebar-header">
			<div class="nav-item">
				<a class="nav-link text-white" href="../student/index.php">
					<span class="home"></span>
					<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
				</a>
			</div>
		</div>
		<ul class="nav flex-column">
			<!-- <li class="nav-item">
						<a class="nav-link" href="../student/display-student.php">
						<span data-feather="file"></span>
						<i class="fa fa-user mr-2" aria-hidden="true"></i> Personal Profile
						</a>
					</li> -->
			<li class="nav-item">
				<a class="nav-link" href="../student/student-personal-information.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
				</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="https://portal.kisiiuniversity.ac.ke/login/sign-in">
					<span data-feather="shopping-cart"></span>
					<i class="fa fa-th-list mr-2" aria-hidden="true"></i> Student Portal
				</a>


			<li class="nav-item">
				<a class="nav-link" href="../student/student-fee.php">
					<span data-feather="users"></span>
					<i class="fa fa-check mr-2" aria-hidden="true"></i>Vote Leaders
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../student/library.php">
					<span data-feather="users"></span>
					<i class="fa fa-envelope mr-2" aria-hidden="true"></i>Library
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="https://elearning.kisiiuniversity.ac.ke/">
					<span data-feather="shopping-cart"></span>
					<i class="fa fa-th-list mr-2" aria-hidden="true"></i> E-lerning
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../student/student-result.php">
					<span data-feather="shopping-cart"></span>
					<i class="fa fa-file-pdf-o mr-2" aria-hidden="true"></i> Clearence
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../student/student-password.php">
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