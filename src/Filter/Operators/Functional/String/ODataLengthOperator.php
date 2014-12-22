<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:56 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataLengthOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('length', $property);
    }

    public function __toString() {
        $function = $this->operator;
        $property = $this->property;
        return "$function($property)";
    }

}