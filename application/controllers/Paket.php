<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function index()
    {
        
        $data['title'] =  'Halaman Data Paket';
        $data['paket'] =  $this->M_paket->getall();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('V_paket/v_paket', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_data()
    {
        $data['title'] =  'Halaman Tambah Paket';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('V_paket/v_tambahpaket');
        $this->load->view('templates/footer');
    }
    public function proses_tambah_data()
    {
        $config['upload_path']   = './gambar/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal Upload";
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $nama_paket = $this->input->post('nama_paket', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga = $this->input->post('harga', TRUE);

            $data = array(
                'nama_paket' => $nama_paket,
                'keterangan' => $keterangan,
                'harga' => $harga,
                'foto' => $foto,
            );
            $this->db->insert('paket', $data);
            // var_dump($data);
            // die;
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan Bro!
           </div>');
            redirect('Paket');
        }
    }

    public function hapus_data($id)
    {
        $this->M_paket->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Berhasil Dihapus Bro!
       </div>');
        redirect('Paket');
    }
    public function edit_data($id)
    {
        $data['title'] =  'Halaman Edit Paket';
        $data['paket'] = $this->M_paket->ambilId($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('V_paket/v_editpaket', $data);
        $this->load->view('templates/footer');
    }
    public function proses_edit_data($id)
    {
        $id = $this->input->post('id_paket');
        $config['upload_path']   = './gambar/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {

            $nama_paket = $this->input->post('nama_paket', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga = $this->input->post('harga', TRUE);
            $data = array(
                'nama_paket' => $nama_paket,
                'keterangan' => $keterangan,
                'harga' => $harga,

            );
            $this->db->where('id_paket', $id);
            $this->db->update('paket', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah Bro!
           </div>');
            redirect('Paket');
        } else {
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $nama_paket = $this->input->post('nama_paket', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga = $this->input->post('harga', TRUE);

            $data = array(
                'nama_paket' => $nama_paket,
                'keterangan' => $keterangan,
                'harga' => $harga,
                'foto' => $foto,
            );
            $this->db->where('id_paket', $id);
            $this->db->update('paket', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah Bro!
           </div>');
            redirect('Paket');
        }
    }
}
