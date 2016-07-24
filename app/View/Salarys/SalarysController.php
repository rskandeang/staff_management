<?php
App::uses('AppController', 'Controller');
class StaffsController extends AppController {
    public function index() {
       $this->set('salarys', $this->Salary->findById($id));
    }
 }

?>

