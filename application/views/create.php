<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('components/head.php'); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container-md">
		<h1 class="mb-4 mt-4">New Item</h1>
		<form action="" method="post">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Nama</label>
				<input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Harga</label>
				<input type="number" name="harga" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="mb-3">
      			<label class="form-label">Kategori</label>
      			<select name="nama_kategori" class="form-select">
				  <option  value=""></option>
				  <?php foreach($kategori as $item) { ?>
					<option  value="<?php echo $item['id_kategori'] ?>"><?php echo $item['nama_kategori'] ?></option>
				  <?php } ?>
				</select> 
    		</div>
			<div class="mb-3">
      			<label for="disabledSelect" class="form-label">Status</label>
      			<select name="nama_status" class="form-select">
				  <option name="nama_status" value=""></option>
				  <?php foreach($status as $item) { ?>
					<option name="nama_status" value="<?php echo $item['id_status'] ?>"><?php echo $item['nama_status'] ?></option>
				  <?php } ?>
      			</select>
    		</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="<?php echo base_url('/') ?>" class="btn btn-secondary">Cancle</a>
		</form>

	</div>

	<?php $this->load->view('components/footer.php'); ?>

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>