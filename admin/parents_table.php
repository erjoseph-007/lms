	<?php include('dbcon.php'); ?>
	<form action="delete_parent.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	<a data-toggle="modal" href="#parent_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
	<div class="pull-right">
	    <ul class="nav nav-pills">
		<li class="active">
			<a href="parents.php">All</a>
		</li>
		</ul>
	</div>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
			<th></th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			
		<?php
            $parent_query = mysqli_query($conn,"SELECT * FROM parents") or die(mysqli_error());
            while ($row = mysqli_fetch_array($parent_query)) {
            $id = $row['parent_id'];
        ?>
	
		<tr>
		<td width="30">
		<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		</td>
	
		<td><?php echo $row['parents_firstname'] ?></td> 
		<td><?php echo $row['parents_lastname']; ?></td> 
		<td width="100"><?php echo $row['username']; ?></td> 
	
		<td width="30"><a href="edit_parent.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
	
		</tr>
	<?php } ?>    
	
	</tbody>
	</table>
	</form>