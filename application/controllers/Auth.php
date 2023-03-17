<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s harus disi!',
            'valid_email' => '%s harus valid!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => '%s harus disi!',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('V_auth/v_login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user[role_id] == 1) {
                        redirect('Superadmin');
                    } elseif ($user[role_id] == 2) {
                        redirect('Admin');
                    } else {
                        redirect('User');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password Anda Salah!
                    </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Email belum diaktifkan!
            </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Email belum terdaftar Bro!
            </div>');
            redirect('Auth');
        }
    }
    public function Register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => '%s harus disi!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '%s harus disi!',
            'valid_email' => '%s harus valid',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => '%s harus disi!',
            'matches' => '%s tidak sama!',
            'min_length' => '%s terlalu pendek!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'matches' => '%s tidak sama!',

        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('V_auth/v_register', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'user.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $query =  $this->db->insert('user', $data);
            if ($query) {
                set_pesan('Daftar berhasil, Silahkan LOGIN.');
                redirect('auth');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        SUCCESS! anda telah berhasil logout!
       </div>');
        redirect('Auth');
    }
}
