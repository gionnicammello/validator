<?php


namespace GDF\Validator\rules;


abstract class Rule implements IRule
{
    protected $errors=[];
    protected $customError=null;
    protected $value=null;
    protected $name=null;
    protected $defaultError='is invalid.';




    public function __construct($name, $value, $customError=null)
    {
        $this->value=$value;
        $this->name=$name;
        $this->defaultError=$this->name.' '.$this->defaultError;
        $this->setCustomError($customError);
    }





    public function setCustomError($text)
    {
        $this->customError=$text;
    }




    public function getError()
    {
        return end($this->errors);
    }





    public function getErrors()
    {
        return $this->errors;
    }




    protected function addError()
    {
        if($this->customError===null){
            $this->errors[$this->name]=$this->defaultError;
        }else{
            $this->errors[$this->name]=$this->customError;
        }
    }



}