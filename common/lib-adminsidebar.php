<div class="row w-100">
	<style>
		/* body{
			background-color: green;
		} */
	</style>
	<button class="show-btn button-show ml-auto">
		<i class="fa fa-bars py-1" aria-hidden="true"></i>
	</button>
</div>
<nav id="sidebarMenu" class="">
	<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
		<div class="sidebar-header">
			<a class="nav-link text-white" href="../lib-admin/index.php">
				<span class="home"></span>
				<i class="fa fa-home mr-2" aria-hidden="true"></i> Dashboard
			</a>
		</div>
		<ul class="nav flex-column">
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/personal-information.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Personal Information
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/register-books.php">
					<span data-feather="file"></span>
					<i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> Register Boook(s).
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/issue-books.php">
					<span data-feather="file"></span>
					<i class="fa fa-book mr-2" aria-hidden="true"></i> Issue Boook.
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/ammend-book.php">
					<span data-feather="file"></span>
					<i class="fa fa-pencil mr-2" aria-hidden="true"></i> Ammend Books.
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/recieve-books.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Recieve Books.
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/library-reports.php">
					<span data-feather="file"></span>
					<i class="fa fa-bar-chart mr-2" aria-hidden="true"></i> Library Reports
				</a>
			</li>

            <li class="nav-item">
				<a class="nav-link" href="../lib-admin/librarian.php">
					<span data-feather="file"></span>
					<i class="fa fa-users mr-2" aria-hidden="true"></i> Manage Users
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/request-items.php">
					<span data-feather="file"></span>
					<i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Request Items
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/apply-clearence.php">
					<span data-feather="shopping-cart"></span>
					<i class="fa fa-address-book mr-2" aria-hidden="true"></i> Apply Clearence
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/apply-leave.php">
					<span data-feather="users"></span>
					<i class="fa fa-check-circle mr-2" aria-hidden="true"></i> Apply leave
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/payslip.php">
					<span data-feather="users"></span>
					<i class="fa fa-users mr-2" aria-hidden="true"></i> Payslip
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../lib-admin/password.php">
					<span data-feather="bar-chart-2"></span>
					<i class="fa fa-key mr-2" aria-hidden="true"></i> Change Password
				</a>
			</li>

            <li class="nav-item">
				<a class="nav-link" href="../lib-admin/library-reports.php">
					<span data-feather="file"></span>
					<i class="fa fa-history mr-2" aria-hidden="true"></i> Logs
				</a>
			</li>

            <li class="nav-item">
				<a class="nav-link" href="../lib-admin/connected-devices.php">
					<span data-feather="file"></span>
					<i class="fa fa-mobile mr-2" aria-hidden="true"></i> Devices
				</a>
			</li>

			<li>
           Time: <script language="javascript" type="text/javascript">
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>	
<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:200px;" type="submit" class="trans" name="face" value="">
			</form>
          </li>
        </ul>
      </div>
    </nav>

    <!-- <script>
        const toggleBtn = document.querySelector(".show-btn");
        const sidebar = document.querySelector(".sidebar");
        // undefined
        toggleBtn.addEventListener("click",function(){
            sidebar.classList.toggle("show-sidebar");
        });
    </script> -->
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