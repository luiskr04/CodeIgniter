<?php
//Este controlador se encarga de manejar todas las vistas de la aplicacion
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

	public function index()
	{
		$this->view('pages/home','','Inicio');
	}

	public function view($content,$data,$title){
		$content = $this->load->view($content,$data,true);
		$data = array(
			'url' => $this->getUrl(),
			'title' => $title,
			'content' => $content
		);
		$this->load->view('init',$data);
	}

	public function getUrl()
	{
		$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
		$base_url .= '://' . $_SERVER['HTTP_HOST'];
		$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
		return $base_url;
	}
}
