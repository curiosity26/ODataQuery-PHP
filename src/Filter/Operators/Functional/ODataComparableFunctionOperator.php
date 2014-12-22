<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:27 PM
 */

namespace ODataQuery\Filter\Operators\Functional;


use ODataQuery\Filter\Operators\Logical\ODataEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator;
use ODataQuery\Filter\Operators\ODataComparableInterface;

class ODataComparableFunctionOperator extends ODataFunctionalOperator implements ODataComparableInterface {
    public function equals($value, $isField = FALSE) {
        $value = $isField === TRUE || is_numeric($value) ? $value : "'$value'";
        return new ODataEqualsOperator($this, $value);
    }

    public function notEquals($value, $isField = FALSE) {
        $value = $isField === TRUE || is_numeric($value) ? $value : "'$value'";
        return new ODataNotEqualsOperator($this, $value);
    }

    public function lessThan($value) {
        return new ODataLessThanOperator($this, $value);
    }

    public function lessThanEquals($value) {
        return new ODataLessThanEqualsOperator($this, $value);
    }

    public function greaterThan($value) {
        return new ODataGreaterThanOperator($this, $value);
    }

    public function greaterThanEquals($value) {
        return new ODataGreaterThanEqualsOperator($this, $value);
    }
}