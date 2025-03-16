<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library(['form_validation', 'session']); // Load library
        $this->load->helper(['url', 'form']); // Load helper
    }

    // Tampilkan semua data siswa
    public function index() {
        $data['siswa'] = $this->Siswa_model->get_all_siswa();
        $this->load->view('siswa_view', $data);
    }

    // Form tambah data
    public function tambah() {
        $this->load->view('tambah_siswa');
    }

    // Proses simpan data
    public function simpan() {
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('tambah_siswa');
        } else {
            $data = [
                'nama'   => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp'  => $this->input->post('no_hp')
            ];
            $this->Siswa_model->insert_siswa($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('siswa');
        }
    }

    // Form edit data
    public function edit($id) {
        $data['siswa'] = $this->Siswa_model->get_siswa_by_id($id);
        $this->load->view('edit_siswa', $data);
    }

    // Proses update data
    public function update($id) {
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['siswa'] = $this->Siswa_model->get_siswa_by_id($id);
            $this->load->view('edit_siswa', $data);
        } else {
            $data = [
                'nama'   => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp'  => $this->input->post('no_hp')
            ];
            $this->Siswa_model->update_siswa($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diupdate!');
            redirect('siswa');
        }
    }

    // Hapus data
    public function hapus($id) {
        $this->Siswa_model->delete_siswa($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('siswa');
    }
}
?>