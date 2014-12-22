<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:47 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;

class ODataAndOperator extends ODataLogicalOperator {

    public function __construct($property = NULL, $value = NULL) {
        parent::__construct($property, $value);
        $this->operator = 'and';
    }

    public function _and($value) {
        return new ODataAndOperator($this, $value);
    }

    public function _or($value) {
        return new ODataOrOperator($this, $value);
    }

    public function __toString() {
        $property = $this->property;
        $value = $this->value;
        $op = $this->operator;
        if ($property instanceof ODataConditionalInterface &&
            !($property instanceof ODataFunctionalOperator)) {
            $property = "($property)";
        }
        if ($value instanceof ODataConditionalInterface &&
            !($property instanceof ODataFunctionalOperator)) {
            $value = "($value)";
        }

        return "$property $op $value";
    }
}