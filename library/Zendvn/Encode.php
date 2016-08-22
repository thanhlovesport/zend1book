<?php
class Zendvn_Encode{
    
    public function password($value){
        $newpass = md5($value);
        return $newpass;
    }
}