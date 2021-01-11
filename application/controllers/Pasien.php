<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_pasien');
		$this->load->helper('cookie');

		$this->load->helper('decodedata');

		$this->load->helper('encodedata');

		$this->load->library('session');

		$this->load->helper('captcha');

		$this->load->library('form_validation');

		$this->load->library(array('form_validation', 'session')); 

		$this->load->helper(array('form', 'url')); 

		$this->load->helper('access');
	}

	

	public function index($offset=0)
	{
			$jml = $this->db->get('ms_pasien');
			$config['base_url'] = base_url().'/Pasien/index';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = 10; /*Jumlah data yang dipanggil perhalaman*/	
			$config['uri_segment'] = 3;	/*data selanjutnya di parse diurisegmen 3*/
			$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	        $this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			$data['offset'] = $offset;
			$value['data'] = $this->M_pasien->getData($config['per_page'], $offset);
			$data['offer'] = array();
			if (count($value['data']) > 0) {
				for ($i=0; $i < count($value['data']) ; $i++) { 
					$item[$i]['ID']  = ($value['data'][$i]->ID);

					$item[$i]['nik']  = $value['data'][$i]->nik;

					$item[$i]['nik']  = $value['data'][$i]->nik;
					$item[$i]['nama_lengkap']  = $value['data'][$i]->nama_lengkap;
					$item[$i]['jenis_kelamin']  = $value['data'][$i]->jenis_kelamin;
					$item[$i]['kelas']  = $value['data'][$i]->kelas;
					$item[$i]['tarif_biaya']  = $value['data'][$i]->tarif_biaya;
					$item[$i]['jumlah_hari']  = $value['data'][$i]->jumlah_hari;
					$item[$i]['total_tagihan']  = $value['data'][$i]->total_tagihan;

					// $item[$i]['keterangan']  = $value['data'][$i]->keterangan;
					//$item[$i]['is_deleted']  = $value['data'][$i]->is_deleted;
					//$item[$i]['created_date']  = $value['data'][$i]->create_date;
					//$item[$i]['updated_date']  = $value['data'][$i]->update_date;
		            $data['offer'] = $item;
				}
			}
			$data['content'] = 'pasien/index';
			/*
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			die();
			*/
		    $this->load->view('template/index', $data);
	}

	public function edit()
	{
		$id = $this->input->get('id');
		$data['data'] = $this->M_bidang->checkData($id);
		$data['content'] = 'bidang/edit';
		$this->load->view('template/index', $data);
	}

	public function add_data()
	{

		$this->form_validation->set_rules('f_nik', 'f_nik', 'required');
		$this->form_validation->set_rules('f_nama_lengkap', 'f_nama_lengkap', 'required');
		$this->form_validation->set_rules('f_jenis_kelamin', 'f_jenis_kelamin', 'required');
		$this->form_validation->set_rules('f_kelas', 'f_kelas', 'required');
		$this->form_validation->set_rules('f_tarif_biaya', 'f_tarif_biaya', 'required');
		$this->form_validation->set_rules('f_jumlah_hari', 'f_jumlah_hari', 'required');
		$this->form_validation->set_rules('f_total_tagihan', 'f_total_tagihan', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->index();
        }else{
        	
			$datas = array(

				'nik' 			=> $this->input->post('f_nik'),
				'nama_lengkap' 	=> $this->input->post('f_nama_lengkap'),
				'jenis_kelamin' => $this->input->post('f_jenis_kelamin'),
				'kelas' 		=> $this->input->post('f_kelas'),
				'tarif_biaya' 	=> $this->input->post('f_tarif_biaya'),
				'jumlah_hari' 	=> $this->input->post('f_jumlah_hari'),
				'total_tagihan' => str_replace(',', '',$this->input->post('f_total_tagihan'))
			);

		
			if ($this->M_pasien->save($datas) != null) {

				// unlink('./assets/upload/product/'.$file['file_name']); 

				$alert = '<div class="alert alert-success alert-success-style1 alert-st-bg">

							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

								<span class="icon-sc-cl" aria-hidden="true">&times;</span>

							</button>

							<p><strong>Success!</strong> Tambah data berhasil.</p>

						</div>';
						
				$this->session->set_flashdata('notice', $alert);

				redirect('Pasien');

			}else{

				// unlink('./assets/upload/product/'.$file['file_name']);

				$alert = '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">

							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

								<span class="icon-sc-cl" aria-hidden="true">&times;</span>

							</button>

							<p><strong>Danger!</strong> Tambah data gagal.</p>

						</div>';

				$this->session->set_flashdata('notice', $alert);

				redirect('Pasien');

			}
        }

	}

	public function update_data()

	{
        $this->form_validation->set_rules('f_nik', 'f_nik', 'required');
		$this->form_validation->set_rules('f_nama_lengkap', 'f_nama_lengkap', 'required');
		$this->form_validation->set_rules('f_jenis_kelamin', 'f_jenis_kelamin', 'required');
		$this->form_validation->set_rules('f_kelas', 'f_kelas', 'required');
		$this->form_validation->set_rules('f_tarif_biaya', 'f_tarif_biaya', 'required');
		$this->form_validation->set_rules('f_jumlah_hari', 'f_jumlah_hari', 'required');
		$this->form_validation->set_rules('f_total_tagihan', 'f_total_tagihan', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->index();
        }else{
        	
			$datas = array(

				'nik' 			=> $this->input->post('f_nik'),
				'nama_lengkap' 	=> $this->input->post('f_nama_lengkap'),
				'jenis_kelamin' => $this->input->post('f_jenis_kelamin'),
				'kelas' 		=> $this->input->post('f_kelas'),
				'tarif_biaya' 	=> $this->input->post('f_tarif_biaya'),
				'jumlah_hari' 	=> $this->input->post('f_jumlah_hari'),
				'total_tagihan' => str_replace(',', '',$this->input->post('f_total_tagihan'))
			);
			
			if ($this->M_pasien->postUpdate($datas,$this->input->post('IDNOW')) != null) {

				$alert = '<div class="alert alert-success alert-success-style1 alert-st-bg">

							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

								<span class="icon-sc-cl" aria-hidden="true">&times;</span>

							</button>

							<p><strong>Success!</strong> Ubah data berhasil.</p>

						</div>';



				$this->session->set_flashdata('notice', $alert);

				redirect('Pasien');

			}else{

				$alert = '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">

							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

									<span class="icon-sc-cl" aria-hidden="true">&times;</span>

								</button>

							<i class="fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>

							<p><strong>Danger!</strong> Ubah data gagal.</p>

						</div>';

				$this->session->set_flashdata('notice', $alert);

				redirect('Pasien');


			}

        }

	}

	public function deletePasien()
	{
		$id = $this->input->get('id');
		$Deleted = $this->M_pasien->deleteData($id);
		if($Deleted){

		$alert = '<div class="alert alert-success alert-success-style1 alert-st-bg">

							<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

									<span class="icon-sc-cl" aria-hidden="true">&times;</span>

								</button>

							<p><strong>Success!</strong> Hapus data berhasil.</p>

						</div>';



			$this->session->set_flashdata('notice', $alert);

			redirect('Pasien');
		}else{
			$alert = '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">

                                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">

										<span class="icon-sc-cl" aria-hidden="true">&times;</span>

									</button>

                                <p><strong>Danger!</strong> Hapus data gagal.</p>

                            </div>';

					$this->session->set_flashdata('notice', $alert);

					redirect('Pasien');
		}
	}

}
