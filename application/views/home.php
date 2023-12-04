<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('components/head.php'); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
</head>

<body>
    
	<div class="container-md">
        <h1 class="mb-4 mt-4">PRODUCT LIST</h1>
        <a href="<?php echo base_url('create') ?>" class="btn btn-primary mb-4">NEW ITEM</a>
        <table class="table table-stiped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Ketrgori</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item){ ?>
                    <tr id="<?php echo $item['id_produk'] ?>">
                        <td hidden><?php $item['id_produk'] ?></td>
                        <td><?php echo $item['nama_produk'] ?></td>
                        <td><?php echo $item['harga'] ?></td>
                        <td><?php echo $item['nama_kategori'] ?></td>
                        <td>
                            <a href="<?php echo base_url('edit/'.$item['id_produk']) ?>" class="btn btn-primary">EDIT</a>
                        </td>
                        <td>
                        <a class="btn btn-danger remove">HAPUS</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

	</div>

	<?php $this->load->view('components/footer.php'); ?>

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        // console.log(id);
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: 'delete/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your imaginary file has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
     
    });
    
</script>
</body>

</html>