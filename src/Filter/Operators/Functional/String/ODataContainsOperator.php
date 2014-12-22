<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:55 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataContainsOperator extends ODataStringComparisonFunctionOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct('contains', $property, $value);
    }
}