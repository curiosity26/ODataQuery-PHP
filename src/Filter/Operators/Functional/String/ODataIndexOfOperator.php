<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:08 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataIndexOfOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct('indexof', $property);
        $this->value($value);
    }

    public function value($value = NULL) {
        if (isset($value)) {
            $value = preg_replace('/\'{1}/', "''", $value);
            $this->arguments = array($value);
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