<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		must_admin_and_staff();

		$this->load->model('Category_model');
	}

	public function index()
	{
		$data["user_session"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
		$data["page_title"] = "Kelola Kategori";

		$this->load->view("backend/categories/index_view", $data);
	}

	public function ajaxList()
	{
		$list = $this->Category_model->getDatatables();
		$data = array();
		$no = $_POST['start'];
		$i = 1;
		foreach ($list as $category) {
			$no++;
			$row = array();
			$row[] = $i++;
			// $row[] = $no++;
			if ($category->image) {
				$row[] = '<a href="' . base_url('assets/uploads/categories/' . $category->image) . '" target="_blank"><img src="' . base_url('assets/uploads/categories/' . $category->image) . '" style="width: 100%; height: 180px; object-fit:cover; object-position:center" /></a>';
			} else {
				$row[] = '(No photo)';
			}
			$row[] = $category->name;
			$row[] = $category->slug;

			// Action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="editCategory(' . "'" . $category->category_id . 			"'" . ')">Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteCategory(' . "'" . $category->category_id . "'" . ')">Delete</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Category_model->countAll(),
			"recordsFiltered" => $this->Category_model->countFiltered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajaxAdd()
	{
		$this->_validate();

		$name = htmlspecialchars($this->input->post("name", true));
		//Buat slug
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $name); //filter karakter unik dan replace dengan kosong ('')
		$trim = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
		$pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
		$slug = $pre_slug; // tambahkan ektensi .html pada slug

		$data = array(
			"name" => $name,
			"slug" => $slug,
		);

		if (!empty($_FILES['image']['name'])) {
			$upload = $this->_do_upload();
			$data['image'] = $upload;
		}

		$this->Category_model->save($data);
		echo json_encode(array("status" => TRUE));
	}


	public function ajaxEdit($id)
	{
		$data = $this->Category_model->getById($id);
		echo json_encode($data);
	}

	public function ajaxUpdate()
	{
		$this->_validate();

		$name = htmlspecialchars($this->input->post("name", true));
		//Buat slug
		$string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $name); //filter karakter unik dan replace dengan kosong ('')
		$trim = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
		$pre_slug = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
		$slug = $pre_slug; // tambahkan ektensi .html pada slug

		$data = array(
			"name" => $name,
			"slug" => $slug,
		);

		if (!empty($_FILES['image']['name'])) {
			$upload = $this->_do_upload();

			//delete file
			$category = $this->Category_model->getById($this->input->post('category_id'));
			if (file_exists('assets/uploads/categories/' . $category->image) && $category->image)
				unlink('assets/uploads/categories/' . $category->image);

			$data['image'] = $upload;
		}
		$this->Category_model->update(array('category_id' => $this->input->post('category_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajaxDelete($id)
	{
		$category = $this->Category_model->getById($id);
		if (file_exists('assets/uploads/categories/' . $category->image) && $category->image) {
			unlink('assets/uploads/categories/' . $category->image);
		}
		$this->Category_model->deleteById($id);
		echo json_encode("status", TRUE);
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'assets/uploads/categories/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1024; //set max size allowed in Kilobyte
		// $config['max_width']            = 1000; // set max width image allowed
		// $config['max_height']           = 1000; // set max height allowed
		$config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) //upload and validate
		{
			$data['inputerror'] = 'image';
			$data['error_string'] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post("name") == "") {
			$data['inputerror'] = 'name';
			$data['error_string'] = 'Nama Kategori harus di isi';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}
}
