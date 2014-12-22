<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 6:49 PM
 */

namespace ODataQuery\Filter\Operators\Logical\Mathematical;

use ODataQuery\Filter\Operators\Logical\ODataEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataLogicalOperator;
use ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator;
use ODataQuery\Filter\Operators\ODataComparableInterface;

class ODataMathematicalOperator extends ODataLogicalOperator implements ODataComparableInterface {
    public function __construct($property = NULL, $value = NULL, $operator = NULL) {
        parent::__construct($property, $value);
        $this->operator = $operator;
    }

    public function equals($value) {
        return new ODataEqualsOperator($this, $value);
    }

    public function notEquals($value) {
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

    public function __toString() {
        $property = $this->property;
        $value = $this->value;
        $op = $this->operator;

        if ($property instanceof ODataMathematicalOperator) {
            $property = "($property)";
        }
        if ($value instanceof ODataMathematicalOperator) {
            $value = "($value)";
        }

        return "$property $op $value";
    }
}