<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_apotek extends CI_Controller 
{
    function __construct()
    { 
        parent::__construct(); 
        if($this->session->userdata('status') != "login_admin"){
            redirect('Login/admin');
        }
    }

        public function index()
    {
        //method yang nanti akan digunakan di model 
        //untuk menampilkan data yang ada pada database
        $data['obat'] = $this->m_apotek->tampil_data_obat()->result();
        $data['karyawan'] = $this->m_apotek->tampil_data_karyawan()->result();
        $data['penjualan'] = $this->m_apotek->tampil_data_penjualan()->result();
        $this->load->view('apotek/home',$data);
    }

    public function obat()
    {
        //method yang nanti akan digunakan di model 
        //untuk menampilkan data yang ada pada database
        $data['apotek'] = $this->m_apotek->tampil_data_obat()->result();
        $this->load->view('apotek/obat/v_obat',$data);
    }

    public function karyawan()
    {
        //method yang nanti akan digunakan di model 
        //untuk menampilkan data yang ada pada database
        $data['apotek'] = $this->m_apotek->tampil_data_karyawan()->result();
        $this->load->view('apotek/karyawan/v_karyawan',$data);
    }

    public function penjualan()
    {
        //method yang nanti akan digunakan di model 
        //untuk menampilkan data yang ada pada database
        $data['apotek'] = $this->m_apotek->tampil_data_penjualan()->result();
        $this->load->view('apotek/penjualan/v_penjualan',$data);
    }

/* ====================================== TAMBAH DATA ===============================================*/

    //fungsi untuk menambah data Obat
    public function tambah_data_obat()
    {
        $kode_obat  = $this->input->post('kode_obat');
        $nama_obat  = $this->input->post('nama_obat');
        $jenis      = $this->input->post('jenis');
        $expired    = $this->input->post('expired');
        $harga      = $this->input->post('harga');

        //upload foto ke folder assets/foto
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = 5000; // max 5 MB

        $this->load->library('upload',$config);

        if($this->upload->do_upload('foto'))
        {
            //jika upload berhasil maka isi variabel $foto = file_name
            $foto=$this->upload->data('file_name');
        }else{
            //jika gagal upload maka isi variabel $foto = 'no_image.jpg'
            //echo "Upload Gagal";
            $foto='no_image.jpg';
        }

        //data obat yang dikirim harus bertipe array
        $data = array(
        'kode_obat'=>$kode_obat,
        'nama_obat'=>$nama_obat,
        'jenis'=>$jenis,
        'expired'=>$expired,
        'harga'=>$harga,
        'foto'=>$foto
        );

        //method yang nanti akan digunakan di model 
        //untuk memasukan data obat ke database apotek
        $this->m_apotek->input_data('obat', $data);
        redirect('C_apotek/obat');
    }

    //Fungsi untuk menambah data karyawan
    public function tambah_data_karyawan()
    {
        $kode_karyawan  = $this->input->post('kode_karyawan');
        $nama_karyawan  = $this->input->post('nama_karyawan');
        $tgl_lhr        = $this->input->post('tgl_lhr');
        $shif           = $this->input->post('shif');

        //data karyawan yang dikirim harus bertipe array
        $data = array(
        'kode_karyawan'=>$kode_karyawan,
        'nama_karyawan'=>$nama_karyawan,
        'tgl_lhr'=>$tgl_lhr,
        'shif'=>$shif
        );

        //method yang nanti akan digunakan di model 
        //untuk memasukan data karyawan ke database apotek
        $this->m_apotek->input_data('karyawan', $data);
        redirect('C_apotek/karyawan');
    }

    //Fungsi untuk menambah data penjualan
    public function tambah_data_penjualan()
    {
        $kode_trans    = $this->input->post('kode_trans');
        $nama_obat     = $this->input->post('nama_obat');
        $tgl_trans     = $this->input->post('tgl_trans');
        $metode_bayar  = $this->input->post('metode_bayar');
        $jumlah_beli   = $this->input->post('jumlah_beli');
        $nama_pelayan  = $this->input->post('nama_pelayan');
        $nama_penerima = $this->input->post('nama_penerima');
        $total_bayar   = $this->input->post('total_bayar');

        //data penjualan yang dikirim harus bertipe array
        $data = array(
        'kode_trans'=>$kode_trans,
        'nama_obat'=>$nama_obat,
        'tgl_trans'=>$tgl_trans,
        'metode_bayar'=>$metode_bayar,
        'jumlah_beli'=>$jumlah_beli,
        'nama_pelayan'=>$nama_pelayan,
        'nama_penerima'=>$nama_penerima,
        'total_bayar'=>$total_bayar
        );

        //method yang nanti akan digunakan di model 
        //untuk memasukan data penjualan ke database apotek
        $this->m_apotek->input_data('penjualan', $data);
        redirect('C_apotek/penjualan');
    }

/* ====================================== HAPUS DATA ===============================================*/

    //fungsi untuk menghapus data obat
    public function hapus_data_obat($id_obat)
    {
        //ambil data nama file foto berdasarkan id_obat
        $data = $this->m_apotek->get_foto_obat($id_obat);
        
        //lokasi gambar
        if ($data->foto != 'no_image.jpg'){
        //jika foto bukan 'no_image.jpg' maka hapus
        $path='./assets/foto/';
        //hapus data di folder
        @unlink($path.$data->foto);
        }

        //method yang nanti akan digunakan di model
        //untuk menghapus data obat dari database apotek
        $this->m_apotek->hapus_data_obat($id_obat, 'obat');
        redirect('C_apotek/obat');
    }

    //fungsi untuk menghapus data karyawan
    public function hapus_data_karyawan($id_karyawan)
    {
        //method yang nanti akan digunakan di model
        //untuk menghapus data karyawan dari database apotek
        $this->m_apotek->hapus_data_karyawan($id_karyawan, 'karyawan');
        redirect('C_apotek/karyawan');
    }

    //fungsi untuk menghapus data penjualan
    public function hapus_data_penjualan($id_trans)
    {
        //method yang nanti akan digunakan di model
        //untuk menghapus data penjualan dari database apotek
        $this->m_apotek->hapus_data_penjualan($id_trans, 'penjualan');
        redirect('C_apotek/penjualan');
    }

/* ====================================== EDIT DATA ===============================================*/

    //fungsi untuk merubah data obat
    public function edit_data_obat($id_obat)
    {
        //method yang nanti akan digunakan di model
        //untuk merubah data obat dari database apotek
        $data['apt'] = $this->m_apotek->get_data_obat($id_obat,'obat');
        $this->load->view('apotek/obat/edit_obat', $data);
    }

    //fungsi untuk merubah data karyawan
    public function edit_data_karyawan($id_karyawan)
    {
        //method yang nanti akan digunakan di model
        //untuk merubah data karyawan dari database apotek
        $data['apt'] = $this->m_apotek->get_data_karyawan($id_karyawan,'karyawan');
        $this->load->view('apotek/karyawan/edit_karyawan', $data);
    }

    //fungsi untuk merubah data penjualan
    public function edit_data_penjualan($id_trans)
    {
        //method yang nanti akan digunakan di model
        //untuk merubah data penjualan dari database apotek
        $data['apt'] = $this->m_apotek->get_data_penjualan($id_trans,'penjualan');
        $this->load->view('apotek/penjualan/edit_penjualan', $data);
    }

/* ====================================== UPDATE DATA ===============================================*/

    //fungsi untuk memperbaharui/mengupdate data obat dari database apotek
    public function update_data_obat(){
        $id_obat = $this->input->post('id_obat');
        $nama_obat = $this->input->post('nama_obat');
        $jenis     = $this->input->post('jenis');
        $expired   = $this->input->post('expired');
        $harga     = $this->input->post('harga');
        $old_foto  = $this->input->post('old_foto');
        $foto      = $_FILES['foto']['name'];

        if ($foto == '')
        { //jika $foto kosong
            $foto=$old_foto;
        }else{
            //upload foto ke folder assets/foto
            $config['upload_path'] = './assets/foto/';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = 5000; // max 5 MB
            $this->load->library('upload',$config);

            //jika upload berhasil maka isi variabel $foto = file_name
            if($this->upload->do_upload('foto'))
            { 
                $foto=$this->upload->data('file_name'); 
            }else{ //Jika gagal upload maka isi variabel $foto = 'no_image.jpg'
                    echo "Upload Gagal";
                    $foto='no_image.jpg';
                }
            //hapus foto
            //jika foto bukan 'no_image.jpg' maka hapus
            if ($old_foto!='no_image.jpg') { 
                //lokasi gambar
                $path='./assets/foto/';
                //hapus data di folder
                @unlink($path.$old_foto);       
            }
        }

        $data = array(
            'nama_obat'=>$nama_obat,
            'jenis'=>$jenis,
            'expired'=>$expired,
            'harga'=>$harga,
            'foto'=>$foto
        );
        
        //method yang nanti akan digunakan di model
        //untuk merubah mengapdate data obat dari database apotek
        $this->m_apotek->update_obat($id_obat, $data, 'obat');
        redirect('C_apotek/obat');
    }

    //fungsi untuk memperbaharui/mengupdate data karyawan dari database apotek
    public function update_data_karyawan()
    {
        $id_karyawan = $this->input->post('id_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $tgl_lhr       = $this->input->post('tgl_lhr');
        $shif          = $this->input->post('shif');

        $data = array(
            'nama_karyawan'=>$nama_karyawan,
            'tgl_lhr'=>$tgl_lhr,
            'shif'=>$shif
        );
        
        //method yang nanti akan digunakan di model
        //untuk merubah mengapdate data karyawan dari database apotek 
        $this->m_apotek->update_karyawan($id_karyawan,$data,'karyawan');
        redirect('C_apotek/karyawan');
    }

    //fungsi untuk memperbaharui/mengupdate data penjualan dari database apotek
    public function update_data_penjualan()
    {
        $id_trans      = $this->input->post('id_trans');
        $nama_obat      = $this->input->post('nama_obat');
        $tgl_trans      = $this->input->post('tgl_trans');
        $metode_bayar   = $this->input->post('metode_bayar');
        $jumlah_beli    = $this->input->post('jumlah_beli');
        $nama_pelayan   = $this->input->post('nama_pelayan');
        $nama_penerima  = $this->input->post('nama_penerima');
        $total_bayar    = $this->input->post('total_bayar');

        $data = array(
            'nama_obat'=>$nama_obat,
            'tgl_trans'=>$tgl_trans,
            'metode_bayar'=>$metode_bayar,
            'jumlah_beli'=>$jumlah_beli,
            'nama_pelayan'=>nama_pelayan,
            'nama_penerima'=>$nama_penerima,
            'total_bayar'=>$total_bayar
        );
        
        //method yang nanti akan digunakan di model
        //untuk merubah mengapdate data penjualan dari database apotek 
        $this->m_apotek->update_penjualan($id_trans,$data,'penjualan');
        redirect('C_apotek/penjualan');
    }

/* ====================================== DETAIL DATA ===============================================*/

    //fungsi untuk menampilkan detail data obat
    public function detail_obat($id_obat)
    {
        $where = array('id_obat' => $id_obat);
        $detail = $this->m_apotek->detail_data($where,'obat'); 
        $data['detail'] = $detail; 
        $this->load->view('apotek/obat/detail_obat', $data);
    }

    //fungsi untuk menampilkan detail data karyawan
    public function detail_karyawan($id_karyawan)
    {
        $where = array('id_karyawan' => $id_karyawan);
        $detail = $this->m_apotek->detail_data($where,'karyawan');
        $data['detail'] = $detail; 
        $this->load->view('apotek/karyawan/detail_karyawan', $data);
    }

    //fungsi untuk menampilkan detail data penjualan
    public function detail_penjualan($id_trans)
    {
        $where = array('id_trans' => $id_trans);
        $detail = $this->m_apotek->detail_data($where,'penjualan'); 
        $data['detail'] = $detail; 
        $this->load->view('apotek/penjualan/detail_penjualan', $data);
    }


/* ====================================== PRINT DATA ===============================================*/

    //fungsi untuk mencetak report data obat
    public function cetak_data_obat(){ 
        $data['apotek'] = $this->m_apotek->tampil_data_obat()->result(); 
        $this->load->view('apotek/obat/print_data_obat', $data); 
    }

    //fungsi untuk mencetak report data karyawan
    public function cetak_data_karyawan(){ 
        $data['apotek'] = $this->m_apotek->tampil_data_karyawan()->result(); 
        $this->load->view('apotek/karyawan/print_data_karyawan', $data); 
    }

    //fungsi untuk mencetak report data penjualan
    public function cetak_data_penjualan(){ 
        $data['apotek'] = $this->m_apotek->tampil_data_penjualan()->result(); 
        $this->load->view('apotek/penjualan/print_data_penjualan', $data); 
    }

/* ====================================== EXPORT DATA TO PDF ===============================================*/

    public function pdf_obat()
    {

        //load library dompdf_gen 
        $this->load->library('dompdf_gen');
        //menampilkan data obat yang ada pada tabel obat
        $data['apotek']= $this->m_apotek->tampil_data_obat('obat')->result();
        //load view laporan_pdf 
        $this->load->view('apotek/obat/laporan_obat',$data);
        //menentukan ukuran kertas
        $paper_size = 'A4';
        //menentukan orientation kertas
        $orientation = 'landscape';
        $html = $this->output->get_output();
        //set(pengaturan) kertas
        $this->dompdf->set_paper($paper_size, $orientation);
        //convert ke pdf
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //menentukan file export
        $this->dompdf->stream("Laporan Data Obat.pdf", array('Attachment' => 0));
    }

    public function pdf_karyawan()
    {

        //load library dompdf_gen 
        $this->load->library('dompdf_gen');
        //menampilkan data karyawan yang ada pada tabel karyawan
        $data['apotek']= $this->m_apotek->tampil_data_karyawan('karyawan')->result();
        //load view laporan_pdf 
        $this->load->view('apotek/karyawan/laporan_karyawan',$data);
        //menentukan ukuran kertas
        $paper_size = 'A4';
        //menentukan orientation kertas
        $orientation = 'landscape';
        $html = $this->output->get_output();
        //set(pengaturan) kertas
        $this->dompdf->set_paper($paper_size, $orientation);
        //convert ke pdf
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //menentukan file export
        $this->dompdf->stream("Laporan Data Karyawan.pdf", array('Attachment' => 0));
    }

    public function pdf_penjualan()
    {

        //load library dompdf_gen 
        $this->load->library('dompdf_gen');
        //menampilkan data penjualan yang ada pada tabel penjualan
        $data['apotek']= $this->m_apotek->tampil_data_penjualan('penjualan')->result();
        //load view laporan_pdf 
        $this->load->view('apotek/penjualan/laporan_penjualan',$data);
        //menentukan ukuran kertas
        $paper_size = 'A4';
        //menentukan orientation kertas
        $orientation = 'landscape';
        $html = $this->output->get_output();
        //set(pengaturan) kertas
        $this->dompdf->set_paper($paper_size, $orientation);
        //convert ke pdf
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //menentukan file export
        $this->dompdf->stream("Laporan Data Penjualan.pdf", array('Attachment' => 0));
    }

/* ====================================== EXPORT DATA TO EXCEL ===============================================*/

        public function excel_obat()
        {
            $data['apotek'] = $this->m_apotek->tampil_data_obat('obat')->result();
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
            $object = new PHPExcel();
            $object->getProperties()->setCreator("Admin Apotek");
            $object->getProperties()->setLastModifiedBy("Admin Apotek");
            $object->getProperties()->setTitle("Daftar Data Obat");
            $object->setActiveSheetIndex(0);
            $object->getActiveSheet()->setCellValue('A1', 'KODE OBAT');
            $object->getActiveSheet()->setCellValue('B1', 'NAMA OBAT');
            $object->getActiveSheet()->setCellValue('C1', 'JENIS OBAT');
            $object->getActiveSheet()->setCellValue('D1', 'HARGA');
            $object->getActiveSheet()->setCellValue('E1', 'EXPIRED');
            $baris = 2;
            $no = 1;
            foreach ($data['apotek'] as $apt){
                $object->getActiveSheet()->setCellValue('A'. $baris, $apt->kode_obat);
                $object->getActiveSheet()->setCellValue('B'. $baris, $apt->nama_obat);
                $object->getActiveSheet()->setCellValue('C'. $baris, $apt->jenis);
                $object->getActiveSheet()->setCellValue('D'. $baris, $apt->harga);
                $object->getActiveSheet()->setCellValue('E'. $baris, $apt->expired);
                $baris++;
            }
            $filename="Data Obat".'.xlsx';
            $object->getActiveSheet()->setTitle("Data Obat");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename. '"');
            header('Cache-Control: max-age=0');
            $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
            $writer->save('php://output');
            exit;
        }

        public function excel_karyawan()
        {
            $data['apotek'] = $this->m_apotek->tampil_data_karyawan('karyawan')->result();
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
            $object = new PHPExcel();
            $object->getProperties()->setCreator("Admin Apotek");
            $object->getProperties()->setLastModifiedBy("Admin Apotek");
            $object->getProperties()->setTitle("Daftar Data Karyawan");
            $object->setActiveSheetIndex(0);
            $object->getActiveSheet()->setCellValue('A1', 'KODE KARYAWAN');
            $object->getActiveSheet()->setCellValue('B1', 'NAMA KARYAWAN');
            $object->getActiveSheet()->setCellValue('C1', 'TANGGAL LAHIR');
            $object->getActiveSheet()->setCellValue('D1', 'SHIF');
            $baris = 2;
            $no = 1;
            foreach ($data['apotek'] as $apt){
                $object->getActiveSheet()->setCellValue('A'. $baris, $apt->kode_karyawan);
                $object->getActiveSheet()->setCellValue('B'. $baris, $apt->nama_karyawan);
                $object->getActiveSheet()->setCellValue('C'. $baris, $apt->tgl_lhr);
                $object->getActiveSheet()->setCellValue('D'. $baris, $apt->shif);
                $baris++;
            }
            $filename="Data Karyawan".'.xlsx';
            $object->getActiveSheet()->setTitle("Data Karyawan");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename. '"');
            header('Cache-Control: max-age=0');
            $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
            $writer->save('php://output');
            exit;
        }

         public function excel_penjualan()
        {
            $data['apotek'] = $this->m_apotek->tampil_data_penjualan('penjualan')->result();
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
            require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
            $object = new PHPExcel();
            $object->getProperties()->setCreator("Admin Apotek");
            $object->getProperties()->setLastModifiedBy("Admin Apotek");
            $object->getProperties()->setTitle("Daftar Data Penjualan");
            $object->setActiveSheetIndex(0);
            $object->getActiveSheet()->setCellValue('A1', 'KODE TRANSAKSI');
            $object->getActiveSheet()->setCellValue('B1', 'NAMA OBAT');
            $object->getActiveSheet()->setCellValue('C1', 'TANGGAL TRANSAKSI');
            $object->getActiveSheet()->setCellValue('D1', 'METODE BAYAR');
            $object->getActiveSheet()->setCellValue('E1', 'JUMLAH BELI');
            $object->getActiveSheet()->setCellValue('F1', 'NAMA PELAYAN');
            $object->getActiveSheet()->setCellValue('G1', 'NAMA PENERIMA');
            $object->getActiveSheet()->setCellValue('H1', 'TOTAL BAYAR');
            $baris = 2;
            $no = 1;
            foreach ($data['apotek'] as $apt){
                $object->getActiveSheet()->setCellValue('A'. $baris, $apt->kode_trans);
                $object->getActiveSheet()->setCellValue('B'. $baris, $apt->nama_obat);
                $object->getActiveSheet()->setCellValue('C'. $baris, $apt->tgl_trans);
                $object->getActiveSheet()->setCellValue('D'. $baris, $apt->metode_bayar);
                $object->getActiveSheet()->setCellValue('E'. $baris, $apt->jumlah_beli);
                $object->getActiveSheet()->setCellValue('F'. $baris, $apt->nama_pelayan);
                $object->getActiveSheet()->setCellValue('G'. $baris, $apt->nama_penerima);
                $object->getActiveSheet()->setCellValue('H'. $baris, $apt->total_bayar);
                $baris++;
            }
            $filename="Data Penjualan".'.xlsx';
            $object->getActiveSheet()->setTitle("Data Penjualan");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename. '"');
            header('Cache-Control: max-age=0');
            $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
            $writer->save('php://output');
            exit;
        }
}

//end of file C_apotek.php
//location : application\controllers\