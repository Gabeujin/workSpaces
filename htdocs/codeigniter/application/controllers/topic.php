<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topic extends CI_Controller {

	public function index()
	{
    print('topic page');
    // $this->load->view('welcome_message');
	}

  public function get($id)
  {
    print('get segment page'.'-'.urldecode($id));
  }
}
