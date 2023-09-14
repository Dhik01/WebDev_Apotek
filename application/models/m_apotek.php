<?php 

class M_apotek extends CI_Model
{
/* ==================== TAMPIL DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php)
	public function tampil_data_obat()
	{
		//pemanggilan data yang berada di tabel obat
		return $this->db->get('obat');

	}

	//method yang dibuat di controller (C_apotek.php)
	public function tampil_data_karyawan()
	{
		//pemanggilan data yang berada di tabel karyawan
		return $this->db->get('karyawan');

	}

	//method yang dibuat di controller (C_apotek.php)
	public function tampil_data_penjualan()
	{
		//pemanggilan data yang berada di tabel penjualan
		return $this->db->get('penjualan');

	}

	//method yang dibuat di controller (C_apotek.php)
	public function tampil_data_admin()
	{
		//pemanggilan data yang berada di tabel admin
		return $this->db->get('tb_admin');

	}

/* ==================== input DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php)
	public function input_data($tabel,$data)
	{
		//memasukan data inputan ke tabel obat atau karyawan atau penjualan
		return $this->db->insert($tabel, $data);
	}

/* ==================== HAPUS DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php) untuk menghapus data obat
	public function hapus_data_obat($id_obat, $tabel)
	{
		$this->db->where('id_obat',$id_obat);
		//menghapus data dari tabel obat
		$this->db->delete($tabel);
	}

	//method yang dibuat di controller (C_apotek.php) untuk menghapus data karyawan
	public function hapus_data_karyawan($id_karyawan, $tabel)
	{
		$this->db->where('id_karyawan',$id_karyawan);
		//menghapus data dari tabel karyawan
		$this->db->delete($tabel);
	}

	//method yang dibuat di controller (C_apotek.php) untuk menghapus data penjualan
	public function hapus_data_penjualan($id_trans, $tabel){
		$this->db->where('id_trans',$id_trans);
		//menghapus data dari tabel penjualan
		$this->db->delete($tabel);
	}

/* ==================== CHANGE DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php) untuk merubah data obat
	public function get_data_obat($id_obat, $table)
	{
		//merubah data dari tabel obat
		$this->db->where('id_obat',$id_obat);
		return $this->db->get($table)->row();
	}

	//method yang dibuat di controller (C_apotek.php) untuk merubah data karyawan
	public function get_data_karyawan($id_karyawan, $table)
	{
		//merubah data dari tabel karyawan
		$this->db->where('id_karyawan',$id_karyawan);
		return $this->db->get($table)->row();
	}

	//method yang dibuat di controller (C_apotek.php) untuk merubah data penjualan
	public function get_data_penjualan($id_trans, $table){
		//merubah data dari tabel penjualan
		$this->db->where('id_trans',$id_trans);
		return $this->db->get($table)->row();
	}

/* ==================== UPDATE DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php) untuk mengupdate data obat
	public function update_obat($id_obat,$data,$table)
	{
		$this->db->where('id_obat',$id_obat);
		//mengupdate data dari tabel obat
		$this->db->update($table,$data);
	}

	//method yang dibuat di controller (C_apotek.php) untuk mengupdate data karyawan
	public function update_karyawan($id_karyawan,$data,$table)
	{
		$this->db->where('id_karyawan',$id_karyawan);
		//mengupdate data dari tabel karyawan
		$this->db->update($table,$data);
	}

	//method yang dibuat di controller (C_apotek.php) untuk mengupdate data penjualan
	public function update_penjualan($id_trans,$data,$table)
	{
		$this->db->where('id_trans',$id_trans);
		//mengupdate data dari tabel penjualan
		$this->db->update($table,$data);
	}

/* ==================== DETAIL DATA ===============================*/

	//method yang dibuat di controller (C_apotek.php) 
	//untuk menampilkan detail data obat
	public function detail_data($where, $table)
	{
		$this->db->where($where);
		return $this->db->get($table)->row(); 
	}

/* ==================== FOTO ===============================*/
	//method yang dibuat untuk menampilkan foto
	public function get_foto_obat($id_obat)
	{
		$this->db->select('foto');
		$this->db->from('obat');
		$this->db->where('id_obat',$id_obat);
		return $this->db->get()->row();
	}
}
