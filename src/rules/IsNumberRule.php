<?php


namespace GDF\Validator\rules;

/**
 * Class IsNumberRule
 * @package GDF\Validator
 * check it the given value is numeric and return false if not.
 * This rule return true if the Variable is void. Use the IsRequiredRule in conjunction to make the value mandatory
 */
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