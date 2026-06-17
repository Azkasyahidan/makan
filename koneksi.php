<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "root",
    "db_aroma_catering"
);

if(!$koneksi){
    die("Koneksi gagal : ".mysqli_connect_error());
}
?>