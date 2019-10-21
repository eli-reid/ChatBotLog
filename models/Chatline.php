<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Chatline
 *
 * @author EliR
 */
class Chatline {
    public $ID;
    public $ChatMsg;
    public $ChatRoom;
    public $MsgType;
    public $TimeStamp;
    public $User;
    public function printline() {?>
    <div style="color: #a0a0a0"><span>[<?php echo $this->ChatRoom?> : <?php echo $this->TimeStamp?>] </span><span style="color: cornflowerblue "><?php echo $this->User?>: </span><span style="color: coral"><?php echo $this->ChatMsg?></span></div>
    <?php
        
    }
}

