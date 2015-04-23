<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/29/14
 * Time: 11:00 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataReplaceOperator extends ODataComparableStringFunctionOperator {
    protected $find;
    protected $replace;
    public function __construct($property = NULL, $find = NULL, $replace = NULL) {;
        parent::__construct('replace', $property);
        $this->find = $find;
        $this->replace = $replace;
    }

    public function __toString() {
        $function = $this->operator;
        $property = $this->property;
        $find = $this->find;
        $replace = $this->replace;
        return "$function($property, $find, $replace)";
    }
}