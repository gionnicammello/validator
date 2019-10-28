<?php


namespace GDF\Validator;


use GDF\Validator\validators\IRule;
use GDF\Validator\validators\Rule;

class Validator extends Rule implements IRule
{

    protected $rules=[];



    public function __construct($name, $customError=null)
    {
        $this->name=$name;
        $this->setCustomError($customError);
    }




    public function addRule(Irule $rule)
    {
        $this->rules[]=$rule;
    }




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