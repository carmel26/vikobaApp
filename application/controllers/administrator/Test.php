<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Test Controller
*| --------------------------------------------------------------------------
*| Test site
*|
*/
class Test extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_test');
	}

	/**
	* show all Tests
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('test_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tests'] = $this->model_test->get($filter, $field, $this->limit_page, $offset);
		$this->data['test_counts'] = $this->model_test->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/test/index/',
			'total_rows'   => $this->model_test->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Test List');
		$this->render('backend/standart/administrator/test/test_list', $this->data);
	}
	
	/**
	* Add new tests
	*
	*/
	public function add()
	{
		$this->is_allowed('test_add');

		$this->template->title('Test New');
		$this->render('backend/standart/administrator/test/test_add', $this->data);
	}

	/**
	* Add New Tests
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('test_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('designation_commune', 'Designation', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'designation_commune' => $this->input->post('designation_commune'),
				'date_test' => date('Y-m-d H:i:s'),
			];

			
			$save_test = $this->model_test->store($save_data);

			if ($save_test) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_test;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/test/edit/' . $save_test, 'Edit Test'),
						anchor('administrator/test', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/test/edit/' . $save_test, 'Edit Test')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/test');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/test');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Tests
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('test_update');

		$this->data['test'] = $this->model_test->find($id);

		$this->template->title('Test Update');
		$this->render('backend/standart/administrator/test/test_update', $this->data);
	}

	/**
	* Update Tests
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('test_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('designation_commune', 'Designation', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'designation_commune' => $this->input->post('designation_commune'),
				'date_test' => date('Y-m-d H:i:s'),
			];

			
			$save_test = $this->model_test->change($id, $save_data);

			if ($save_test) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/test', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/test');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/test');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Tests
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('test_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'test'), 'success');
        } else {
            set_message(cclang('error_delete', 'test'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tests
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('test_view');

		$this->data['test'] = $this->model_test->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Test Detail');
		$this->render('backend/standart/administrator/test/test_view', $this->data);
	}
	
	/**
	* delete Tests
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$test = $this->model_test->find($id);

		
		
		return $this->model_test->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('test_export');

		$this->model_test->export('test', 'test');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('test_export');

		$this->model_test->pdf('test', 'test');
	}
}


/* End of file test.php */
/* Location: ./application/controllers/administrator/Test.php */