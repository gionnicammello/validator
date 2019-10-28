<?php


namespace GDF\Validator;


use GDF\Validator\rules\IRule;
use GDF\Validator\rules\Rule;

/**
 * Class Validator
 * This package implement composite design pattern to implement sigle validation or group validation with custom messages
 * Concrete class to collect multiple rules and set a custom error message for the entire set
 * @package GDF/Validator
 */
class Validator extends Rule implements IRule
{

    protected $rules=[]; //collection of rules to check with validate method


    /**
     * Validator constructor.
     * @param $name
     * @param null $customError
     *
     *set custom error to ger an error for the entire block of rules
     */
    public function __construct($name, $customError=null)
    {
        $this->name=$name;
        $this->setCustomError($customError);
    }


    /**
     * Add a rule to the rules set
     * @param IRule $rule
     */
    public function addRule(Irule $rule)
    {
        $this->rules[]=$rule;
    }


    /**
     * validate all the rules in the rules set and add their errors to the errors array.
     * If customError is not null it add an error for the entire set of rules
     * @return bool
     */
    public function validate()
    {
        foreach($this->rules as $rule){
            if(!$rule->validate()){
                $this->errors=array_merge($this->errors,$rule->getErrors());
            }
        }
        if(empty($this->errors)){
            return true;
        }
        if($this->customError!==null){
            $this->errors[$this->name]=$this->customError;
        }
        return false;
    }




}