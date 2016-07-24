<?php
class UsersController extends AppController {
	public $helpers = array(
			  'Js' => array('Jquery'),
			  'Paginator',
			  'Html',
			  'Form');
	public $components = array(
			  'Paginator',
			  'RequestHandler');
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add','index','edit'); 
    }
	function index(){
		$keyword = $this->request->query('Search');
		$this->paginate = array(
				'limit' => 10,
				'conditions' => array(
						'User.status' => '1',
						'OR' => array(
								array('User.id LIKE' => '%' . $keyword . '%'),
								array('User.firstname LIKE' => '%' . $keyword . '%'),
								array('User.lastname LIKE' => '%' . $keyword . '%'),
								array('User.dob LIKE' => '%' . $keyword . '%'),
								array('User.position LIKE' => '%' . $keyword . '%'),
								array('User.phone LIKE' => '%' . $keyword . '%'),
								array('User.email LIKE' => '%' . $keyword . '%'),
								array('User.salary LIKE' => '%' . $keyword . '%'),
								)));
		
		//$users = $this->User->find('all');
		$this->set('users',$this->paginate());
	}
	function login(){
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect( array('controller' => 'staffs', 'action' => 'index'));
				//$this->redirect('index');
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}       
	}
	function logout() {
		
		$this->Session->delete('User');
		 // return $this->redirect($this->Auth->logout());
    	$this->Session->setFlash('Congrats, you have successfully logged Out.');
    	return $this->redirect('/users/login');
	}
	function add(){
		if($this->request->is('post')){
			$this->User->create();	
				if(!empty($this->data))
				{
					//Check if image has been uploaded
					if(!empty($this->request->data['User']['image']['name']))
					{
						$file = $this->request->data['User']['image'];
						$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
						$arr_ext = array('jpg', 'jpeg', 'gif','png');
							if(in_array($ext, $arr_ext))
							{
								//do the actual uploading of the file. First arg is the tmp name, second arg is 
								//where we are putting it
								move_uploaded_file($file['tmp_name'], WWW_ROOT.'img/'.$file['name']);
								//prepare the filename for database entry
								$this->request->data['User']['image'] = $file['name'];
							}
					}
					$this->request->data['User']['password'] = AuthComponent::password($this->request->data['Student']['password']);
					if($this->User->save($this->request->data)){
						return $this->redirect('index');
					}else {
						$this->Session->setFlash(__('The user could not be created. Please, try again.'));
					}
					$this->User->save($this->data);
				}
		}
	}
	function edit($id){
		//$data = $this->User->findById($id);
		$data = $this->User->find('first',array(
			'conditions'=>array('id'=>$id)));
			$f = $data['User']['image'];
			@unlink(WWW_ROOT.'img/'.$f);
			if($this->request->is(array('post','put'))){
				$this->User->id = $id;
				if(!empty($this->data))
					{
						//Check if image has been uploaded
						if(!empty($this->request->data['User']['image']['name']))
						{
							$file = $this->request->data['User']['image'];
							$ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
							$arr_ext = array('jpg', 'jpeg', 'gif','png');
								
								if(in_array($ext, $arr_ext))
								{
									//do the actual uploading of the file. First arg is the tmp name, second arg is 
									//where we are putting it
									move_uploaded_file($file['tmp_name'], WWW_ROOT.'img/'.$file['name']);
									//prepare the filename for database entry
									$this->request->data['User']['image'] = $file['name'];
								}
						}
						if($this->User->save($this->request->data)){
							$this->Session->setFlash('edited');
							$this->redirect('index');
						}
					}
		}
		$this->request->data = $data;
	}
	function delete($id){
		$this->User->id = $id;
		if($this->User->saveField('status','F')){
			$this->Session->setFlash('deleted');
				$this->redirect('index');
		}
	}
	
}   