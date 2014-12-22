<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 6:16 PM
 */

namespace ODataQuery\Filter\Operators\Functional;

use ODataQuery\Filter\ODataQueryFilterInterface;

class ODataFunctionalOperator implements ODataFunctionalOperatorInterface, ODataNegatableOperatorInterface, ODataQueryFilterInterface {
    private $property;
    private $operator;
    private $arguments = array();

    public function __construct($operator = NULL, $property = NULL, array $arguments = array()) {
        $this->operator($operator);
        $this->property($property);
        $this->arguments($arguments);
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

    protected function arguments(array $args = array()) {
        if (isset($args)) {
            $this->arguments = $args;
            return $this;
        }
        return $this->arguments;
    }

    public function not() {
        return new ODataNegateOperator($this);
    }

    public function __toString() {
        $function = $this->operator();
        $property = $this->property();
        $args = implode(',', $this->arguments());
        if (strlen($args) > 0) {
            $args = ", $args";
        }
        return "$function($property$args)";
    }
}