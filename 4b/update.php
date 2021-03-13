<?php

require 'controller.php';


$id = $_GET["id"];

$select = lihatData("SELECT books.id as id_book, books.name as name_book, books.stok, books.image, books.deskripsi, categories.id as id_category,categories.name as name_category FROM books join categories on books.category_id = categories.id where books.id = $id")[0];

$categories = lihatData("SELECT * from categories");



// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (update($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/main.css">



    <title>Dumb-Course</title>
</head>

<body>
<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				<div class="container-fluid">
						<a class="navbar-brand" href="index.php" style="font-size: 40px;">Dumb-<span style="color:orange;">Course</span></a>
						<ul class="nav justify-content-end">
                            <li class="nav-item ">
                                <a class="nav-link active btn btn-warning m-2" aria-current="page" href="add_course.php">Add Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active btn btn-warning m-2" aria-current="page" href="add_content.php">Add Content</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active btn btn-warning m-2" aria-current="page" href="add_author.php">Add Author</a>
                            </li>
						</ul>
				</div>
			</nav>
    </header>


    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col mt-5">
                <h2 class="mb-3">Form Update</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="imageLama" value="<?= $select["thumbnail"] ?>">
                    <div class="row mb-3">
                        <label for="id" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $select['content_id']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nama Content</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $select['name_content']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="id_author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="id_author" name="id_author">
                                <option selected value="<?= $select['author_id']; ?>"><?= $select['name_author']; ?></option>
                                <?php foreach ($authors as $author) : ?>
                                <option value="<?= $author['id']; ?>"><?= $author['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="3" value=<?= $select['description']; ?>> <?= $select['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="video_link" class="col-sm-2 col-form-label">Link Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="video_link" name="video_link" value="<?= $select['video_link']; ?>">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>