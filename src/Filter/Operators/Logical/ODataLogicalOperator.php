<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 3:57 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


use ODataQuery\Filter\ODataQueryFilterInterface;

class ODataLogicalOperator implements ODataLogicalOperatorInterface, ODataConditionalInterface, ODataQueryFilterInterface {
    private $property;
    private $value;
    private $operator;

    public function __construct($property = NULL, $value = NULL) {
        $this->property($property);
        $this->value($value);
    }

    public function property($prop = NULL) {
        if (isset($prop)) {
            $this->property = $prop;
            return $this;
        }
        return $this->property;
    }

    protected function operator($op = NULL) {
        if (isset($op)) {
            $this->operator = $op;
            return $this;
        }
        return $this->operator;
    }

    public function value($value = NULL) {
        if (isset($value)) {
            $this->value = NULL;
            return $this;
        }
        return $this;
    }

    public function _and($value) {
        return new ODataAndOperator($this, $value);
    }

    public function _or($value) {
        return new ODataOrOperator($this, $value);
    }

    public function __toString() {
        $property = $this->property();
        $op = $this->operator();
        $value = $this->value();
        return "$property $op $value";
    }
}