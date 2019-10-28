<?php


namespace GDF\Validator\rules;

/*
 * Interface IRule to be implemented in every Validators and Rules
 * @package GDF\Validator\rules
 */
interface IRule
{
    /**
     * Validate data
     * @return boolean
     */
    public function validate();

    /**
     * Get last error
     * @return string
     */
    public function getError();

    /**
     * Get the entire array of errors
     * @return array
     */
    public function getErrors();
}