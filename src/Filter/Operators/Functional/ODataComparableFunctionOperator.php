<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:27 PM
 */

namespace ODataQuery\Filter\Operators\Functional;


use ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataMathematicalOperatorInterface;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator;
use ODataQuery\Filter\Operators\Logical\ODataEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator;
use ODataQuery\Filter\Operators\ODataComparableInterface;

class ODataComparableFunctionOperator extends ODataFunctionalOperator implements ODataComparableInterface, ODataMathematicalOperatorInterface {
    public function equals($value, $isField = FALSE) {
        if ($isField !== TRUE && is_string($value)) {
            $value = "'$value'";
        }
        return new ODataEqualsOperator($this, $value);
    }

    public function notEquals($value, $isField = FALSE) {
        if ($isField !== TRUE && is_string($value)) {
            $value = "'$value'";
        }
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

    function add($value) {
        return new ODataAddOperator($this, $value);
    }

    function subtract($value) {
        return new ODataSubtractOperator($this, $value);
    }

    function multiply($value) {
        return new ODataMultiplyOperator($this, $value);
    }

    function divide($value) {
        return new ODataDivideOperator($this, $value);
    }

    function modulo($value) {
        return new ODataModuloOperator($this, $value);
    }
}