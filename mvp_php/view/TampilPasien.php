<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelepon($i) . "</td>
			<td>
			<div class='container my-1 header'>
				<a href='index.php?update=" . $this->prosespasien->getId($i) . "' class='btn-edit'>
					<span class='material-symbols-outlined'>edit</span>
				</a>
				<a href='index.php?hapus=" . $this->prosespasien->getId($i) . "' class='btn-delete'>
					<span class='material-symbols-outlined'>delete</span>
				</a>
			</div>
			</td></tr>";

		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function AddForm()
	{
		$button = 'add';
		// Membaca template formAddPasien.html
		$this->tpl = new Template("templates/formAddPasien.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_BUTTON", $button);
		$this->tpl->replace("DATA_TITLE", "TAMBAH");

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function updateForm($id)
	{
		$button = "update"; 										// Variabel untuk menyimpan nilai tombol
		$this->tpl = new Template("templates/formAddPasien.html"); 	// Membuat objek Template dan menginisialisasi dengan template HTML
		$this->prosespasien->prosesDataPasien(); 					// Memproses data pasien

		// Ukuran data
		$size = $this->prosespasien->getSize(); 	// Mengambil ukuran data pasien

		// Mencari Id
		$i = 0; 		// Variabel untuk iterasi
		$cek = false; 	// Variabel untuk memeriksa kecocokan Id
		
		while ($i < $size && !$cek) {
			if ($this->prosespasien->getId($i) == $id) { // Memeriksa apakah Id pasien cocok dengan Id yang diberikan
				$cek = true; // Mengubah variabel $cek menjadi true jika ditemukan kecocokan
			}
			$i++;
		}

		if ($cek) {
			// Mengganti placeholder dengan data yang ditemukan
			$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($i - 1));
			$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($i - 1));
			$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($i - 1));
			$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($i - 1));
			$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($i - 1));
			$this->tpl->replace("DATA_TELP", $this->prosespasien->getTelepon($i - 1));
			$lk = $this->prosespasien->getGender($i - 1) === "Laki-laki" ? "checked" : ""; // Memeriksa jenis kelamin pasien dan memberikan atribut "checked" jika jenis kelamin adalah "Laki-laki"
			$pr = $this->prosespasien->getGender($i - 1) === "Perempuan" ? "checked" : ""; // Memeriksa jenis kelamin pasien dan memberikan atribut "checked" jika jenis kelamin adalah "Perempuan"
			$this->tpl->replace("DATA_LK", $lk); // Mengganti placeholder dengan nilai jenis kelamin "Laki-laki" atau kosong
			$this->tpl->replace("DATA_PR", $pr); // Mengganti placeholder dengan nilai jenis kelamin "Perempuan" atau kosong
		}

		// Mengganti placeholder lainnya
		$this->tpl->replace("DATA_BUTTON", $button); 	// Mengganti placeholder tombol dengan nilai "update"
		$this->tpl->replace("DATA_TITLE", "UBAH"); 		// Mengganti placeholder judul dengan nilai "UBAH"

		// Menampilkan ke layar
		$this->tpl->write(); // Menulis konten template ke layar
	}


	function Form_Add($data)
	{
		$this->prosespasien->FormAdd($data);
		header('location:index.php');
	}
	function Form_Delete($id)
	{
		$this->prosespasien->FormDelete($id);
		header('location:index.php');
	}
	function Form_Update($id)
	{
		$this->prosespasien->FormUpdate($id);
		header('location:index.php');
	}
}
