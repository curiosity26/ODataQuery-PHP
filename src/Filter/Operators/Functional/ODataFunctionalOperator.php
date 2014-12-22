<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 6:16 PM
 */

namespace ODataQuery\Filter\Operators\Functional;

use ODataQuery\Filter\ODataQueryFilter;

class ODataFunctionalOperator extends ODataQueryFilter implements ODataNegatableOperatorInterface {
    protected $arguments = array();

    public function __construct($operator = NULL, $property = NULL, array $arguments = array()) {
        $this->operator = $operator;
        $this->property = $property;
        $this->arguments = $arguments;
    }

    public function not() {
        return new ODataNegateOperator($this);
    }

    public function __toString() {
        $function = $this->operator;
        $property = $this->property;
        $args = implode(', ', $this->arguments);
        if (strlen($args) > 0) {
            $args = isset($property) ? ", $args" : $args;
        }
        return "$function($property$args)";
    }
}