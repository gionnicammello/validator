<?php


namespace GDF\Validator;


use GDF\Validator\validators\IRule;
use GDF\Validator\validators\Rule;

class Validator extends Rule implements IRule
{

    protected $rules=[];



    public function __construct()
    {
    }




    public function addRule(Irule $rule)
    {
        $this->rules[]=$rule;
    }




    public function validate()
    {
        foreach($this->rules as $rule){
            if(!$rule->validate()){
                $this->addGroupError($rule->getError());
            }
        }
        if(empty($this->error)){
            return true;
        }
        return false;
    }


    protected function addGroupError($text)
    {
        if(!$this->customError){
            $this->error[]=$text;
        }else{
            $this->error[]=$this->customError;
        }
    }

}