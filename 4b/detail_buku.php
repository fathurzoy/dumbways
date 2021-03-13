<?php

require './controller.php';

$id = $_GET['id'];

$select = lihatData("SELECT books.id as id_book, books.name as name_book, books.stok, books.image, books.deskripsi, categories.id as id_category,categories.name as name_category FROM books join categories on books.category_id = categories.id where books.id = $id")[0];

$categories = lihatData("SELECT * from categories");

if(isset($_POST['submit'])){
    if (updateBuku($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil DiUpdate');
        document.location.href = 'index.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal DiUpdate');
        document.location.href = 'index.php';
    </script>");
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="styles/main.css">


<title>Dumb-Book Detail</title>
</head>
<body class="pb-5">
<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				<div class="container-fluid">
						<a class="navbar-brand" href="index.php" style="font-size: 40px;">Dumb-<span style="color:orange;">Perpustakaan</span></a>
				</div>
			</nav>
    </header>

<main style="margin-top: 100px;">
    <div class="wrapper w-75 m-auto d-flex justify-content-around">
        <div class="img-book w-50 p">
            <img class="img-thumbnail" style="background-size: cover;" width="100%" height="100%" src="./image/<?= $select['image'] ?>" alt="<?= $select['image'] ?>">
        </div>
        <div class="desc-course m-20">
            <h3><?= $select['name_book'] ?></h3>
            <hr class="w-100">
            <div class="body-text mb-3 w-100">
                <p class="card-text text-secondary">
                    <small>Category : <?= $select['name_category'] ?></small>
                    &middot;
                    <small>Stok : <?= $select['stok'] ?></small>
                </p>
                <p class="text-nowrap text-truncate">
                    <?= $select['deskripsi'] ?>
                </p>
            </div>

            
            <div>
                <button class="btn btn-warning" data-toggle="modal" data-target="#updateBooks">Update</button>
                <a class="btn btn-danger" href="delete.php?id=<?= $select["id_book"]; ?>" onclick="return confirm('yakin?');">Delete</a>
            </div>
        </div>
				
				
    </div>
	
</main>



<div class="modal fade" id="updateBooks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="imageLama" value="<?= $select["image"] ?>">
                <input type="hidden" name="id_book" value="<?= $select["id_book"] ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_book">Nama Buku</label>
                        <input type="text" class="form-control" id="name_book" name="name_book" value="<?= $select['name_book'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $select['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description" value="<?= $select['stok'] ?>"><?= $select['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" id="categories" name="category">
                            <option selected value="<?= $select['id_category'] ?>"><?= $select['name_category'] ?></option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control-file" id="image" name="image_book" value="<?= $select['image'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>