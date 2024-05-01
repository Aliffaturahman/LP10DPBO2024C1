<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelepon($i);
	public function getSize();
}

interface KontrakPasienPresenter
{
    public function prosesDataPasien(); // Fungsi untuk memproses data pasien

    public function FormAdd($data); // Fungsi untuk menangani form tambah data

    public function FormUpdate($id); // Fungsi untuk menangani form update data berdasarkan ID

    public function FormDelete($id); // Fungsi untuk menangani form hapus data berdasarkan ID

    public function getId($i); // Fungsi untuk mendapatkan ID berdasarkan indeks

    public function getNik($i); // Fungsi untuk mendapatkan NIK berdasarkan indeks

    public function getNama($i); // Fungsi untuk mendapatkan Nama berdasarkan indeks

    public function getTempat($i); // Fungsi untuk mendapatkan Tempat Lahir berdasarkan indeks

    public function getTl($i); // Fungsi untuk mendapatkan Tanggal Lahir berdasarkan indeks

    public function getGender($i); // Fungsi untuk mendapatkan Gender berdasarkan indeks

    public function getEmail($i); // Fungsi untuk mendapatkan Email berdasarkan indeks

    public function getTelp($i); // Fungsi untuk mendapatkan Nomor Telepon berdasarkan indeks

    public function getSize(); // Fungsi untuk mendapatkan jumlah data pasien
}