<?php 

require APPPATH . '/libraries/REST_Controller.php';
Class Book Extends REST_Controller{

	function __construct($config='rest'){
		parent:: __construct($config);
		//this->load->library('database');
	}

	function index_get(){
		$data = $this->db->get('books')->result();
		
		return $this->response($data, 200);
	}

	//untuk mengirim data
	function index_post(){
		$isbn 	= $this->post('isbn');
		$title 	= $this->post('title');
		$writer = $this->post('writer');
		$desc 	= $this->post('desc');

		$book = array(
			'title'		=>	$title,
			'isbn'		=>	$isbn,
			'writer'	=>	$writer,
			'desc'		=>	$desc);
		
		$insert = $this->db->insert('books',$book);

		if ($insert) {
			$this->response($book,200);
		} else {
			$data = array('status'=>'gagal insert');
			$this->response($data,502);
		}
	}
}

?>