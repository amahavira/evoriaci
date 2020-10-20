<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct(); //untuk memanggil method contructor yg ada di CI_Controller
		$this->load->library('form_validation'); //suapaya bisa menggunakan validasinya
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user/evoria');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login | EVORIA';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($user) { //jika usernya ada
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else if ($user['role_id'] == 2) {
						redirect('user/evoria');
					} else if ($user['role_id'] == 4) {
						redirect('user/halaman_bisnis');
					} else {
						redirect('user/evoria');
					}
				} else {
					$this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        Wrong password!
                    </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    This email has not been activated!
                </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                The Email is not registered!
            </div>');
			redirect('auth');
		}
	}

	public function login_eo()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login EO | EVORIA';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login_eo');
			$this->load->view('templates/auth_footer');
		} else {
			// validasinya success
			$this->_login();
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user/evoria');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'The Email has already registered!'
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('nohp', 'Number Phone', 'required|trim|integer|min_length[5]', [
			'integer' => 'The Number Phone must be number!',
			'min_length' => 'The Number Phone too short!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'The Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registration | EVORIA';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'nohp' => htmlspecialchars($this->input->post('nohp', true)),
				'email' => htmlspecialchars($email),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//siapakan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('users', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Congratulation! your account has been created. Please activate your account!
            </div>');
			redirect('auth');
		}
	}

	public function registration_eo()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'The Email has already registered!'
		]);
		$this->form_validation->set_rules('nohp', 'Number Phone', 'required|trim|integer|min_length[5]', [
			'integer' => 'The Number Phone must be number!',
			'min_length' => 'The Number Phone too short!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'The Password dont match!',
			'min_length' => 'The Password min 6 characters!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('nama_bisnis', 'Nama Bisnis', 'required|trim');
		$this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('medsos', 'Medsos', 'required|trim');
		// $this->form_validation->set_rules('id_range', 'Range', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registration | EVORIA';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration_eo');
			$this->load->view('templates/auth_footer');
		} else {

			$config['upload_path'] = './assets/dokumen/npwp/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('npwp')) {
				echo $this->upload->display_errors();
				// echo '<pre>';
				// print_r($this->upload->data());
				// echo '</pre>';
			} else {
				$email = $this->input->post('email');
				$npwp = $this->upload->data('file_name');
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'nohp' => htmlspecialchars($this->input->post('nohp', true)),
					'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
					'email' => htmlspecialchars($email),
					'image' => 'default.png',
					'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id' => 4,
					'is_active' => 0,
					'nama_bisnis' => htmlspecialchars($this->input->post('nama_bisnis', true)),
					'tentang' => htmlspecialchars($this->input->post('tentang', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'kota' => htmlspecialchars($this->input->post('kota', true)),
					'medsos' => htmlspecialchars($this->input->post('medsos', true)),
					'npwp' => $npwp,
					'date_created' => time()
				];

				//siapakan token
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('users', $data);
				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'verify');

				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Congratulation! your account has been created. Please activate your account
					</div>');
				redirect('auth/login_eo');
			}
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'evoriaaxelindonesia@gmail.com',
			'smtp_pass' => 'evoriaaxel123@',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('evoriaaxelindonesia@gmail.com', 'EVORIA Indonesia');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}


		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < 3600) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('users');

					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        ' . $email . ' has been activated! Please login.
                    </div>');
					redirect('auth');
				} else {
					$this->db->delete('users', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        Account activation failed! Token expired.
                    </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Account activation failed! Token invalid.
                </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Account activation failed! Wrong email.
            </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                You have been logged out!
            </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('users', ['email' => $email, 'is_active' => 1])->row_array();
			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '
                <div class="alert alert-success" role="alert">
                    Please check your email to reset your password!
                </div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Email is not registered or activated!
                </div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < 3600) {
					$this->session->set_userdata('reset_email', $email);
					$this->changePassword();
				} else {
					$this->db->delete('users', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        Account activation failed! Token expired.
                    </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Reset password failed! Wrong token.
                </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '
            <div class="alert alert-danger" role="alert">
                Reset password failed! Wrong email.
            </div>');
			redirect('auth');
		}
	}

	public function changePassword()
	{

		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Password has been changed! Please login.
            </div>');
			redirect('auth');
		}
	}
}
