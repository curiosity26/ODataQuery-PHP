<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:48 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataConcatOperator extends ODataStringComparisonFunctionOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct('concat', $property, $value);
    }
}