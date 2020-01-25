<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Fungsi');
	}

	public function index(){
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$data['isi']="home";
		$this->load->vars($data);
		$this->load->view('hasil');
	}
	public function Kabupaten()	{
		$data['kabkot'] = "https://api.rajaongkir.com/basic/city?province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$this->load->vars($data);
		$this->load->view('kabupaten');
	}
	public function ongkir(){
		$this->load->model('Fungsi');
		$data['ongkirs'] = "http://api.rajaongkir.com/basic/cost";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$this->load->vars($data);		
		$this->load->view('ongkir');
	}
	public function resi(){
		$data['resis'] = "https://api.rajaongkir.com/basic/waybill";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$this->load->vars($data);
		$this->load->view('resi');
	}

	public function tentang(){
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$data['isi'] = "tentang";
		$this->load->vars($data);
		$this->load->view('hasil');
	
	}

	public function widget(){
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";		
		$data['isi'] = "widget";
		$this->load->vars($data);
		$this->load->view('hasil');	
	}

	public function contact(){
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";		
		$data['isi'] = "contact";
		$this->load->vars($data);
		$this->load->view('hasil');	
	}

	public function cekongkir(){
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$data['isi'] = 'widgetongkir';
		$this->load->vars($data);		
		$this->load->view('themewidget');
	}

	 public function cekresi(){
		$data['isi'] = 'widgetcekresi';
		$this->load->vars($data);
		$this->load->view('themewidget');
	}

	public function cekongkirwidget(){
		$this->load->model('Fungsi');
		$data['ongkirs'] = "http://api.rajaongkir.com/basic/cost";
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$data['isi']="ongkir";
		$this->load->vars($data);
		$this->load->view('hasil');
	}

	public function cekresiwidget(){
		$data['resis'] = "https://api.rajaongkir.com/basic/waybill";
		$data['city'] = "http://api.rajaongkir.com/basic/city";
		$data['provinsi'] = "http://api.rajaongkir.com/basic/province";
		$data['key'] = "8c5cfcf5ad88865b1aa34cf3dc95cb3b";
		$data['isi']="resi";
		$this->load->vars($data);
		$this->load->view('hasil');
	}
}
