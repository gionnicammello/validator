<?php


namespace gionnicammello\Validator\rules;

/**
 * Class Rule
 * @package gionnicammello\Validator
 * Abstract class to be extended to become a component/rule of the validator package
 */
abstract class Rule implements IRule
{
    protected $errors=[]; //array of errors
    protected $customError=null;  //custom error message
    protected $value=null; //value to check
    protected $name=null; //name of the variable/filed/input
    protected $defaultError='is invalid.'; //default error text


    /**
     * Rule constructor.
     * Constructor has to be overridden if rule need more arguments.
     * @param $name
     * @param $value
     * @param null $customError
     */
    public function __construct($name, $value, $customError=null)
    {
        $this->value=$value;
        $this->name=$name;
        $this->defaultError=$this->name.' '.$this->defaultError;
        $this->setCustomError($customError);
    }


    /**
     * Set the text for a custom error after object costructor
     * @param $text
     */
    public function setCustomError($text)
    {
        $this->customError=$text;
    }


    /**
     * Get the last error
     * @return mixed|string
     */
    public function getError()
    {
        return end($this->errors);
    }


    /**
     * Get all the set of errors in an array
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }


    /**
     * Add an error to the errors[] array
     */
    protected function addError()
    {
        if($this->customError===null){
            $this->errors[$this->name]=$this->defaultError;
        }else{
            $this->errors[$this->name]=$this->customError;
        }
    }



}