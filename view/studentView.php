<html>
    <head>
        <title>Student Management System</title>
        <link rel="stylesheet" type="text/css" href="media/css/style.css" />
    </head>
    <body>
        <div class="container">
			<?php
				session_start();
				include './model/student/subjectModel.php';
				include './model/student/studentModel.php';
				
				//Load list of subjects
				$subject = new Subject();
				$subList = $subject->loadSubject();
				
				

				//Save Student details
				if(isset($_POST['btnSave'])){
					$student = new Student();
					$res = $student->saveDetail($_POST);
					
					if($res == "success"){
						$class = "success";
						$message = " Successfully Saved";
					} else {
						$class = "error";
						$message = $res;
					}
				}
			?>
			<!-- Sudent form container -->
			<div class="container-div-frm-student">
				<div class="div-frm-student">
					<?php if(isset($message)) { ?>
						<div class="<?php echo $class; ?>"><?php echo $message; ?></div>
					<?php } ?>
					<form id="frmStudent" name="frmStudent" action="" method="post" autocomplete="off" enctype="multipart/form-data"">
						<p>
							<label for="txtFname">First Name </label>
							<input type="text" name="txtFname" id="txtFname" value="<?php echo isset($_SESSION["fname"]) ? $_SESSION["fname"] : ''; ?>" placeholder="Enter First name" />
						</p>
						<p>
							<label for="txtLname">Last Name </label>
							<input type="text" name="txtLname" id="txtLname" value="<?php echo isset($_SESSION["lname"]) ? $_SESSION["lname"] : ''; ?>" placeholder="Enter Last name" />
						</p>
						<p>
							<label for="selSubject">Subjects </label>
							<select multiple id="selSubject" name="selSubject[]" class="dropdown">
								<?php while($row = $subList->fetch_assoc()){ 
									if(isset($_SESSION["subjects"])){
										if(in_array($row["id"],$_SESSION["subjects"])){
								?>
											<option value="<?php echo $row["id"]; ?>"selected ><?php echo $row["subject"]; ?></option>
								<?php 
										}else{
										?>
											<option value="<?php echo $row["id"]; ?>"><?php echo $row["subject"]; ?></option>
										<?php	
										}
									}else{
										?>
											<option value="<?php echo $row["id"]; ?>"><?php echo $row["subject"]; ?></option>
										<?php
									}
								}
								?>
							</select>
						</p>    
						<p class="button-section">
							<input type="submit" name="btnSave" id="btnSave" value="Save" />
						</p>      
					</form>
				</div>
			</div>
			<?php 
			//Load list of students
				$students = new Student();
				$studentList = $students->loadStudentList();
				$studentCount = mysqli_num_rows($studentList);
				if($studentCount >0 ) { 
			?>
			<!-- Student list container -->
			<div class="student-list-container">
				<div class="table-title">Students List</div>
				<table class="blueTable">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Subjects</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $studentList->fetch_assoc()){ 
						
							$sub = new Subject();
							// Load Student assigned subjects
							$subjectList = $sub->loadSubjectByStudentId($row['id']);
							$subjectArray = array();
							while($rowSubject = $subjectList->fetch_assoc()){
								$subjectArray[] = $rowSubject['subject'];
							}
							
							$subjectsText = implode(", ",$subjectArray)
						?>
						
						<tr>
							<td><?php echo $row['first_name'] ?></td>
							<td><?php echo $row['last_name'] ?></td>
							<td><?php echo $subjectsText; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<?php } ?>
		</div>
	</body>
</html>