   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Parent</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
                    <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="student_id" id="focusedInput" type="text" placeholder = "Student ID" required>
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="parents_firstname" id="focusedInput" type="text" placeholder = "Parent's Firstname" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="parents_lastname" id="focusedInput" type="text" placeholder = "Parent's Lastname" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="username" id="focusedInput" type="text" placeholder = "Username" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="password" id="focusedInput" type="text" placeholder = "Password" required>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					<?php
if (isset($_POST['save'])){
$student_id = $_POST['student_id'];
$parents_firstname = $_POST['parents_firstname'];
$parents_lastname = $_POST['parents_lastname'];
$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($conn,"select * from parents where username = '$username' and password = '$password' and student_id = '$student_id' and password = '$password' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into parents (student_id,parents_firstname,parents_lastname,username,password) values('$student_id','$parents_firstname','$parents_lastname','$username','$password')")or die(mysqli_error());

mysqli_query($conn,"insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')")or die(mysqli_error());
?>
<script>
window.location = "parents.php";
</script>
<?php
}
}
?>