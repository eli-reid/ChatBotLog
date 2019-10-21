<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chatban 
 *
 * @author EliR
 */
class Chatban {
    public $id;
    public $ChatRoom;
    public $Msgs;
    public $Reason;
    public $TimeStamp;
    public $User;
    public function printline() {?>
    <div style="color: #a0a0a0"><span>[<?php echo $this->ChatRoom?> : <?php echo $this->TimeStamp?>] </span><span style="color: cornflowerblue "><?php echo $this->User?>: </span><span style="color: coral"><?php echo $this->Msgs?></span></div>
    <?php        
    }
} 
 