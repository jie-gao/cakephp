<?php
class ImagesController extends AppController {
 
  public $helpers    = array ( 'Html', 'Form', 'Session' );
  public $components = array ( 'Session' );
 
  var $uses = array('Image');
  
  function upload(){
    $images = $this->Image->find('all');
    $this->set(compact('images'));
  }

  function index(){
    $this->layout = 'image';  
  } 
  /**
   * 画像を登録する
   */
  function add(){
    
    $limit = 1024 * 1024;
    debug($this->data);
 
    // 画像の容量チェック
    if ($this->data['Image']['image']['size'] > $limit){
      $this->Session->setFlash('1MB以内の画像が登録可能です。');
      $this->redirect('index');
    }
    // アップロードされた画像か
    if (!is_uploaded_file($this->data['Image']['image']['tmp_name'])){
      $this->Session->setFlash('アップロードされた画像ではありません。');
      $this->redirect('index');
    }
    // 保存
    $image = array(
      'Image' => array(
        'filename' => md5(microtime()) . '.' . $extension = end(explode('.', $this->data['Image']['image']['name'])),
        'contents'      => file_get_contents($this->data['Image']['image']['tmp_name']),
        'moto_filename' => $this->data['Image']['image']['name'],
        'filetype'      => $this->data['Image']['image']['type'],
        'filesize'      => $this->data['Image']['image']['size'],
      )
    );
    $this->Image->save($image);
    $this->Session->setFlash('画像をアップロードしました。');
    $this->redirect('index');
  }
   function viewfang() {
    // $this->layout = false; 
    $this->layout = 'image';  
    $id = 15;                               
     if(!$id){
	throw new NotFoundException(_('Invalid post'));
      }

      $image = $this->Image->findById($id);
      $images_all = $this->Image->find('all');
      //$images = array_pop($images_all);  
      array_pop($images_all);  
      if (!$image){
        throw new NotFoundException(_('Invalid image'));
      }
      if (!$images_all){
        throw new NotFoundException(_('Invalid image'));
      }
      $this->set('image', $image);
      $this->set('images',$images_all);
      header('Content-type: ' . $image['Image']['filetype'] );
      //$this->pageTitle = 'Fang Information ';
  }

  function contents($filename) {
    $this->layout = false;
    $image = $this->Image->findByFilename($filename);
    if (empty($image)) {
      $this->cakeError('error404');
    }
    header('Content-type: ' . $image['Image']['filetype'] );
    echo $image['Image']['contents'];
  }
}
