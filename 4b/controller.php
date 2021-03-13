<?php

$host = 'localhost';
$username = 'root';
$password = "";
$db = 'db_perpustakaan';

$conn = mysqli_connect($host, $username, $password, $db);

function lihatData($query)
{
    global $conn;

    $data = mysqli_query($conn, $query);
    
    $rows = [];

    if($data === null){
        return $rows;
    }else{    
        while($row = mysqli_fetch_assoc($data)){
            $rows[] = $row;
        }
        return $rows;
    }
}
function upload()
{
    $nama = $_FILES['image_book']['name'];
    $ukuran = $_FILES['image_book']['size'];
    $error = $_FILES['image_book']['error'];
    $tmp = $_FILES['image_book']['tmp_name'];
    
    if ($error === 4) {
        echo `
            <script>
                alert('Foto Belum Dipilih!');
            </script>
        `;

        return false;
    }

    $typeFile = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $nama);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $typeFile)) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berupa Gambar!');
            </script>
        `;

        return false;
    }

    if ($ukuran > 2000000) {
        echo `
            <script>
                alert('Foto Sekolah Harus Berukuran Kurang Dari 2MB!');
            </script>
        `;

        return false;
    }

    $generateNameFile = uniqid();
    $generateNameFile .= '.';
    $generateNameFile .= $ekstensiFile;

    move_uploaded_file($tmp, './image/'.$generateNameFile);

    return $generateNameFile;
}


function delete($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM books WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function updateBuku($data)
{
global $conn;

    $id = htmlspecialchars($data["id_book"]);
    $name = htmlspecialchars($data["name_book"]);
    $description = htmlspecialchars($data["description"]);
    $stok = htmlspecialchars($data["stok"]);
    $category = htmlspecialchars($data["category"]);
    $imageLama = htmlspecialchars($data["imageLama"]);


    //cek apakah gambar diubah
    if ($_FILES['image_book']['error']) {
        $image = $imageLama;
    } else {
        $image = upload();
    }

    $query = "UPDATE books SET 
                books.id='$id', 
                books.name='$name', 
                books.stok='$stok', 
                books.image='$image',
                books.deskripsi='$description', 
                books.category_id='$category' 
                WHERE books.id =$id;
            ";
    mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}


function tambahBuku($data){
    global $conn;

    $name_book = htmlspecialchars($data['name_book']);
    $stok = htmlspecialchars($data['stok']);
    $description = htmlspecialchars($data['description']);
    $category_id = htmlspecialchars($data['category']);

    $stok_int = intval($stok);
    $cat_id_int = intval($category_id);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO books VALUES
                ('', '$name_book', $stok_int, '$foto', '$description', $cat_id_int);";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function kembalikanBuku($id){
    global $conn;

    $select_book = mysqli_query($conn, "SELECT stok FROM books WHERE id = $id");

    $stok = mysqli_fetch_assoc($select_book);

    $toInt = intval($stok['stok']);

    $total = $toInt + 1;

    mysqli_query($conn, "UPDATE books set stok = $total where id = $id");

    return mysqli_affected_rows($conn);
}

function pinjamBuku($id){
    global $conn;

    $select_book = mysqli_query($conn, "SELECT stok FROM books WHERE id = $id");

    $stok = mysqli_fetch_assoc($select_book);

    $toInt = intval($stok['stok']);

    $total = $toInt - 1;

    mysqli_query($conn, "UPDATE books set stok = $total where id = $id");

    return mysqli_affected_rows($conn);
}