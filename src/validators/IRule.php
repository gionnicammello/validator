<?php


namespace GDF\Validator\validators;


interface IRule
{
    public function validate();
    public function getError();
    public function getErrors();
}