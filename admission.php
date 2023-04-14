<?php

require_once "connection/connection.php";
if (isset($_POST['register'])) {
	$title = $_POST["title"];
	$first_name = $_POST["first_name"];
	$middle_name = $_POST["middle_name"];
	$last_name = $_POST['last_name'];
	$phone_number = $_POST['phone_number'];
	$email_address = $_POST['email_address'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$birth_place = $_POST['birth_place'];
	$identification_type = $_POST['identification_type'];
	$id_number = $_POST['id_number'];
	$expiry_date = $_POST['expiry_date'];
	$marital_status = $_POST['marital_status'];
	$religion = $_POST['religion'];
	$tribe = $_POST['tribe'];
	$reg_number = $_POST['reg_number'];
	$course_name = $_POST['course_name'];
	$school = $_POST['school'];
	$academic_year = $_POST['academic_year'];
	$campus = $_POST['campus'];
	$adm_month = $_POST['adm_month'];
	$district_of_birth = $_POST['district_of_birth'];
	$country = $_POST['name'];
	$region = $_POST['region'];
	$parmanent_address = $_POST['parmanent_address'];
	$current_residence = $_POST['current_residence'];
	$home_county = $_POST['home_county'];
	$district = $_POST['district'];
	$ward = $_POST['ward'];
	$village = $_POST['village'];
	$parental_status = $_POST['parental_status'];
	$father_name = $_POST['father_name'];
	$mother_name = $_POST['mother_name'];
	$guardian_name = $_POST['guardian_name'];
	$no_of_siblings = $_POST['no_of_siblings'];
	$vission = $_POST['vission'];
	$hearing = $_POST['hearing'];
	$pulse = $_POST['pulse'];
	$blood_pressure = $_POST['blood_pressure'];
	$in_any_treatment = $_POST['in_any_treatment'];
	$examining_doctor = $_POST['examining_doctor'];
	$accepted = $_POST['accepted'];
	$password = md5('Student');
	$role = $_POST['role'];
	//  $registration_date =$_POST['registration_date'];




	// *****************************************File upload code starts here********************************************************** 
	$profile_image = $_FILES['profile_image']['name'];$tmp_name = $_FILES['profile_image']['tmp_name'];$path = "images/" . $profile_image;move_uploaded_file($tmp_name, $path);
	$medical_form = $_FILES['medical_form']['name'];$tmp_name = $_FILES['medical_form']['tmp_name'];$path = "images/" . $medical_form;move_uploaded_file($tmp_name, $path);
	$id_front = $_FILES['id_front']['name'];$tmp_name = $_FILES['id_front']['tmp_name'];$path = "images/" . $id_front;move_uploaded_file($tmp_name, $path);
	$id_back = $_FILES['id_back']['name'];$tmp_name = $_FILES['id_back']['tmp_name'];$path = "images/" . $id_back;move_uploaded_file($tmp_name, $path);
	$slipkcse_cert = $_FILES['slipkcse_cert']['name'];$tmp_name = $_FILES['slipkcse_cert']['tmp_name'];$path = "images/" . $slipkcse_cert;move_uploaded_file($tmp_name, $path);
	$leaving_cert = $_FILES['leaving_cert']['name'];$tmp_name = $_FILES['leaving_cert']['tmp_name'];$path = "images/" . $leaving_cert;move_uploaded_file($tmp_name, $path);
	$d_certificate = $_FILES['d_certificate']['name'];$tmp_name = $_FILES['d_certificate']['tmp_name'];$path = "images/" . $d_certificate;move_uploaded_file($tmp_name, $path);
	$birth_certificate = $_FILES['birth_certificate']['name'];$tmp_name = $_FILES['birth_certificate']['tmp_name'];$path = "images/" . $birth_certificate;move_uploaded_file($tmp_name, $path);
	// *****************************************File upload code end here**********************************************************//

	$password = $_POST['password'];
	$role = $_POST['role'];


	$query = "INSERT INTO student_information(title, first_name, middle_name, last_name, phone_number, email_address, gender, dob, birth_place, idntification_type, id_number, expiry_date, marital_status, religion, tribe, reg_number, programme_code, school_code, academic_year, campus_id, adm_month, district_of_birth, country, region, parmanent_address, current_residence, home_county, district, ward, village, parental_status, father_name, mother_name, guardian_name, no_of_siblings, profile_image, accepted, medical_form, id_front, id_back, slipkcse_cert, leaving_cert, d_certificate, birth_certificate)
	 VALUES('$title','$first_name','$middle_name','$last_name','$phone_number','$email_address','$gender','$dob','$birth_place','$identification_type','$id_number','$expiry_date','$marital_status','$religion','$tribe','$reg_number','$course_name','$school','$academic_year','$campus','$adm_month','$district_of_birth','$country','$region','$parmanent_address','$current_residence','$home_county','$district','$ward','$village','$parental_status','$father_name','$mother_name','$guardian_name','$no_of_siblings','$profile_image','$accepted','$medical_form','$id_front','$id_back','$slipkcse_cert','$leaving_cert','$d_certificate', '$birth_certificate')";

	$run = mysqli_query($con, $query);
	if ($run) {
		echo "<script>alert('Your registration details has been recorded succesfully. !');window.location.href='admission.php';</script>";
		 header('location: admission.php');
	} else {
		echo "Your Data has not been submitted";
	}

	$query1 = "INSERT INTO `medical_information`(`reg_number`, `vission`, `hearing`, `pulse`, `blood_pressure`, `in_any_treatment`, `medical_form`) 
   VALUES ('$reg_number','$vission','$hearing','$pulse','$blood_pressure','$in_any_treatment','$medical_form')";

	$run1 = mysqli_query($con, $query1);
	if ($run1) {
		 echo "<script>alert('Your registration status has been saved succesfully !');window.location.href='admission.php';</script>";
		  header('location: admission.php');
	} else {
		echo "Your Data has not been submitted";
	}

	$query2 = "INSERT INTO `login_tbl`(`user_id`, `Password`, `Role`, `account`) VALUES ('$reg_number','md5('Student)','Student','Deactivated')";
	$run2 = mysqli_query($con, $query2);
	if ($run2) {
		echo "<script>alert('Your registration status has been saved succesfully !');window.location.href='admission.php';</script>";
	} else {
		echo "Your Data has not been submitted into login";
	}
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>Kisumu University</title>
</head>

<body>
	<?php include('common/header.php') ?>
	<?php include('connection/connection.php') ?>
	<?php
	$first_name = '';
	$middle_name = '';
	$last_name = '';
	$email_address = '';
	$expiry_date = '';
	$reg_number = '';
	$birth_date = '';
	$birth_place = '';
	$id_number = '';
	$accademic_year = '';
	$adm_month = '';
	$district_of_birth = '';
	$home_county = '';
	$country = '';
	$parmanent_address = '';
	$current_residence = '';
	$district = '';
	$ward = '';
	$village = '';
	$mother_name = '';
	$father_name = '';
	$guardian_name = '';



	?>
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-xl-12 col-lg-12 col-md-12 w-100">
				<div class="bg-info text-center">
					<div class="table-one flex-wrap flex-md-no-wrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
						<h4>Online Registration Form</h4>
					</div>
				</div>
			</div>
		</div>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			h3 {
				text-align: center;
			}
		</style>

		<div class="wrapper">

			<form style action="admission.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<h3 class="modal-header bg-info text-white ">Personal Details</h3>
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1"> Title: </label>
								<select class="browser-default custom-select" name="title" required value="<?php echo $title ?>">
									<option>Select Title</option>
									<option value="Mr.">Mr</option>
									<option value="Mrs">Mrs</option>
									<option value="Miss">Miss</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> First Name:</label>
								<input type="text" name="first_name" class="form-control" required value="<?php echo $first_name ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Middle Name:</label>
								<input type="text" autocomplete="on" name="middle_name" class="form-control" value="<?php echo $middle_name ?>">
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Last Name:</label>
								<input type="text" autocomplete="on" name="last_name" class="form-control" required value="<?php echo $last_name ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Phone Number :</label>
								<input type="number" name="phone_number" class="form-control" maxlength=10 required value="<?php echo $phone_number ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Email Address:</label>
								<input type="email" name="email_address" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?php echo $email_address ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Gender:</label>
								<select class="browser-default custom-select" name="gender" value=" " required>
									<option>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Date Of Birth:</label>
								<input type="date" name="dob" class="form-control" maxlength=10 required value="<?php echo $birth_date ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Place of Birth:</label>
								<input type="text" name="birth_place" class="form-control" required value="<?php echo $birth_place ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Identification type:</label>
								<select class="browser-default custom-select" name="identification_type" value=" " required>
									<option>Select Identification Type</option>
									<option value="Nationa Id">National ID</option>
									<option value="Passport">Passport</option>
									<option value="Driving Licence">Driving Licence</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Identification Number:</label>
								<input type="number" name="id_number" class="form-control" maxlength=10 required value="<?php echo $phone_number ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Expiry Date:</label>
								<input type="date" name="expiry_date" class="form-control" required value="<?php echo $expiry_date ?>">
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Marital Status:</label>
								<select class="browser-default custom-select" name="marital_status" value=" " required>
									<option>Select Marital status</option>
									<option value="single">Single</option>
									<option value="Married">Married</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Religion:</label>
								<select class="browser-default custom-select" name="religion" value=" " required>
									<option>Select Religion</option>
									<option value="Christian">Christian</option>
									<option value="Muslim">Muslim</option>
									<option value="Hindu">Hindu</option>
									<option value="Pagan">Pagan</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">Tribe:</label>
								<select class="browser-default custom-select" name="tribe" value=" " required>
									<option>Select Tribe</option>
									<option value="Luo">Luo</option>
									<option value="Luhya">Luhya</option>
								</select>
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
					<h3 class="modal-header bg-info text-white">Admission Details</h3>
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1"> Registration Number </label>
								<input type="text" name="reg_number" class="form-control" maxlength=15 required value="<?php echo $reg_number ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Course Name</label>
								<select class="browser-default custom-select" name="course_name">
									<option>Select Course</option>
									<?php
									$query = "SELECT  * from programmes";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) {
										echo  "<option value=" . $row["programme_code"] . ">" . $row["programme_name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1">School</label>
								<select class="browser-default custom-select" name="school" required>
									<option>Select School</option>
									<?php
									$query = "SELECT * from schools";
									$run = mysqli_query($con, $query);

									while ($row = mysqli_fetch_array($run)) {
										echo  "<option value = " . $row["school_code"] . ">" . $row["school_name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
					</div>


					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1"> Academic Year: </label>
								<input type="text" name="academic_year" class="form-control" maxlength=10 value="<?php echo $accademic_year ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Campus:</label>
								<select class="browser-default custom-select" name="campus" required>
									<option>Select Campus</option>
									<?php
									$query = "SELECT * FROM campuses";
									$run = mysqli_query($con, $query);

									while ($row = mysqli_fetch_array($run)) {
										echo  "<option value =" . $row["campus_id"] . ">" . $row['name'] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Admission Month:</label>
								<select class="browser-default custom-select" name="adm_month" value=" " required>
									<option>Select Month</option>
									<option value="January">January</option>
									<option value="May">May</option>
									<option value="September">September</option>

								</select>
							</div>

						</div>
					</div>

					<br><br><br>

					<h3 class="modal-header bg-info text-white">Location details</h3>

					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1"> District of Birth </label>
								<input type="text" name="district_of_birth" class="form-control" maxlength=10 value="<?php echo $district_of_birth ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Country:</label>
								<select class="browser-default custom-select" name="name">
									<option>Select Country</option>
									<?php
									$query = "select * from countries";
									$run = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($run)) {
										echo "<option value=" . $row["name"] . ">" . $row["name"] . "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Region:</label>
								<select class="browser-default custom-select" name="region" value="<?php echo $region ?>">
									<option>Select Region</option>
									<option value="Coast">Coast</option>
									<option value="Rift Valley">Rift Valley</option>
									<option value="Nyanza">Nyanza</option>
									<option value="Western">Western</option>
									<option value="Eastern">Eastern</option>
									<option value="Central">Central</option>
									<option value="Nairobi">Nairobi</option>
									<option value="North Eastern">North Eastern</option>
								</select>

							</div>
						</div>
					</div>


					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1"> Parmanent Address: </label>
								<input type="text" name="parmanent_address" class="form-control" value="<?php echo $parmanent_address ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Current residence:</label>
								<input type="text" name="current_residence" class="form-control" value="<?php echo $current_residence ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Home County:</label>
								<select class="browser-default custom-select" name="home_county" value="<?php echo $home_county ?>">
									<option>Select County</option>
									<option value="Mombasa">Mombasa</option>
									<option value="Kwale">Kwale</option>
									<option value="Kilifi">Kilifi</option>
									<option value="Tana River">Tana River</option>
									<option value="Lamu">Lamu</option>
									<option value="Taita/Taveta">Taita/Taveta</option>
									<option value="Garissa">Garissa</option>
									<option value="Wajir">Wajir</option>
									<option value="Mandera">Mandera</option>
									<option value="Marsabit">Marsabit</option>
									<option value="Isiolo">Isiolo</option>
									<option value="Meru">Meru</option>
									<option value="Tharaka-Nithi">Tharaka-Nithi</option>
									<option value="Embu">Embu</option>
									<option value="Kitui">Kitui</option>
									<option value="Machakos">Machakos</option>
									<option value="Makueni">Makueni</option>
									<option value="Nyandarua">Nyandarua</option>
									<option value="Nyeri">Nyeri</option>
									<option value="Kirinyaga">Kirinyaga</option>
									<option value="Murang'a">Murang'a</option>
									<option value="Kiambu">Kiambu</option>
									<option value="Turkana">Turkana</option>
									<option value="West Pokot">West Pokot</option>
									<option value="Samburu">Samburu</option>
									<option value="Trans Nzoia">Trans Nzoia</option>
									<option value="Uasin Gishu">Uasin Gishu</option>
									<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
									<option value="Nandi">Nandi</option>
									<option value="Baringo">Baringo</option>
									<option value="Laikipia">Laikipia</option>
									<option value="Nakuru">Nakuru</option>
									<option value="Narok">Narok</option>
									<option value="Kajiado">Kajiado</option>
									<option value="Kericho">Kericho</option>
									<option value="Bomet">Bomet</option>
									<option value="Kakamega">Kakamega</option>
									<option value="Vihiga">Vihiga</option>
									<option value="Bungoma">Bungoma</option>
									<option value="Busia">Busia</option>
									<option value="Siaya">Siaya</option>
									<option value="Kisumu">Kisumu</option>
									<option value="Homa Bay">Homa Bay</option>
									<option value="Migori">Migori</option>
									<option value="Kisii">Kisii</option>
									<option value="Nyamira">Nyamira</option>
									<option value="Nairobi">Nairobi</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Home District:</label>
								<input type="text" name="district" class="form-control" required value="<?php echo $district ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Home Ward:</label>
								<input type="text" name="ward" class="form-control" required value="<?php echo $ward ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Village:</label>
								<input type="text" name="village" class="form-control" required value="<?php echo $village ?>">
							</div>
						</div>
					</div>

					<br>
					<br>
					<br>
					<h3 class="modal-header bg-info text-white">Parents/Guardian Details details</h3>
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Parental Status: </label>
								<select class="browser-default custom-select" name="parental_status" value=" ">
									<option>Select status</option>
									<option value="Both Parent">Both Parent alive</option>
									<option value="Single Parent">Single Parent</option>
									<option value="Orphan">Total Orphan</option>

								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Father's Name:</label>
								<input type="text" name="father_name" class="form-control" required value="<?php echo $father_name ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Mothers Name: </label>
								<input type="text" name="mother_name" class="form-control" value="<?php echo $mother_name ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Guardian Name: </label>
								<input type="text" name="guardian_name" class="form-control" value="<?php echo $guardian_name ?>">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Number of siblings: </label>
								<input type="number" name="no_of_siblings" class="form-control" value="<?php echo $number_of_siblings ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Passport image: </label>
								<input type="file" name="profile_image" accept="image/png,image/gif,image/jpeg,image/jpg" class="form-control" required>
							</div>
						</div>
					</div>
					<!-- </div> -->

					<h3 class="modal-header bg-info text-white">Medical Records details</h3>
					<div class="row mt-3">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputEmail1">Vission: </label>
								<select class="browser-default custom-select" name="vission" value=" ">
									<option value="">Select Vission status</option>
									<option value="Okay">Okay</option>
									<option value="Not Okay">Not Okay</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> Hearing:</label>
								<select class="browser-default custom-select" name="hearing" value=" ">
									<option value="">Select hearing status</option>
									<option value="Okay">Okay</option>
									<option value="Not Okay">Not Okay</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Pulse: </label>
								<select class="browser-default custom-select" name="pulse" value=" ">
									<option value="">Select Pulse status</option>
									<option value="Okay">Okay</option>
									<option value="Not Okay">Not Okay</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Blood presssure: </label>
								<select class="browser-default custom-select" name="blood_pressure" value=" ">
									<option value="">Select blood presssure</option>
									<option value="Okay">Okay</option>
									<option value="Not Okay">Not Okay</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> In any Treatment: </label>
								<select class="browser-default custom-select" name="in_any_treatment" value=" ">
									<option value=""> Are you in any treatment?</option>
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Examining Doctor: </label>
								<input type="text" name="examining_doctor" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<label for="exampleInputPassword1"> Filled Medical form:</label>
							<div class="form-group">
								<input type="file" name="medical_form" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="form-control" required>
							</div>
						</div>
					</div>
					<h3 class="modal-header bg-info text-center text-white">Uploads Section</h3>
					<div class="row mt-3">
						<div class="col-md-4">
							<label for="exampleInputPassword1"> Id Front:</label>
							<div class="form-group">
								<input type="file" name="id_front" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1"> ID Back:</label>
								<input type="file" name="id_back" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> KCPE Result Slip/Certificate </label>
								<input type="file" name="slipkcse_cert" class="form-control" reqired>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Leaving Certificate: </label>
								<input type="file" name="leaving_cert" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Death Certificate: </label>
								<input type="file" name="d_certificate" class="form-control" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleInputPassword1" required> Birth Certificate: </label>
								<input type="file" name="birth_certificate" class="form-control" required>
							</div>
						</div>
					</div>
					<div>
						<input type="hidden" name="password" value="student">
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- </div> -->
					<!-- <div class="col-md-12 w-100 p-5"> -->
					<h3 class="modal-header bg-info text-center text-white">Consent</h3>
					<h5> <b><u> Candidates are supporsed to understand the following before submission: </u></b></h5>
					<p class="tet-justify">
						I solemnly declare that I have submitted the application with the consent of my parents/guardian.
						<br> <br> I pledge to abide by the Rules and Regulations of the Kisumu University and shall not take part in political activities of any kind. If I do so the Kisumu University Administration will have the right to strike my name off the Kisumu University Rolls.
						<br> <br> I pledge that I will not keep in my possession weapons of any kind whether licensed or unlicensed. I affirm that I was never expelled / rusticated by any Institution at any time.
						<br> <br> I understand that if my class attendance percentage is not up to the required standard of the Kisumu University, I will not be eligible to sit in the final examinations.
						<br> <br> I affirm that if at any stage the documents submitted by me for admission are proved forged, fake, or erroneous I shall be responsible for that and the Kisumu University Administration shall be rightful to cancel my admission and to take necessary action against me.
					</p>
					<style>
						input.large {
							width: 30px;
							height: 30px;
							border-radius: 50px;
						}
					</style>
					<h2>
						<p> <input type="checkbox" class='large' name="accepted" value='yes' required> <b>I have red and understand the above terms carefully and filled the form correctly </b> <br>

						</p>
					</h2>

					<!-- _________________________________________________________________________________
								  				Hidden Values are here
					 _________________________________________________________________________________ -->
					<div>
						<input type="hidden" name="password" value="<?php $id_number ?>">
						<input type="hidden" name="role" value="Student">
					</div>
					<!-- _________________________________________________________________________________
					                	Hidden Values are end here
						_________________________________________________________________________________ -->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="register">
					</div>
				</div>





		</div>

	</div>

	</form>
	</div>

	</div>
	</div>

</body>
<p class="footer-bottom-text">Copy Rights ©2022 Oritech Solutionss</p>

</html>