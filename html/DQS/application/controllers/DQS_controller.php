<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DQS_controller extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		redirect('Qrcode/Qrcode_generator/show_qrcode');
	}
	public function test_2()
	{
		$this->load->view('test_2');
	}
	public function output($view, $data = null)
	{
		$this->load->view('template/header');
		$this->load->view('template/javascript');
		$this->load->view($view, $data);
		$this->load->view('template/footer');
	}
	
	public function output_sidebar_admin($view, $data = null)
	{
		$this->load->view('template/header_admin');
		//$this->load->view('template/navbar');
		$this->load->view('template/sidebar_admin');
		$this->load->view('template/javascript');
		$this->load->view($view, $data);
		$this->load->view('template/footer');
	}
	public function output_sidebar_member($view, $data = null)
	{
		$this->load->view('template/header_member');
		//$this->load->view('template/navbar');
		$this->load->view('template/sidebar_member');
		$this->load->view('template/javascript');
		$this->load->view($view, $data);
		$this->load->view('template/footer');
	}
	
	public function show_register()
	{
		$this->output('Member/v_member_register');
		session_start();
	}
	public function output_navbar($view, $data = null)
	{
		$this->load->view('template/header');
		$this->load->view('template/javascript');
		//$this->load->view('template/navbar');
		$this->load->view($view, $data);
		$this->load->view('template/footer');
	}
	public function show_register_confirm()
	{

		$this->output('v_register_confirm');
	}

}