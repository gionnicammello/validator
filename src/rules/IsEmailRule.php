<?php


namespace GDF\Validator\rules;


class IsEmailRule extends Rule
{
    protected $defaultError=' is not a valid email address';


    public function validate(){
        if(filter_var($this->value,FILTER_VALIDATE_EMAIL)||$this->value==''){
            return true;
        }
        $this->addError();
        return false;
    }
}