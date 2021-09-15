
   <div class="row-fluid">
       <a href="games.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Game</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Game</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								
									<?php
									$query = mysqli_query($conn,"SELECT * FROM games WHERE game_id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
										<label>Game Logo:</label>
										<div class="control-group">
						                  <div class="controls">
						                      <input class="input-file uniform_on" id="fileInput" type="file" name="photos" required>
						                  </div>
						                </div>

										<div class="control-group">
											<div class="controls">
												<input name="game_name" value="<?php echo $row['game_name']; ?>"class="input focused"  id="focusedInput" type="text"  placeholder = "Game Name" required>
											</div>
										</div>

										<div class="control-group">
										<div class="controls">
										<input class="input focused" name="game_link" value="<?php echo $row['game_link']; ?>"id="focusedInput" type="text" placeholder = "Game Link" required>
										</div>
										</div>
										
										<div class="control-group">
                                     	 <div class="controls">
											<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></i> Update</a></button>

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
                        $game_name = $_POST['game_name'];
                        $game_link = $_POST['game_link'];

                        
						if ($count > 1){ ?>
						<script>
						alert('Data Already Exist');
						</script>
							<?php
							}else{
							
							mysqli_query($conn,"UPDATE games set game_name = '$game_name' , game_link ='$game_link' where game_id = '$get_id' ")or die(mysqli_error());

							?>
							
						<script>
					 	window.location = "games.php"; 
						</script>
					<?php   }} ?>

					