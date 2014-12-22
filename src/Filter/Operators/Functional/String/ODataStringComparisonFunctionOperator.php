<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:38 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataStringComparisonFunctionOperator extends ODataStringOperator {

    public function __construct($operator = NULL, $property = NULL, $value = NULL) {
        $this->operator = $operator;
        $this->property = $property;
        $this->value($value);
    }

    public function value($value = NULL) {
        if (isset($value)) {
            $this->arguments = array(str_replace("'", "''", (string)$value));
            return $this;
        }
        $args = $this->arguments;
        return $args[0];
    }

    public function __toString() {
        $function = $this->operator;
        $property = $this->property;
        $value = $this->value();
        return "$function($property, '$value')";
    }

}