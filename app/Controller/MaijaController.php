<?php

class MaijaController extends AppController {
  public $helps = array('Html', 'Form', 'Session');
  public $component = array('Session');
  function index(){
    echo 'hello world';
  }
  function mobile_index() {
  }
  function mobile_view() {
  }
  function mobile_edit() {
  }
  function mobile_add(){
  }
  function mobile_delete(){
  } 

  function beforeRender() {
	if(!empty($this->params['prefix']) && $this->params['prefix']=='admin' && !empty($this->params['admin'])) {
		$this->layout='admin';
	} elseif(!empty($this->params['prefix']) && $this->params['prefix']=='mobile' && !empty($this->params['mobile'])) {
		$this->layout='mobile';
	}
  }
  function beforeFilter(){
	if(!empty($this->params['prefix']) && $this->params['prefix']=='mobile' && !empty($this->params['mobile'])) {
		if(!empty($this->data)){
			mb_convert_variables('UTF-8', 'SJIS-win', $this->data);
		}
	}
  }
  function afterFilter() {
	if(!empty($this->params['prefix']) && $this->params['prefix']=='mobile' && !empty($this->params['mobile'])) {
		$this->output = mb_convert_encoding($this->output, 'SJIS-win', 'UTF-8');
	}
  }
}
