<?php 
/**
* 
*/
class Marketing extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){		
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['user_id'] = $session_data[0]['id_user'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();
 		
		$data['order_so'] = $this->mView->semua_sales_order();
		$this->load->view('marketing/marketing',$data);
	}
	function tambah_order(){		
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['user_id'] = $session_data[0]['id_user'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();

		$no_so = $this->mView->check_new_order();
		$data['nomer_so'] = $no_so[0]['order_so'];
		$data['list_klien'] = $this->mView->list_klien();
		$this->load->view('marketing/marketing_tambah_order',$data);
	}
	function tambah_baru(){		
		$this->mCreate->add_sales_order();
		redirect('marketing','refresh');
	}
	function order_detail(){
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['user_id'] = $session_data[0]['id_user'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();

		$order = $this->uri->segment(3);
		$data['detail_order'] = $this->mView->detail_sales_order($order);
		$data['jadwal_tayang'] = $this->mView->lihat_jadwal($order);
		$data['detail_status'] = $this->mView->lihat_status_order($order);
		$data['file_produksi'] = $this->mView->lihat_file_produksi($order);
		
		$this->load->view('marketing/marketing_detail_sales_order',$data);

	}
	function edit_order(){
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['user_id'] = $session_data[0]['id_user'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();
		
		$order = $this->uri->segment(3);
		$data['detail_order_edit'] = $this->mView->detail_sales_order($order);
		$this->load->view('marketing/marketing_edit_order',$data);

	}
	function edit_order_run(){
		$order = $this->input->post('idso');
		$this->mUpdate->edit_sales_order();
		redirect('marketing/order_detail/'.$order,'refresh');
	}
	function delete_sales_order(){
		$order = $this->uri->segment(3);
		$this->mDelete->delete_sales_order($order);
		redirect('marketing','refresh');
	}
	// User Marketing
	function user(){		
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();

		$data['show_user_data'] = $this->mView->show_user_data_marketing();
		$this->load->view('marketing/user',$data);
	}
	function register_new(){
		$this->mCreate->register_new();
		redirect('marketing/user','refresh');
	}

	function delete(){
		$idpost = $this->uri->segment(3);
		$this->mDelete->delete_user($idpost);
		redirect('marketing/user','refresh');
	}
	function user_order(){		
		$session_data = $this->session->userdata('login');
		$data['user_login'] = $session_data;
		$data['username'] = $session_data[0]['username'];
		$data['leveluser'] = $session_data[0]['level_user'];
		$data['followup'] = $this->mView->count_followup();

		$data['show_user_data'] = $this->mView->show_user_order();
		$this->load->view('marketing/user_order',$data);
	}
	function approve_order(){
		$order = $this->uri->segment(3);
		$this->mUpdate->approve_order_user($order);
		redirect('marketing/user_order','refresh');
	}
}
?>