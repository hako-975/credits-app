<?php 
	require 'connect.php';
	
	$id_credit = $_GET['id_credit'];
	$credit = mysqli_query($connect, "SELECT * FROM credits INNER JOIN type ON credits.id_type = type.id_type WHERE credits.id_credit = '$id_credit' ORDER BY type.type ASC, credits.asset ASC");
	$fetch_credit = mysqli_fetch_assoc($credit);
	$type = mysqli_query($connect, "SELECT * FROM type ORDER BY type ASC");


	if (isset($_POST['btnEditCredits'])) 
	{
		$asset = $_POST['asset'];
		$creator = $_POST['creator'];
		$id_type = $_POST['id_type'];
		$currentDate = time();

		$query = mysqli_query($connect, "UPDATE credits SET asset = '$asset', creator = '$creator', id_type = '$id_type', date_created = '$currentDate' WHERE id_credit = '$id_credit'");

		if ($query) 
		{
			header("Location: index.php");
			exit();
		}
		else
		{
			echo "false";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Credit - <?= $fetch_credit['asset']; ?> | <?= $fetch_credit['creator']; ?></title>
</head>
<body>
	<form method="post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th><label>Asset</label></th>
				<td><input type="text" name="asset" required value="<?= $fetch_credit['asset']; ?>"></td>
			</tr>
			<tr>
				<th><label>Creator</label></th>
				<td><input type="text" name="creator" required value="<?= $fetch_credit['creator']; ?>"></td>
			</tr>
			<tr>
				<td><label>Type</label></td>
				<td>
					<select name="id_type">
						<option value="<?= $fetch_credit['id_type']; ?>"><?= $fetch_credit['type']; ?></option>
						<option disabled>---</option>
						<?php foreach ($type as $t): ?>
							<option value="<?= $t['id_type']; ?>"><?= $t['type']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" name="btnEditCredits">Send</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>