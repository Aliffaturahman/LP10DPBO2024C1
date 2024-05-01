<!-- 
    Saya Alif Faturahman Firdaus (2107377) mengerjakan Latihan Praktikum 11 dalam mata kuliah DPBO 
    untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. 
    Aamiin. 
-->

<?php

/******************************************
            Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();

if (isset($_POST['add'])) {             // Jika tombol 'add' pada form diklik
    $tp->Form_Add($_POST);              // Panggil metode 'Form_Add' pada objek TampilPasien dengan data form sebagai argumen
} 
else if (isset($_GET['add'])) {         // Jika parameter 'add' pada URL terdefinisi
    $tp->AddForm();                     // Panggil metode 'AddForm' pada objek TampilPasien untuk menampilkan form tambah
} 
else if (isset($_POST['update'])) {     // Jika tombol 'update' pada form diklik
    $id = $_GET['update'];              // Mendapatkan nilai 'id' dari parameter GET
    $tp->Form_Update($id);              // Panggil metode 'Form_Update' pada objek TampilPasien dengan 'id' sebagai argumen
} 
else if (!empty($_GET['update'])) {     // Jika parameter 'update' pada URL tidak kosong
    $id = $_GET['update'];              // Mendapatkan nilai 'id' dari parameter GET
    $tp->updateForm($id);               // Panggil metode 'updateForm' pada objek TampilPasien dengan 'id' sebagai argumen
} 
else if (!empty($_GET['hapus'])) {      // Jika parameter 'hapus' pada URL tidak kosong
    $id = $_GET['hapus'];               // Mendapatkan nilai 'id' dari parameter GET
    $tp->Form_Delete($id);              // Panggil metode 'Form_Delete' pada objek TampilPasien dengan 'id' sebagai argumen
} 
else {                                  // Jika tidak ada kondisi yang terpenuhi
    $tp->tampil();                      // Panggil metode 'tampil' pada objek TampilPasien untuk menampilkan data pasien
}