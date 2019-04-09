<?php

class AdminsController extends AppController{
    public $name = 'Admins';
    var $uses = array('Book','Basket','User');
    public $helpers = array('Html', 'Form');
    public $components = array('Session','Authent','Image');
    
    
    ////////////////////////////////////* Begin Login Form *//////////////////////////////////////
    public function index(){
        $this->layout = 'adminpages';
        if($this->Session->read('isAdmin')){
            $this->redirect('home');
        }else{
            if($this->request->data){
                $login = $this->Authent->login($this->request->data['Admin']);
                if($login){
                    $this->redirect(array('controller'=>'admins','action'=>'home'));
                }
            }
        }
        
    }
    
    public function logout(){
        $this->Authent->logout();
        $this->redirect("/admins");
    }
    ////////////////////////////////////* End Login Form *//////////////////////////////////////
    
    ////////////////////////////////////* Begin Books Form *//////////////////////////////////////
    public function home(){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $this->set('books',$this->Book->find('all'));
    }
    
    public function addBook(){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $error = false;
        if($this->request->data){
            $post = $this->request->data['Book'];
            if(!$post['title']){
                $message = 'Please Add Name For Book';
                $error = true;
            }
            if(!$post['author']){
                $message = 'Please Add Author For Book';
                $error = true;
            }
            if(!$error){
                if(!empty($post['Image']['name'])){
                    $image_path = $this->Image->upload_image_and_thumbnail($post,"number1",573,80,"books",true);
                    $post['picture'] = $image_path;
                }
                $film = $this->Book->save($post);
                if($film['Book']['id']){
                    $this->Session->setFlash('Book Saved Successfully', 'successMessage', array('class' => 'alert-msg success-msg'));
                    $this->redirect(array('action' => 'home'));
                }
            }else{
                $this->Session->setFlash($message, 'errorMessage', array('class' => 'alert-msg error-msg'));
            }
        }
    }
    
    public function editBook($id){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $this->set('id',$id);
        if($this->request->is('get')){
            $book = $this->Book->findByid($id);
            $img = $book['Book']['picture'];
            $this->set('img',$img);
            $this->set('id',$id);
            $this->request->data['Book'] = $book['Book'];
        }else{
            if($this->request->data){
                $error = false;
                $post = $this->request->data['Book'];
                if(!$post['title']){
                    $message = 'Please Add Title For Book';
                    $error = true;
                }
                if(!$error){
                    if(!empty($post['Image']['name'])){
                        $image_path = $this->Image->upload_image_and_thumbnail($post,"number1",573,80,"books",true);
                        $post['picture'] = $image_path;
                    }
                    
                    $this->Book->id = $id;
                    $book = $this->Book->save($post);
                    
                    if($book['Book']){
                        $this->Session->setFlash('Book Saved Successfully', 'successMessage', array('class' => 'alert-msg success-msg'));
                        $this->redirect(array('action' => 'home'));
                    }
                }else{
                    $this->Session->setFlash($message, 'errorMessage', array('class' => 'alert-msg error-msg'));
                }
            }
        }
    }
    
    public function deleteBook($id){
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        if($this->request->is('get')){
            if(isset($id) && is_numeric($id)){
                //deleting images
                $book = $this->Book->findByid($id);
                if(isset($book['Book']['picture']) && !empty($book['Book']['picture'])){
                    $imagename = $book['Book']['picture'];
                    $filename = WWW_ROOT."img".DS."books".DS;
                    if(file_exists($filename."small".DS.$imagename)){
                        @unlink($filename."small".DS.$imagename);
                    }
                    if(file_exists($filename."big".DS.$imagename)){
                        @unlink($filename."big".DS.$imagename);
                    }
                }
                $delBook = $this->Book->delete($id);
                if($delBook){
                    $this->Session->setFlash('Book Deleted Successfully', 'successMessage', array('class' => 'alert-msg success-msg'));
                }else{
                    $this->Session->setFlash('Wrong id or film was also deleted', 'errorMessage', array('class' => 'alert-msg error-msg'));
                }
                $this->redirect(array('action' => 'home'));
            }else{
                $this->Session->setFlash('Wrong id', 'errorMessage', array('class' => 'alert-msg error-msg'));
                $this->redirect('home');
            }
        }
    }
    ////////////////////////////////////* End Books Form *//////////////////////////////////////
    
    ////////////////////////////////////* Begin Users Form */////////////////////////////////////
    public function user(){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $this->set('users',$this->User->find('all'));
    }
    
    public function addUser(){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $error = false;
        if($this->request->data){
            $post = $this->request->data['User'];
            if(!$post['username']){
                $message = 'Please Add Username For User';
                $error = true;
            }
            if(!$post['firstName']){
                $message = 'Please Add First Name For User';
                $error = true;
            }
            
            if(!$post['lastName']){
                $message = 'Please Add Last Name For User';
                $error = true;
            }
            
            if(isset($post['password']) && $post['password'] !== $post['confirmPassword']){
                $message = 'Password and Confirm Password didn\'t Much';
                $error = true;
            }
            $post['password'] = md5($post['password'].'books password');
            if(!$error){
                $user = $this->User->save($post);
                if($user['User']['id']){
                    $this->Session->setFlash('User Saved Successfully', 'successMessage', array('class' => 'alert-msg success-msg'));
                    $this->redirect(array('action' => 'home'));
                }
            }else{
                $this->Session->setFlash($message, 'errorMessage', array('class' => 'alert-msg error-msg'));
            }
        }
    }
    
    public function editUser($id){
        $this->layout = 'adminpages';
        if(!$this->Session->read('isAdmin')){
            $this->redirect('index');
        }
        $this->set('id',$id);
        if($this->request->is('get')){
            $user = $this->User->findByid($id);
            $this->set('id',$id);
            $user['User']['password'] = "";
            $this->request->data['User'] = $user['User'];
        }else{
            if($this->request->data){
                $error = false;
                $post = $this->request->data['User'];
                if(!$post['username']){
                $message = 'Please Add Username For User';
                $error = true;
            }
            if(!$post['firstName']){
                $message = 'Please Add First Name For User';
                $error = true;
            }
            
            if(!$post['lastName']){
                $message = 'Please Add Last Name For User';
                $error = true;
            }
            
            if(isset($post['password']) && $post['password'] !== $post['confirmPassword']){
                $message = 'Password and Confirm Password didn\'t Much';
                $error = true;
            }
            $post['password'] = md5($post['password'].'books password');
                if(!$error){
                    $this->user()->id = $id;
                    $user = $this->User->save($post);
                    
                    if($user['User']){
                        $this->Session->setFlash('User Saved Successfully', 'successMessage', array('class' => 'alert-msg success-msg'));
                        $this->redirect(array('action' => 'user'));
                    }
                }else{
                    $this->Session->setFlash($message, 'errorMessage', array('class' => 'alert-msg error-msg'));
                }
            }
        }
    }
    
    ////////////////////////////////////* End Users Form *//////////////////////////////////////
}
?>
