<?php


namespace GDF\Validator\validators;


abstract class Rule implements IRule
{
    public $error=[];
    protected $customError=null;
    protected $value=null;
    protected $defaultError='Invalid Form';


    public function __construct($name, $value, $customError=null)
    {
        $this->value=$value;
        $this->defaultError=$name.' must be a number';
        $this->setCustomError($customError);
    }


    public function setCustomError($text)
    {
        $this->customError=$text;
    }


    public function getError()
    {
        return end($this->error);
    }

    protected function addError()
    {
        if($this->customError===null){
            $this->error[]=$this->defaultError;
        }else{
            $this->error[]=$this->customError;
        }
    }



}