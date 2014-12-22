<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:53 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataStartsWithOperator extends ODataStringComparisonFunctionOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct('startswith', $property, $value);
    }
}