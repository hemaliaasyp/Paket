<?php
class M_paket extends CI_Model
{

    //fetch all pictures from db
    public function getall()
    {
        return $this->db->get('paket')->result_array();
    }
    //save picture data to db
    public function proses_tambah_data()
    {
        $data = [
            "nama_paket" => $this->input->post('nama_paket'),
            "keterangan" => $this->input->post('keterangan'),
            "harga" => $this->input->post('harga'),
        ];
        $this->db->insert('paket', $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_paket', $id);
        $this->db->delete('paket');
    }
    public function ambilId($id)
    {
        return $this->db->get_where('paket', ['id_paket' => $id])->row_array();
    }
    public function proses_edit_data()
    {
        $data = [
            "nama_paket" => $this->input->post('nama_paket'),
            "keterangan" => $this->input->post('keterangan'),
            "harga" => $this->input->post('harga'),
        ];
        $this->db->where('id_paket', $this->input->post('id_paket'));
        $this->db->update('paket', $data);
    }
}
