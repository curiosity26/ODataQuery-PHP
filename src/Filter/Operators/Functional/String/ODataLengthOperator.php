<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:56 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataLengthOperator extends ODataComparableStringFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('length', $property);
    }

    public function __toString() {
        $function = $this->operator();
        $property = $this->property();
        return "$function($property)";
    }

}