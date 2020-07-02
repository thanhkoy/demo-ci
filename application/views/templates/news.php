<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" src="asset/js/news.js"></script>


	<script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
	</script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<p class="display-4" align="center">News</p>
			<button type="button" id="add_news" class="btn btn-primary">Add New</button>
			<table class="table table-hover table-bordered" id="datatable">
				<thead>
				<tr>
					<th>Content</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($news as $value) {
					?>
					<tr>
						<input type="hidden" name="data" data-id="<?php echo $value['id']; ?>">
						<td><p><?php echo $value['content']; ?></p></td>
						<td>
							<button type="button" class="edit_news">
								<i class="fa fa-edit"></i>
							</button>
						</td>
						<td><a href="index.php/news_controller/deleteNews/<?php echo $value['id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- News Modal -->
<div class="modal fade" id="news_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">News</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="form-group">
						<label for="news_content">Content</label>
						<textarea class="form-control" id="news_content"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" name="save_modal" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="hidden" name="data" data-action="" data-id="0">
			</div>
		</div>
	</div>
</div>

</body>
</html>
