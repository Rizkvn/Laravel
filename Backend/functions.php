<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//create connection
$conn = mysqli_connect("localhost","root","","laravel");
//localhost = alamat ip/website, root=user akses database, null=password user, laravel=database yg dipanggil

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($rows = mysqli_fetch_assoc($result)) {
        $rows[] = $rows;
    }
    return $rows;
}

function user($data){
    global $conn;
    $nama = strtolower(($data["nama"]));
    $username = strtolower(($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 =  mysqli_real_escape_string($conn, $data["password2"]);
    //cek password
    if ($password !== $password2) {
        echo "<script> 
        alert('konfirmasi password tidak sesuai !');
        </script> ";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
                   id='', nama  = '$nama', username  = '$username',  password  = '$password'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>