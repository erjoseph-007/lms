<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('games_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_game.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Games List</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_game.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#game_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										    <tr>
                                    <th></th>
                                    <th>Logo</th>
                                    <th> Game Name</th>
                                    <th>Link</th>

                                    <th></th>
                                    </tr>
									</thead>
									<tbody>
								<?php
                                    $game_query = mysqli_query($conn,"select * from games") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($game_query)) {
                                    $id = $row['game_id'];
                                ?>
									<tr>
									<td width="30">
									<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
									</td>
                                    <td width="40"><img class="img-circle" src="<?php echo $row['game_logo']; ?>" height="50" width="50"></td> 
                                    <td><?php echo $row['game_name'] . " "; ?></td> 
                                    <td><?php echo $row['game_link']; ?></td> 
                               
									<td width="50"><a href="edit_game.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
                                </tr>
                            <?php } ?>
                           
									</tbody>
								</table>
								</form>
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