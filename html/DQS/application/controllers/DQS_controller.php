<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DQS_controller extends CI_Controller {
    public function __construct()
        {
                parent::__construct();
        }

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
	public function index()
	{
        echo dirname(__FILE__);
		$this->load->view('test');
	}
    public function test_2()
	{
		$this->load->view('test_2');
	}
}