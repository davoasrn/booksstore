<?php 

class AuthentComponent extends Component
{
    public $components = array('Session');
    
    public function login($data)
    {
        Controller::loadModel('User');
        $data['password'] = md5($data['password'].'books password');
        $match = $this->User->find('first',array('conditions'=>array('username'=>$data['username'],'password'=>$data['password'])));
        if($match){
            $this->Session->write('User',$match['User']);
            $this->Session->write('UserId',$match['User']['id']);
            if($match['User']['isAdmin']){
                $this->Session->write('isAdmin',true);
            }
            return true; 
        }else{
            $this->Session->write('Note Error','Wrong Username or Password');
        }
    }
    
    public function logout(){
        $this->Session->delete('User');
        $this->Session->delete('UserId');
        $this->Session->delete('isAdmin');
        $this->Session->destroy();
    }
}

?>