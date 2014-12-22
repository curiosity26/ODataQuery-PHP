<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 3:57 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


use ODataQuery\Filter\ODataQueryFilter;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataMathematicalOperatorInterface;

class ODataLogicalOperator extends ODataQueryFilter implements ODataConditionalInterface {
    protected $value;

    public function __construct($property = NULL, $value = NULL) {
        $this->property = $property;
        $this->value = $value;
    }

    public function _and($value) {
        return new ODataAndOperator($this, $value);
    }

    public function _or($value) {
        return new ODataOrOperator($this, $value);
    }

    public function __toString() {
        $property = $this->property;
        $op = $this->operator;
        $value = $this->value;
        if ($value instanceof ODataMathematicalOperatorInterface) {
            $value = "($value)";
        }
        return "$property $op $value";
    }
}