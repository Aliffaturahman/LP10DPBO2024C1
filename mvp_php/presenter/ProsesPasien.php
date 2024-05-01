<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelepon($row['telp']); //mengisi telp

				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	// Fitur CRUD
	function FormAdd($data)
	{
		$this->tabelpasien->open();  // Membuka tabel 'tabelpasien'
		$this->tabelpasien->addPasien($data);  // Menambahkan catatan pasien baru menggunakan data yang diberikan
		$this->tabelpasien->close();  // Menutup tabel 'tabelpasien'
	}
	function FormUpdate($id)
	{
		$data = array(
			'id' => $id,
			'nik' => $_POST['nik'],  // Mengambil nilai 'nik' dari variabel superglobal $_POST
			'nama' => $_POST['nama'],  // Mengambil nilai 'nama' dari variabel superglobal $_POST
			'tempat' => $_POST['tempat'],  // Mengambil nilai 'tempat' dari variabel superglobal $_POST
			'birth' => $_POST['birth'],  // Mengambil nilai 'birth' dari variabel superglobal $_POST
			'gender' => $_POST['gender'],  // Mengambil nilai 'gender' dari variabel superglobal $_POST
			'email' => $_POST['email'],  // Mengambil nilai 'email' dari variabel superglobal $_POST
			'telp' => $_POST['telp']  // Mengambil nilai 'telp' dari variabel superglobal $_POST
		);
		$this->tabelpasien->open();  // Membuka tabel 'tabelpasien'
		$this->tabelpasien->updatePasien($data);  // Memperbarui catatan pasien dengan data yang diberikan
		$this->tabelpasien->close();  // Menutup tabel 'tabelpasien'
	}
	function FormDelete($id)
	{
		$this->tabelpasien->open();  // Membuka tabel 'tabelpasien'
		$this->tabelpasien->deletePasien($id);  // Menghapus catatan pasien dengan ID yang ditentukan
		$this->tabelpasien->close();  // Menutup tabel 'tabelpasien'
	}

	// Getter
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelepon($i)
	{
		//mengembalikan telp Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
