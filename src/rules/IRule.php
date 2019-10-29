<?php


namespace gionnicammello\Validator\rules;

/*
 * Interface IRule to be implemented in every Validators and Rules
 * @package gionnicammello\Validator\rules
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