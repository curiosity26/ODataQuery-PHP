<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 4:23 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataEndsWithOperator extends ODataStringComparisonFunctionOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct('endswith', $property, $value);
    }
}