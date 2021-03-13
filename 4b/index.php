<?php 

require './controller.php';

$books = lihatData("SELECT books.id as id_book, books.name as name_book, books.stok, books.image, books.deskripsi, categories.id as id_category,categories.name as name_category FROM books join categories on books.category_id = categories.id");

$categories = lihatData("SELECT * from categories");



if(isset($_POST['submit'])){
    if (tambahBuku($_POST) > 0) {
        echo ("<script>
        alert('Data Berhasil Ditambahkan');
        document.location.href = 'index.php';
    </script>");
    } else {
        echo ("<script>
        alert('Data Gagal Ditambahkan');
        document.location.href = 'index.php';
    </script>");
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dumb-Book</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="styles/main.css">
</head>
<body style="background-color: #212529">
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				<div class="container-fluid">
						<a class="navbar-brand" href="index.php" style="font-size: 40px;">Dumb-<span style="color:orange;">Perpustakaan</span></a>
				</div>
			</nav>
    </header>



		
<main style="margin-top: 100px;">
    <div class="container">
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addBooks">Tambah</button>
    </div>

    <div class="main-wrapper container m-auto">
        <hr class="w-100 mb-4">
        <div class="row books-list d-flex flex-wrap justify-content-around">
            <?php foreach ($books as $book) : ?>
            <div class="col-lg-3 col-md-6 card-group">
            <div class="card mb-3">
                <img class="card-img-top img-thumbnail" style="background-size: contain, cover; height: 300px" src="./image/<?= $book['image'] ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="body-text mb-3 w-100">
                        <h5 class="card-title .text-secondary text-nowrap text-truncate"><?= $book['name_book'] ?> </h5>
                        <p class="card-text text-secondary">
                            <small>Category : <?= $book['name_category'] ?></small>
                            &middot;
                            <small>Stok : <?= $book['stok'] ?></small>
                        </p>
                        <p class="text-nowrap text-truncate">
                            <?= $book['deskripsi'] ?>
                        </p>
                    </div>
                    <div class="body-button">
                    <?php if ($book['stok'] == 0) { ?>
                        <a href="./pinjam_buku.php?id=<?= $book['id_book'] ?>" class="btn-sm btn-secondary disabled" onclick="return confirm('Pinjam buku <?= $book['name_book'] ?> ?')">Pinjam</a>
                        <a href="./kembalikan.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-danger"
                            onclick="return confirm('Kembalikan buku <?= $book['name_book'] ?> ?')">Kembalikan</a>
                        <a href="./detail_buku.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-primary">Detail</a>
                    <?php } else { ?>
                        <a href="./pinjam_buku.php ?id=<?= $book['id_book'] ?>" class="btn-sm btn-success" onclick="return confirm('Pinjam buku <?= $book['name_book'] ?> ?')">Pinjam</a>
                        <a href="./kembalikan.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-danger" onclick="return confirm('Kembalikan buku <?= $book['name_book'] ?> ?')">Kembalikan</a>
                        <a href="./detail_buku.php?id=<?= $book['id_book'] ?>" type="button" class="btn-sm btn-primary">Detail</a>
                    <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</main>


<div class="modal fade" id="addBooks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_book">Nama Buku</label>
                        <input type="text" class="form-control" id="name_book" name="name_book">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" id="categories" name="category">
                            <option disabled selected>Select One Category</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control-file" id="image" name="image_book">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
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