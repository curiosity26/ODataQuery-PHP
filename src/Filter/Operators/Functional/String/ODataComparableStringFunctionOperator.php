<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:30 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


use ODataQuery\Filter\Operators\Logical\ODataEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator;

class ODataComparableStringFunctionOperator extends ODataStringOperator {
    public function equals($value, $isField = FALSE) {
        $value = $isField === TRUE ? $value : "'$value'";
        return new ODataEqualsOperator($this, $value);
    }

    public function notEquals($value, $isField = FALSE) {
        $value = $isField === TRUE ? $value : "'$value'";
        return new ODataNotEqualsOperator($this, $value);
    }
}