<?php

namespace App\Actions;

class CheckPostUpdate
{
    public function checkPostForEmpty($postDTOFactory){
        foreach($postDTOFactory as $key => $value){
            if ($value == -1 || $value == ""){
                $unused_fields[] = $key;
            }
        }
        return $unused_fields;
    }
}
