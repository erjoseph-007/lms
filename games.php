<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('games_sidebar.php'); ?>
                <div class="span9" id="content">
                    <div class="row-fluid">
					    
						 <!-- breadcrumb -->
					<?php $query = mysqli_query($conn,"SELECT * FROM games WHERE game_id = '$session_id'")
					or die(mysqli_error());
					$row = mysqli_fetch_array($query);
					$id = $row['game_id'];

					?>
					     <ul class="breadcrumb">
							<li><a href="#"><b>Games</b></a></li>
						</ul>
						
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                        <div id="" class="muted pull-left"></div>
                        </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<ul	 id="da-thumbs" class="da-thumbs">
										<?php
										$game_query = mysqli_query($conn,"select * from games") or die(mysqli_error());
										while ($row = mysqli_fetch_array($game_query)) {
										$id = $row['game_id'];
										?>			
										<li id="del<?php echo $id; ?>">
											<a  class="classmate_cursor" href="#">
													<img id="games" src="admin/<?php echo $row['game_logo']; ?>" width="124" height="140" class="img-polaroid">
												<div><span></span></div>
											</a>
											<p class="game_name"><?php echo $row['game_name'];?></p>
											<p class="game_link"><?php echo $row['game_link']; ?></p>
										</li>
									<?php } ?>
									</ul>
                            </tbody>
                        </table>
						
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>