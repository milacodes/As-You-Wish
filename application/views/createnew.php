<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Quotes Page</title>

	<style type="text/css">
	h3, a{
		display: inline-block;
	}
	h3{
		margin-right: 400px;
	}
	</style>
</head>
<body>
	<div id = "head">
		<h3>Create a New Wish List Item</h3>
		<a href="/wishes/show">Home</a>
		<a href="/wishes/logout">Log Out</a>
	</div>

	<?=  $this->session->flashdata("errors")?>
	<form action = "/wishes/add_it" method = "post">
		<p>Item/Product: <input type = "text" name = "item_name"></p>
		<input type = "submit" value = "Add! That! Item!">
	</form>

</body>
</html>