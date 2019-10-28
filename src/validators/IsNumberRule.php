<?php


namespace GDF\Validator\validators;


class IsNumberRule extends Rule
{
    protected $defaultError=' must be a number';




    public function validate()
    {
        if(is_numeric($this->value)||$this->value==''){
            return true;
        }
        $this->addError();
        return false;
    }


}