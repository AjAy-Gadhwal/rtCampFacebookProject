<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('examples/web');
	}

	public function albums()
	{
		$data['albums'] = array();

		if ($this->facebook->is_authenticated())
		{
			$albums = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,picture,albums{count,name,picture}');
			if (!isset($user['error']))
			{
				$data['albums'] = $albums;
			}

		}
				
		$this->load->view('examples/albums', $data);
	}

	public function album()
	{
		$data['album'] = array();

		if ($this->facebook->is_authenticated())
		{
			$album = $this->facebook->request('get', '/'.$_GET['album'].'/photos?fields=source');
			if (!isset($album['error']))
			{
				$data['album'] = $album;
			}

		}
		
		$this->load->view('examples/album', $data);
	}
	
	public function post()
	{
		header('Content-Type: application/json');

		$result = $this->facebook->request(
			'post',
			'/me/feed',
			['message' => $this->input->post('message')]
		);

		echo json_encode($result);
	}

	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('example/web_login', redirect);
	}
}
