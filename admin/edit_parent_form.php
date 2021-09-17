   <div class="row-fluid">
       <a href="students.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Parent</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Parent</div>
                            </div>
                            <div class="block-content collapse in">
							<?php
                  $query = mysqli_query($conn,"SELECT * FROM parents WHERE parent_id = '$get_id'")or die(mysqli_error());
                  $row = mysqli_fetch_array($query);
                  ?>
            
								
										<div class="control-group">
                      <div class="controls">
                        <input name="username" value="<?php echo $row['username']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Username" required>
                      </div>
                    </div>  
									
										<div class="control-group">
                      <div class="controls">
                        <input name="parents_firstname"  value="<?php echo $row['parents_firstname']; ?>"  class="input focused" id="focusedInput" type="text" placeholder = "Firstname" required>
                      </div>
                    </div>
	
										<div class="control-group">
                      <div class="controls">
                        <input  name="parents_lastname"  value="<?php echo $row['parents_lastname']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Lastname" required>
                      </div>
                    </div>
	
										<div class="control-group">
                      <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"     ></i></button>

                        </div>
                      </div>
                    </form>
		              </div>
                </div>
            </div>
            <!-- /block -->
        </div>

<?php
if (isset($_POST['update'])) {
   
    $username = $_POST['username'];
    $parents_firstname = $_POST['parents_firstname'];
    $parents_lastname = $_POST['parents_lastname'];
      

mysqli_query($conn,"UPDATE parents SET username = '$username' , parents_firstname ='$parents_firstname' , parents_lastname = '$parents_lastname' where parent_id = '$get_id' ")or die(mysqli_error());

?>

<script>
window.location = "parents.php"; 
</script>

<?php     }  ?>
