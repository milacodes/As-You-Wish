<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Wishes Page</title>

	<style type="text/css">
	div h1, a{
		display: inline-block;
	}
	div h1{
		margin-right: 400px;
	}
	table{
		border: 3px solid black;
	}
	#U{
		margin-bottom: 40px;
	}
	#them{
		margin-bottom: 40px;
	}
	</style>
</head>
<body>
	<div id = "head">
		<h1>Hello, <?= $user["username"] ?></h1>
		<a href="/wishes/logout">Log Out</a>
	</div>

	<h4>Your Wish List</h4>
	<table id = "U">
		<tr>
			<th>Item</th>
			<th>Added By</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		<!-- throw in php here -->
<?php
		foreach ($mines as $mine) { ?>

			<tr>
				<td><a href="/wishes/view_item/<?= $mine['item_id']?>"><?= $mine['name']?></a></td>
				<td><?= $mine['added_by'] ?></td>
				<td><?= $mine['created_at'] ?></td>
		  <?php 

		  		if ($mine['user_id'] !== $this->session->userdata("id")) { ?>
		  			<td><a href="/wishes/remove/<?= $mine['item_id']?>">Remove from my Wishlist</a></td>
		  <?php }
		  		else{ ?>
		  			<td><a href="/wishes/delete/<?= $mine['item_id']?>">Delete</a></td>
		  <?php	} ?>
				
			</tr>
<?php	} ?>
	</table>

	<h4>Other Users' WishList</h4>
	<table id = "them">
		<tr>
			<th>Item</th>
			<th>Added By</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		<!-- throw in php here -->
<?php
		foreach ($alls as $all) { ?>

			<tr>
				<td><a href="/wishes/view_item/<?= $all['id']?>"><?= $all['name']?></a></td>
				<td><?= $all['added_by'] ?></td>
				<td><?= $all['created_at'] ?></td>
				<td><a href="/wishes/addmine/<?= $all['id']?>">Add to my Wishlist</a></td>
			</tr>
<?php	} ?>

	</table>

	<a href="/wishes/addnew">Add Item</a>

</body>
</html>