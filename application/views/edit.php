<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('components/head.php'); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container-md">
		<h1 class="mb-4 mt-4">Edit Item</h1>
		<form action="<?php echo base_url('page/update/'), $item->id_produk ?>" method="post">
			<div class="mb-3">
				<label  class="form-label">Nama</label>
				<input type="text" name="nama_produk" value="<?php echo $item->nama_produk; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label  class="form-label">Harga</label>
				<input type="number" name="harga" value="<?php echo $item->harga; ?>" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="mb-3">
      			<label class="form-label">Kategori</label>
      			<select name="nama_kategori" class="form-select">
				  <option value=""></option>
				  	<?php foreach($kategori as $data) { ?>
					<option name="" value="<?php echo $data['id_kategori'] ?>" <?php if($item->kategori_id == $data['id_kategori']) echo 'selected' ?>><?php echo $data['nama_kategori'] ?></option>
					<?php } ?>
				</select>
    		</div>
			<div class="mb-3">
      			<label  class="form-label">Status</label>
      			<select name="nama_status" class="form-select">
				  <option name="nama_status" value=""></option>
				  <?php foreach($status as $data) { ?>
					<option name="nama_status" value="<?php echo $data['id_status'] ?>" <?php if($item->status_id == $data['id_status']) echo 'selected' ?> ><?php echo $data['nama_status'] ?></option>
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