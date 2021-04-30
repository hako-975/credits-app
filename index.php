<?php 
	require 'connect.php';

	$credits = mysqli_query($connect, "SELECT * FROM credits INNER JOIN type ON credits.id_type = type.id_type ORDER BY type.type ASC, credits.asset ASC");
	$type = mysqli_query($connect, "SELECT * FROM type ORDER BY type ASC");

	if (isset($_POST['btnSearch'])) 
	{
		$keywordSearch = $_POST['keywordSearch'];
		$credits = mysqli_query($connect, "SELECT * FROM credits 
			INNER JOIN type ON credits.id_type = type.id_type 
			WHERE 
			credits.asset LIKE '%$keywordSearch%' OR 
			credits.creator LIKE '%$keywordSearch%' OR 
			type.type LIKE '%$keywordSearch%' 
			ORDER BY type.type ASC, credits.asset ASC");
	}

	if (isset($_POST['btnAddCredits'])) 
	{
		$asset = $_POST['asset'];
		$creator = $_POST['creator'];
		$id_type = $_POST['id_type'];
		$currentDate = time();

		$numberRows = count($asset);

		$query = "";
		
		for ($i = 0; $i < $numberRows; $i++) 
		{ 
			$query .= "INSERT INTO credits VALUES ('', '$asset[$i]', '$creator[$i]', '$currentDate', '$id_type[$i]');";
		}

		$query = mysqli_multi_query($connect, $query);
		
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
	<title>Credits</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Search</td>
				<td><input type="text" name="keywordSearch"></td>
				<td><button type="submit" name="btnSearch">Search</button></td>
			</tr>
		</table>
	</form>

	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No.</th>
				<th>Asset</th>
				<th>Creator</th>
				<th>Type</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($credits as $credit): ?>
				<tr>
					<td><?= $i++; ?></td>
					<td><?= $credit['asset']; ?></td>
					<td><?= $credit['creator']; ?></td>
					<td><?= $credit['type']; ?></td>
					<td>
 						<a href="edit_credit.php?id_credit=<?= $credit['id_credit']; ?>">Edit</a>
 						<a onclick="return confirm('are you sure want to delete <?= $credit['asset']; ?> | <?= $credit['creator']; ?> ?');" href="delete_credit.php?id_credit=<?= $credit['id_credit']; ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<hr>

	<form method="post">
		<button type="button" id="btnAddForm">Tambah Data Form</button>
		<button type="button" id="btnResetForm">Reset Form</button><br><br>
		
		<table border="1" cellpadding="10" cellspacing="0" id="addForm">
			
		</table>
		
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th><label>Asset</label></th>
				<td><input type="text" name="asset[]" required></td>
			</tr>
			<tr>
				<th><label>Creator</label></th>
				<td><input type="text" name="creator[]" required></td>
			</tr>
			<tr>
				<td><label>Type</label></td>
				<td>
					<select name="id_type[]">
						<?php foreach ($type as $t): ?>
							<option value="<?= $t['id_type']; ?>"><?= $t['type']; ?></option>
						<?php endforeach ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" name="btnAddCredits">Send</button>
				</td>
			</tr>
		</table>

		<input type="hidden" id="jumlahForm" value="1">
	</form>

	
	<script src="jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function()
		{
			$("#btnAddForm").click(function()
			{
				var jumlah = parseInt($("#jumlahForm").val());
				var nextform = jumlah + 1; 

				$("#addForm").append(`
					<tr>
						<th><label>Asset</label></th>
						<td><input type="text" name="asset[]" required></td>
					</tr>
					<tr>
						<th><label>Creator</label></th>
						<td><input type="text" name="creator[]" required></td>
					</tr>
					<tr>
						<td><label>Type</label></td>
						<td>
							<select name="id_type[]">
								<?php foreach ($type as $t): ?>
									<option value="<?= $t['id_type']; ?>"><?= $t['type']; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				`);

				$("#jumlahForm").val(nextform);
			});

				
			$("#btnResetForm").click(function()
			{
				$("#addForm").html(""); 
				$("#jumlahForm").val("1"); 
			});
		});
	</script>
</body>
</html>