 <?php

class Foo extends CI_Controller
{
	private $_header = "SUPER ADMIN";

	public function __construct(){
		parent::__construct();
		$this->cname = 'Foo';
		$this->load->model('foo_model');
		$this->load->library('Pdf');
	}

	public function index()
	{
		$data['title'] = $this->_header;
		$this->load->view('foo/aunt', $data);
	}

	public function foo_aunt()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Username', 'required');
		if ($this->form_validation->run()) 
		{
			$username = $this->input->post('username');
			$password = do_hash($this->input->post('password'), 'MD5');
			$data 	  = $this->foo_model->aunt_log($username, $password);
			if ($data) {
				foreach ($data->result() as $key) {
					$s = array();
					$s['username'] = $key->username;
					$s['nama']	   = $key->nama;
					$this->session->set_userdata($s);
				}

				redirect('Foo/home');
			}
			else
	      	{
		    	$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
		    	redirect('Foo');
		    }
		}else{
			$this->session->set_flashdata('msg', 'salah pkok e');
		    redirect('Foo');
		}
	}

	public function home()
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			$data['brand'] = $this->session->userdata('nama');
			$data['data'] = $this->foo_model->getadmin();
			$this->load->view('foo/home', $data);
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}	
	}

	function fooupdate()
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			$id_user = $this->input->post('id_user');
			$status = $this->input->post('status');
		    $data_update = array(
		        'status' => $status
		    );
	      	$where = array('id_user'=>$id_user);
	      	$res = $this->db->update('tb_admin',$data_update,$where);
		    if ($res>=1){
		        redirect ('foo/home');
		    }else{
		    	redirect('Foo/formsa');	
		    }
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}
	}

	public function fookom()
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			$data['brand'] = $this->session->userdata('nama');
			$data['data'] = $this->Mkom->get_kom();
			$this->load->view('foo/kom', $data);
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}	
	}

	public function foorayon()
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			$data['brand'] = $this->session->userdata('nama');
			$data['data'] = $this->Mrayon->path_data_rayon();
			$data['count'] = $this->Mrayon->count_all();
			$this->load->view('foo/rayon', $data);
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}	
	}

	public function fookader()
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			$data['brand'] = $this->session->userdata('nama');
			$data['data'] = $this->foo_model->get_kader();
			$this->load->view('foo/kader', $data);
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}
	}

	// 
	public function cetak_kom($id)
	{
		if ($this->session->has_userdata('username') && $this->session->has_userdata('username')) {
			
			$data = $this->foo_model->pdf_kader_kom($id);
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('NAWAIDEA');
			$pdf->SetTitle('KOMISARIAT');
			$pdf->SetSubject('TCPDF Tutorial');
			$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

			$pdf->setFooterData(array(0,64,0), array(0,64,128));
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

			$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

			$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

			$pdf->setFontSubsetting(true);
			$pdf->setJPEGQuality(75);
			
			$pdf->SetFont('helvetica', '', 8, '', true);

			$pdf->AddPage('P', 'F4');
			
	        foreach ($data as $rows){
	            $nama = $rows->nama;
	            $kom = $rows->kode_kom;
	            $rayon = $rows->kode_rayon;
	            $foto = $pdf->Image(base_url('assets/images/').$rows->foto, 10, 100, 100, 100, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
	        }
			$tbl = <<<EOD
			

			<table cellspacing="0" cellpadding="1" border="1">
			    
			    
			    <tr>
			    	<td>$nama</td>
			    	<td>$kom</td>
			    	<td>$rayon</td>
			    	<td>$foto</td>
			    	
			    </tr>
				

			</table>    
EOD;

			$pdf->writeHTML($tbl, true, false, false, false, '');
			ob_end_clean();
			$pdf->Output();
		}else{
			$this->session->set_flashdata('msg', '<h1 class="text-center ">salah poko e wkwkwk</h1>');
			redirect('Foo');
		}
	}

	public function aktifkan($id_user = 0)
    {
        $this->foo_model->settingaktifasi($id_user, array('status' =>  'active'));
        redirect($this->cname.'/home', 'refresh');
    }

    public function nonaktifkan($id_user = 0)
    {
        $this->foo_model->settingaktifasi($id_user, array('status' =>  'inactive'));
        redirect($this->cname.'/home', 'refresh');
    }
    
}