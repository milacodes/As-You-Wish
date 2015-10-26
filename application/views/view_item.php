<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Item page</title>

	<style type="text/css">

	</style>
</head>
<body>
	<a href="/wishes/show">Home</a>
	<a href="/wishes/logout">Log Out</a>

	<p>Users who added this product/item to their wish list:</p>
	<ul>
	<?php foreach ($items as $item) { ?>
		
		<li><?= $item["username"]?></li>
	<?php } ?>

	
	</ul>
</body>
</html>