<?php

App::import('Vendor','simple_html_dom');
//App::import('Vendor', 'Net/UserAgent/Mobile', array('file' => 'Net' . DS . 'UserAgent' . DS . 'Mobile.php'));

class NewsController extends AppController {

  public $helps = array('Html', 'Form', 'Session');
  public $component = array('Session');
  
  public function index(){

    $userAgent = isset($_SERVER['HTTP_USER_AGENT'])
               ? strtolower($_SERVER['HTTP_USER_AGENT'])
               : '';    
    echo $userAgent; 

 //   $this->set('posts', $this->Post->find('all'));
    $url = "http://news.ifeng.com";
    $html = file_get_html($url);
//    foreach($html->find('img') as $element)
//      echo $element->src . '<br>';

    foreach($html->find('a') as $element) {
      echo $element->title;
      echo $element->href . '<br>';
    }
  }
  
 /* public function view($id =null) {
    if(!$id){
      throw new NotFoundException(_('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post){
      throw new NotFoundException(_('Invalid post'));
    }
    $this->set('post', $post);
  }
  public function add() {
    if($this->request->is('post')) {
      $this->Post->create();
      if ($this->Post->save($this->request->data)) {
        $this->Session->setFlash(_('Your post has been saved.'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(_('Unable to add your post.'));
    }
  }
  public function edit($id = null) {
    if(!$id) {
      throw new NotFoundException(_('Invalid post'));
    }
    $post = $this->Post->findById($id);
    if(!$post) {
      throw new NotFoundException(_('Invalid post'));
    }

    if($this->request->is(array('post', 'put'))) {
      $this->Post->id = $id;
      if($this->Post->save($this->request->data)) {
        $this->Session->setFlash(_('Your post has been updated.'));
        return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(_('Unable to update your post.'));
    }
 
    if(!$this->request->data) {
      $this->request->data = $post;
    }
  }
  public function delete($id) {
    if($this->request->is('get')) {
      throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
      $this->Session->setFlash(
        __('The post with id : %s has been deleted.', h($id))
      );
      return $this->redirect(array('action' => 'index'));
    }
  }*/
}
