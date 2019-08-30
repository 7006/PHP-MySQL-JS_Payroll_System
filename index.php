
<!-- use dark theme -->
<!-- define sql constants -->
<!-- make oop style -->
<!-- add delete posibility -->
<!-- add comments -->
<!-- change method to post location.reload();-->
<!-- success messages -->
<!-- make table small -->
<?php 
include('include/functions.php');

if (!empty($_GET)){
	if (isset($_GET['create']) &&  $_GET['create'] === 'new'){
		add_new_row();
		// header("Refresh:0; url=/");
	}
	if (isset($_GET['edit'])){
		edit_existing_row();
		// header("Refresh:0; url=/");
	}
	if (isset($_GET['delete'])){
		delete_row();
		// header("Refresh:0; url=/");

	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Payroll</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	  <meta name="" content="">
	  <link rel="stylesheet" href="css/style.css">
	<link  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script  defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script  defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script  defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script  defer type="text/javascript" src="scripts/main.js"></script>
</head>
<body>
	<div class="container">
			<div class="row">
				<div class="header">
					<h1>PAYROLL</h1>
					<span>my Magzim</span>
				</div>
			</div>
		<div class="row">
			<table class="table table-sm" id="myTable">
				<thead>
				    <tr>
						<th scope="col">id</th>
						<th scope="col" id="name">Name</th>
						<th scope="col" id="department">Department</th>
						<th scope="col" id="amount">Amount</th>
						<th scope="col" id="salary">Salary</th>
						<th scope="col">Action</th>
				    </tr>
				</thead>
				<tbody>
				  	<?php foreach (get_data() as $key => $row): ?>
				    <tr>
						<th scope="row"><?= $row['id']?>
							<input hidden=""  name="id" value="<?= $row['id']?>" form="<?= $row['id'] ?>">
						</th>
						<td>
							<input type="text" class="form-control" name="name" placeholder="" form="<?= $row['id'] ?>" value="<?= $row['name']?>" required>
						</td>
						<td>
							<select class="form-control" name="department" form="<?= $row['id'] ?>">
								<option selected hidden value="<?= $row['department'] ?>"><?= $row['department'] ?></option>
								<option value="TV sets">TV sets</option>
								<option value="Mobile phones">Mobile phones</option>
								<option value="Computers">Computers</option>
							</select>
						</td>
						<td>
							<input type="number" class="form-control"  name="amount" placeholder="" form="<?= $row['id'] ?>" value="<?= $row['amount']?>" required>
						</td>
						<td>
							<span class="salary"><?= $row['product_cost']*$row['amount']*$row['coefficient']?> $</span>
						</td>
						<td>
							<form id="<?= $row['id'] ?>" action="/" method="GET">
								<button type="submit" class="btn btn-primary" name="edit" value="<?= $row['id'] ?>">Edit</button>
								<button type="submit" class="btn btn-primary" name="delete" value="<?= $row['id'] ?>">Delete</button>
							</form>
						</td>

				    </tr>
				    <?php endforeach ?>
				    <tr class="table-active">
						<th scope="row">New</th>
						<td>
							<input type="text" class="form-control" name="name" placeholder="Worker's name" form="new" value="" required>
						</td>
						<td>
							<select class="form-control" name="department" form="new" required>
								<option>TV sets</option>
								<option>Mobile phones</option>
								<option>Computers</option>
							</select>
						</td>
						<td>
							<input type="number" class="form-control"  name="amount" placeholder="Produced amount" form="new" value="" required>
						</td>
						<td title="will be calculated automaticaly based on department name">Auto</td>
						<td>
							<form id="new" action="/" method="GET">
								<button type="submit" class="btn btn-primary" name="create" value="new">Add worker</button>
							</form>
						</td>

				    </tr>
				</tbody>
			</table>
		</div>
	</div>



</body>
</html>


