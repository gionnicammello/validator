<?php


namespace GDF\Validator\rules;

/**
 * Class IsEmailRule
 * @package GDF\Validator
 * check if the value is a valid email address.
 * It cannot check if the email exist but only the format
 * This rule return true if the Variable is void. Use the IsRequiredRule in conjunction to make the value mandatory
 */
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