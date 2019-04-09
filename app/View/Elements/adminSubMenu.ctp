<div class="all">
<div class="adm_menu">
    <ul class="menu2">
        <?php  
switch($this->action)
{
    case 'home':
        echo "<li><a>".$this->Html->Link('Add Book', array('controller' => 'admins','action' => 'addBook'))."</li></a>";
        break;
    case 'editBook':
        echo "<li><a>".$this->Html->Link('Books List', array('controller' => 'admins','action' => 'home'))."</li></a>";
        break;
    case 'addBook':
        echo "<li><a>".$this->Html->Link('Books List', array('controller' => 'admins','action' => 'home'))."</li></a>";
        break;
    case 'user':
        echo "<li><a>".$this->Html->Link('Add User', array('controller' => 'admins','action' => 'addUser'))."</li></a>";
        break;
    case 'editUser':
        echo "<li><a>".$this->Html->Link('User List', array('controller' => 'admins','action' => 'user'))."</li></a>";
        break;
    case 'addUser':
        echo "<li><a>".$this->Html->Link('User List', array('controller' => 'admins','action' => 'user'))."</li></a>";
        break;
}
?>
    </ul>    
</div>
</div>