<?php
App::uses('AppController', 'Controller');
class StaffsController extends AppController {


    public function index() {
        $this->loadModel('Salary');
        $this->loadModel('Leave');
        $keyword = $this->request->query('Search');
        $this->paginate=array(
            'limit' => 100,
            'conditions'=>array('Staff.status' => 'T',
            'OR' => array(
                    array('Staff.id LIKE' => '%' . $keyword . '%'),
                    array('Staff.firstname LIKE' => '%' . $keyword . '%'),
                    array('Staff.lastname LIKE' => '%' . $keyword . '%'),
                    array('Staff.dob LIKE' => '%' . $keyword . '%'),
                    array('Staff.position LIKE' => '%' . $keyword . '%'),
                    array('Staff.phone LIKE' => '%' . $keyword . '%'),
                    // array('Staff.salary LIKE' => '%' . $keyword . '%'),
                    )));
        $this->set('staffs', $this->paginate());
                $findStaff =$this->Staff->find('all',array(
                            'order'=>'Staff.id'));
                
                $arr = array();
                foreach( $findStaff as $staff){
                    $user_id = $staff['Staff']['id'];

                     $findLeave = $this->Leave->find('first',array(
                        'conditions' => array(
                            'leave.staff_id' => $user_id ),
                        'order' => 'leave.leave_id'
                        ));
                    foreach ($findLeave as $leave) {
                        $takeLeave = $leave['day_take_leave'];
                        $time=$leave['time'];
                    }
                    
                    $salaries = $this->Salary->find('first', array(
                        'conditions' => array(
                            'Salary.staff_id' => $user_id),
                        'order' => 'Salary.sa_id DESC'
                        ));
                    foreach($salaries as $salary){
                        $staff_salary = $salary['default_salary'];
                        $data = array(
                            'id' => $staff['Staff']['id'],
                            'firstname' => $staff['Staff']['firstname'],
                            'lastname' => $staff['Staff']['lastname'],
                            'gender' => $staff['Staff']['gender'],
                            'phone' => $staff['Staff']['phone'],
                            'position' => $staff['Staff']['position'],
                            'created' => $staff['Staff']['created'],
                            'image' => $staff['Staff']['image'],
                            'id' => $staff['Staff']['id'],
                            'default_salary' => $staff_salary,
                            'day_take_leave' => $takeLeave,
                            'time' => $time
                        );
                    }

                    // $findLeave = $this->Leave->find('first',array(
                    //     'conditions' => array(
                    //         'leave.staff_id' => $user_id ),
                    //     'order' => 'leave.leave_id DESC'
                    //     ));
                    // pr( $findLeave);
                    // foreach ($findLeave as $leave) {
                    //     $takeLeave = $leave['day_take_leave'];
                      
                    // }
                    

                  
                 array_push($arr, $data);
                }

        // $this->set('staffs', $this->paginate($arr));
       $this->set('staffs', $arr);

            

       
    }

	public function add() {
        $this->loadModel('Salary');
        if ($this->request->is('post')) {
            $this->Staff->create();
        if(!empty($this->data)){
            //Check if image has been uploaded
            if (!empty($this->request->data['Staff']['image']['name'])) {

                $file = $this->request->data['Staff']['image'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif','png');
                $uploadFolder ='uoload';
                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT .'upload/' .$uploadFolder. $file['name']);
                    //prepare the filename for database entry
                    $this->request->data['Staff']['image'] = $file['name'];
                }
                
                
            }
                //sava data to staff table
             if ($this->Staff->save($this->request->data)) {
                    // fetch id of staff
                         $findId=$this->Staff->find('first',array(
                            'order'=>'Staff.id DESC')); 
                    // get specific id of staff
                        $id = $findId['Staff']['id'];                         
                        $salary= $this->request->data['Staff']['default_salary'];
                    // create form  insert
                        $this->Salary->create();
                    // insert salary to salary table
                            $this->Salary->set(array(
                                'default_salary'=>$salary,
                                'staff_id'=>$id));
                            $this->Salary->save($this->request->data);
                        
                $this->Session->setFlash(__('The staff has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The staff could not be saved. Please, try again.'));
            }
             // $this->Product->save($this->data) ;
             $this->redirect(array('controller'=>'staffs','action' => 'index'));
            }
        $images = $this->Images->Images->find('list', ['limit' => 200]);
        $projects = $this->Images->Projects->find('list', ['limit' => 200]);
        $this->set(compact('image', 'images', 'projects'));
        $this->set('_serialize', ['image']);
        }
       
       
    }
    public function edit($id = null) {

     //    if (!$id) {
    	// 	$this->Session->setFlash('Please provide a user id');
    	// 	$this->redirect(array('action'=>'index'));
    	// }

    	// $staff = $this->Staff->findById($id);
    	// if (!$staff) {
    	// 	$this->Session->setFlash('Invalid User ID Provided');
    	// 	$this->redirect(array('action'=>'index'));
    	// }

    	// if ($this->request->is('post') || $this->request->is('put')) {
    	// 	$this->Staff->id = $id;
    	// 	if ($this->Staff->save($this->request->data)) {
    	// 		$this->Session->setFlash(__('The user has been updated'));
    	// 		$this->redirect(array('action' => 'edit', $id));
    	// 	}else{
    	// 		$this->Session->setFlash(__('Unable to update your user.'));
    	// 	}
    	// }

    	// if (!$this->request->data) {
    	// 	$this->request->data = $staff;
    	// }
            $data = $this->Staff->find('first',array(
                'conditions'=>array('id'=>$id)));
            $f = $data['Staff']['image'];
            @unlink(WWW_ROOT.'img/'.$f);
            if($this->request->is(array('post','put'))){
                $this->Staff->id = $id;
                if(!empty($this->data))
                    {
                        //Check if image has been uploaded
                        if(!empty($this->request->data['Staff']['image']['name']))
                        {
                            $file = $this->request->data['Staff']['image'];
                            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
                            $arr_ext = array('jpg', 'jpeg', 'gif','png');
                                
                                if(in_array($ext, $arr_ext))
                                {
                                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                                    //where we are putting it
                                    move_uploaded_file($file['tmp_name'], WWW_ROOT.'img/'.$file['name']);
                                    //prepare the filename for database entry
                                    $this->request->data['Staff']['image'] = $file['name'];
                                }
                        }
                        if($this->Staff->save($this->request->data)){
                            $this->Session->setFlash('edited');
                            $this->redirect('index');
                        }
                    }
        }
        $this->request->data = $data;
    }

    public function view($id){

        $this->loadModel('Salary');
        $this->loadModel('Leave');

            
                $findStaff = $this->Staff->findById($id);
                $user_id = $findStaff['Staff']['id'];
                
                // pr($findStaff);exit();

                // $arr = array();

                // foreach( $findStaff as $staff){
                //     $user_id =$staff['id'];
                     $findLeave = $this->Leave->find('all',array(
                        'conditions' => array(
                            'leave.staff_id' => $user_id ),
                        'order' => 'leave.leave_id'
                        ));

                //     foreach ($findLeave as $leave) {
                //         $takeLeave = $leave['day_take_leave'];
                //         $time=$leave['time'];
                //     }
                    
                    $salaries = $this->Salary->find('all', array(
                        'conditions' => array(
                            'Salary.staff_id' => $user_id),
                        'order' => 'Salary.sa_id DESC'
                        ));
                    
                //     foreach($salaries as $salary){
                //         $staff_salary = $salary['default_salary'];
                //         $debt_salary = $salary['debt_salary'];
                //         $total_salary = $salary['total_salary'];
                //         $data = array(
                //             'default_salary' => $staff_salary,
                //             'day_take_leave' => $takeLeave,
                //             'time' => $time,
                //             'debt_salary' => $debt_salary,
                //             'total_salary' => $total_salary
                //         );
                //     } 
                //  array_push($arr, $data);
                // }
                $this->set('staffs', $findStaff);
                $this->set('leave', $findLeave);
                $this->set('Salary', $salaries);

        
                // $this->set('staffs', $this->Staff->findById($id));

    }
    function delete($id){
        $this->Staff->id = $id;
        if($this->Staff->saveField('status','F')){
            $this->Session->setFlash('deleted');
                $this->redirect('index');
        }
    }
 }

?>

