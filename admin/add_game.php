<div class="row-fluid">
		<!-- block -->
		<div class="block">
		    <div class="navbar navbar-inner block-header">
		        <div class="muted pull-left">Add Game</div>
		    </div>
		    <div class="block-content collapse in">
		        <div class="span12">
				<form method="post" enctype="multipart/form-data">

				
						<label>Game Logo:</label>
						<div class="control-group">
		                  <div class="controls">
		                      <input class="input-file uniform_on" id="fileInput" type="file" name="photos" required>
		                  </div>
		                </div>
					
						<div class="control-group">
		                  <div class="controls">
		                    <input class="input focused" name="game_name" id="focusedInput" type="text" placeholder = "Game Name" required>
		                  </div>
		                </div>
						
						<div class="control-group">
		                  <div class="controls">
		                    <input class="input focused" name="game_link" id="focusedInput" type="text" placeholder = "Game Link" required>
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
		    if (isset($_POST['save'])) {
		        $game_name 	= $_POST['game_name'];
		        $game_link 	= $_POST['game_link'];
				$photos 	= $_FILES['photos'];

				$query = mysqli_query($conn,"SELECT * FROM games WHERE game_name = '$game_name' and game_link = '$game_link' ")or die(mysqli_error());
				$count = mysqli_num_rows($query);

				if ($count > 0){ ?>
					<script>
					alert('Data Already Exist');
					</script>
				?>
				<?php
				} else {
					if (isset($_FILES['photos']['error']) && $_FILES['photos']['error'] === UPLOAD_ERR_OK) {
						$uploadPath 	= '../uploads/logos';
						$name 			= $_FILES['photos']['name'];
						$ext 			= pathinfo($name, PATHINFO_EXTENSION);
						$new 			= date("Ymd") . "__" . time().rand().".".$ext;
						$tmp 			= $_FILES['photos']['tmp_name']; // get file from temporary storage
						$size 			= (int) $_FILES['photos']['size'];
						$uploads 		= $uploadPath . "/" . $new;

						if ($size > 5000) {
							?>
								<script>
									alert("Photo uploaded must be less than 5MB.");
								</script>

							<?php 
						} // size is greater than 5MB


						mysqli_query($conn,"INSERT into games (game_name,game_link,game_logo)
						values ('$game_name','$game_link','$uploads')         
						") or die(mysqli_error()); 

						move_uploaded_file($tmp, $uploads); // upload image
					} // $_FILES
					?>
					<script>
						window.location = "games.php"; 
					</script>
					<?php   
				}
			} 
		?>