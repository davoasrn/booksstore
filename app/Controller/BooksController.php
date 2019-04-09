<?php

class BooksController extends AppController{
    public $name = 'Books';
    var $uses = array('Book','Basket','User');
    public $helpers = array('Html', 'Form','Js' => array('Jquery'));
    public $components = array('Session','Authent','Image');
    
    //////////////////////Home Page///////////////////////////////////////////
    public function index(){
        $this->layout = 'booksales';
        if($this->request->is('get')){
            $this->set('books',$this->Book->find('all'));
        }
        if($this->request->data){
                $login = $this->Authent->login($this->request->data['Books']);
                if($login){
                    $this->set('books',$this->Book->find('all'));
                    $this->set('basket','');
                }
            }
            if($this->Session->check('UserId')){
                $this->set('logined',true);
            }else{
                $this->set('logined',false);
            }
            
            ////get favorite author/////////
            $author = $this->Basket->getAuthor();
            $this->set('author',$author['0']);
            
            ////get favorite book/////////
            $favbook = $this->Basket->getBook();
            $this->set('favbook',$favbook['0']);
    }
    
    ////////////////////// Logout //////////////////////////////
    public function logout(){
        $this->Authent->logout();
        $this->redirect("/");
    }
    
    ////////////////////// Adding Book to basket by Ajax ////////////////////////
    public function addToBasket($bookId=null){
        $this->layout = '';
        if($this->request->is('ajax') && isset($bookId)){
            $userId = $this->Session->read('UserId');
            $bookInfo = $this->Book->findByid($bookId);
            $basket = array();
            $basket['userId'] = $userId;
            $basket['author'] = $bookInfo['Book']['author'];
            $basket['title'] = $bookInfo['Book']['title'];
            $basket['price'] = $bookInfo['Book']['price'];
            $basket['print'] = $bookInfo['Book']['print'];
            $basket['year'] = $bookInfo['Book']['year'];
            $saveBasket = $this->Basket->save($basket);
            if($saveBasket){
                $userBasket = $this->Basket->find('all',array('conditions'=>array('userId'=>$userId,'paid'=>'0')));
                $this->set('userBasket',$userBasket);
            }
        }
    }
    
    ////////////////////// Adding Book to basket by Ajax ////////////////////////
    public function delForever($id){
        $this->layout = '';
        if($this->request->is('ajax')){
            $this->Basket->delete($id);
            $userId = $this->Session->read('UserId');
            $userBasket = $this->Basket->find('all',array('conditions'=>array('userId'=>$userId,'paid'=>'0')));
            $this->set('userBasket',$userBasket);
        }
    }
    
    ////////////////////Paying for books /////////////////////////////
    
    public function pay(){
        $userId = $this->Session->read('UserId');
        $useradds = $this->Basket->find('all',array('conditions'=>array('userId'=>$userId,'paid'=>'0')));
        if(isset($useradds) && is_array($useradds) && count($useradds) > 0){
            foreach($useradds as $bookinfo){
                $this->Basket->id = $bookinfo['Basket']['id'];
                $this->Basket->saveField('paid','1');
            }
        }
        $this->Session->setFlash('You Have Successfully Paid For Books', 'successMessage', array('class' => 'alert-msg success-msg'));
        $this->redirect('/');
    }
    
    
}
?>
