<?php


namespace GDF\Validator\rules;


interface IRule
{
    public function validate();
    public function getError();
    public function getErrors();
}