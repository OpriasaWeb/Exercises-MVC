<?php

/**
 * Description of account
 *
 * @author jdopriasa
 */
class account {
    //put your code here
    public $fullname;
    public $address;
    public $status;
    
    public function __construct($fullname, $address, $description){
        $this->fullname = $fullname;
        $this->address = $address;
        $this->status = $status;
    }
    
}
