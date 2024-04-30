<?php

/******************************************
			Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getPasienId($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function addPasien($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$birth = $data['birth'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query untuk menambahkan data pasien baru ke tabel pasien
		$query = "INSERT INTO `pasien`(`nik` ,`nama` , `tempat`, `tl`, `gender`, `email`, `telp`) VALUES ('$nik','$nama', '$tempat', '$birth', '$gender', '$email', '$telp')";

		// Mengeksekusi query dan mengembalikan hasilnya
		return $this->execute($query);
	}
	function updatePasien($data)
	{
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$birth = $data['birth'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query untuk mengupdate data anggota di tabel pasien berdasarkan id
		$query = "UPDATE `pasien` SET `nik`='$nik',`nama`='$nama',`tempat`='$tempat', `tl`='$birth', `gender`='$gender', `email`='$email', `telp`='$telp' WHERE id ='$id'";

		// Mengeksekusi query dan mengembalikan hasilnya
		return $this->execute($query);
	}
	function deletePasien($id)
	{
		// Query untuk menghapus data anggota dari tabel pasien berdasarkan id
		$query = "DELETE FROM pasien WHERE id = '$id'";

		// Mengeksekusi query dan mengembalikan hasilnya
		return $this->execute($query);
	}
}
