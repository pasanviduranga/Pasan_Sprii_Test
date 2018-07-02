<html>
    <head>
        <title>Student Management System</title>
        <link rel="stylesheet" type="text/css" href="media/css/style.css" />
    </head>
    <body>
        <div class="container">
			<?php

				/*include 'class/class.user.php';

				if(isset($_POST['btnSave'])){
					$user = new User();
					$user->register($_POST);
				}*/
			?>
			<div class="container-div-frm-student">
				<div class="div-frm-student">
					<form id="frmStudent" name="frmStudent" action="" method="post" autocomplete="off" enctype="multipart/form-data" onsubmit="return ValidateReg();">
						<p>
							<label for="txtFname">First Name </label>
							<input type="text" name="txtFname" id="txtFname" value="" placeholder="Enter First name" />
						</p>
						<p>
							<label for="txtLname">Last Name </label>
							<input type="text" name="txtLname" id="txtLname" value="" placeholder="Enter Last name" />
						</p>
						<p>
							<label for="selSubject">Subjects </label>
							<select multiple id="selSubject" name="selSubject" class="dropdown">
							<option value="Subject 1">Subject 1</option>
							<option value="Subject 2">Subject 2</option>
							<option value="Subject 3">Subject 3</option>
							<option value="Subject 4">Subject 4</option>
							</select>
						</p>    
						<p class="button-section">
							<input type="submit" name="btnSave" id="btnSave" value="Save" />
						</p>      
					</form>
				</div>
			</div>
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
						<tr>
							<td>cell1_1</td>
							<td>cell2_1</td>
							<td>cell3_1</td>
						</tr>
						<tr>
							<td>cell1_2</td>
							<td>cell2_2</td>
							<td>cell3_2</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>