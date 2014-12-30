<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 11:37 AM
 */

namespace ODataQuery\Filter;


use ODataQuery\Filter\Operators\Functional\Geo\ODataGeoDistanceOperator;
use ODataQuery\Filter\Operators\Functional\Geo\ODataGeoIntersectsOperator;
use ODataQuery\Filter\Operators\Functional\Geo\ODataGeoLengthOperator;
use ODataQuery\Filter\Operators\Functional\Lambda\ODataAllOperator;
use ODataQuery\Filter\Operators\Functional\Lambda\ODataAnyOperator;
use ODataQuery\Filter\Operators\Functional\Mathematical\ODataCeilingOperator;
use ODataQuery\Filter\Operators\Functional\Mathematical\ODataFloorOperator;
use ODataQuery\Filter\Operators\Functional\Mathematical\ODataRoundOperator;
use ODataQuery\Filter\Operators\Functional\ODataNegateOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataComparableStringFunctionOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataConcatOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataContainsOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataEndsWithOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataIndexOfOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataLengthOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataReplaceOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataStartsWithOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataSubstringOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataToLowerOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataToUpperOperator;
use ODataQuery\Filter\Operators\Functional\String\ODataTrimOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataAddOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataDivideOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataModuloOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataMultiplyOperator;
use ODataQuery\Filter\Operators\Logical\Mathematical\ODataSubtractOperator;
use ODataQuery\Filter\Operators\Logical\ODataAndOperator;
use ODataQuery\Filter\Operators\Logical\ODataEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataGreaterThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataLessThanOperator;
use ODataQuery\Filter\Operators\Logical\ODataNotEqualsOperator;
use ODataQuery\Filter\Operators\Logical\ODataOrOperator;
use ODataQuery\ODataCount;

class ODataFilterFactory extends ODataQueryFilter implements ODataFilterFactoryInterface {
    protected $originalProperty;

    public function __construct($property = NULL) {
        $this->originalProperty = $property;
        $this->property = $property;
    }

    /* Logical */
    public function equals($value) {
        if (method_exists($this->property, 'equals')) {
            $this->property = $this->property->equals($value);
        }
        else {
            $this->property = new ODataEqualsOperator($this->property, $value);
        }
        return $this;
    }

    public function equalsString($value) {
        if ($this->property instanceof ODataComparableStringFunctionOperator) {
            $this->property = $this->property->equals($value);
        }
        else {
            $value = str_replace("'", "\'", $value);
            $this->property = new ODataEqualsOperator($this->property, "'$value'");
        }
        return $this;
    }

    public function notEquals($value) {
        if (method_exists($this->property, 'notEquals')) {
            $this->property = $this->property->notEquals($value);
        }
        else {
            $this->property = new ODataNotEqualsOperator($this->property, $value);
        }
        return $this;
    }

    public function notEqualsString($value) {
        if ($this->property instanceof ODataComparableStringFunctionOperator) {
            $this->property = $this->property->notEquals($value);
        }
        else {
            $value = str_replace("'", "\'", $value);
            $this->property = new ODataNotEqualsOperator($this->property, "'$value'");
        }
        return $this;
    }

    public function lessThan($value) {
        if (method_exists($this->property, 'lessThan')) {
            $this->property = $this->property->lessThan($value);
        }
        else {
            $this->property = new ODataLessThanOperator($this->property, $value);
        }
        return $this;
    }

    public function lessThanEquals($value) {
        if (method_exists($this->property, 'lessThanEquals')) {
            $this->property = $this->property->lessThanEquals($value);
        }
        else {
            $this->property = new ODataLessThanEqualsOperator($this->property, $value);
        }
        return $this;
    }

    public function greaterThan($value) {
        if (method_exists($this->property, 'greaterThan')) {
            $this->property = $this->property->greaterThan($value);
        }
        else {
            $this->property = new ODataGreaterThanOperator($this->property, $value);
        }
        return $this;
    }

    public function greaterThanEquals($value) {
        if (method_exists($this->property, 'greaterThanEquals')) {
            $this->property = $this->property->greaterThanEquals($value);
        }
        else {
            $this->property = new ODataGreaterThanEqualsOperator($this->property, $value);
        }
        return $this;
    }

    /* Conditional */
    public function _and($value) {
        if (method_exists($this->property, '_and')) {
            $this->property = $this->property->_and($value);
        }
        else {
            $this->property = new ODataAndOperator($this->property, $value);
        }
        return $this;
    }

    public function _or($value) {
        if (method_exists($this->property, '_or')) {
            $this->property = $this->property->_or($value);
        }
        else {
            $this->property = new ODataOrOperator($this->property, $value);
        }
        return $this;
    }

    /* Mathematical */
    public function add($value) {
        if (method_exists($this->property, 'add')) {
            $this->property = $this->property->add($value);
        }
        else {
            $this->property = new ODataAddOperator($this->property, $value);
        }
        return $this;
    }

    public function subtract($value) {
        if (method_exists($this->property, 'subtract')) {
            $this->property = $this->property->subtract($value);
        }
        else {
            $this->property = new ODataSubtractOperator($this->property, $value);
        }
        return $this;
    }

    public function multiply($value) {
        if (method_exists($this->property, 'multiply')) {
            $this->property = $this->property->multiply($value);
        }
        else {
            $this->property = new ODataMultiplyOperator($this->property, $value);
        }
        return $this;
    }

    public function divide($value) {
        if (method_exists($this->property, 'divide')) {
            $this->property = $this->property->divide($value);
        }
        else {
            $this->property = new ODataDivideOperator($this->property, $value);
        }
        return $this;
    }

    public function modulo($value) {
        if (method_exists($this->property, 'modulo')) {
            $this->property = $this->property->modulo($value);
        }
        else {
            $this->property = new ODataModuloOperator($this->property, $value);
        }
        return $this;
    }

    public function ceiling() {
        if (method_exists($this->property, 'ceiling')) {
            $this->property = $this->property->ceiling();
        }
        else {
            $this->property = new ODataCeilingOperator($this->property);
        }
        return $this;
    }

    public function floor() {
        if (method_exists($this->property, 'floor')) {
            $this->property = $this->property->floor();
        }
        else {
            $this->property = new ODataFloorOperator($this->property);
        }
        return $this;
    }

    public function round() {
        if (method_exists($this->property, 'round')) {
            $this->property = $this->property->round();
        }
        else {
            $this->property = new ODataRoundOperator($this->property);
        }
        return $this;
    }

    /* Recordset */

    public function count() {
        $this->property = new ODataCount($this->property);
        return $this;
    }

    /* Negatable */
    public function not() {
        if (method_exists($this->property, 'not')) {
            $this->property = $this->property->not();
        }
        else {
            $this->property = new ODataNegateOperator($this->property);
        }
        return $this;
    }

    /* Lambda */
    public function any($value) {
        $this->property = new ODataAnyOperator($this->property, $value);
        return $this;
    }
    public function all($value) {
        $this->property = new ODataAllOperator($this->property, $value);
        return $this;
    }

    /* String Functions */
    public function concat($value) {
        if (method_exists($this->property, 'concat')) {
            $this->property = $this->property->concat($value);
        }
        else {
            $this->property = new ODataConcatOperator($this->property, $value);
        }
        return $this;
    }

    public function contains($value) {
        if (method_exists($this->property, 'contains')) {
            $this->property = $this->property->contains($value);
        }
        else {
            $this->property = new ODataContainsOperator($this->property, $value);
        }
        return $this;
    }

    public function startsWith($value) {
        if (method_exists($this->property, 'startsWith')) {
            $this->property = $this->property->startsWith($value);
        }
        else {
            $this->property = new ODataStartsWithOperator($this->property, $value);
        }
        return $this;
    }

    public function endsWith($value) {
        if (method_exists($this->property, 'endsWith')) {
            $this->property = $this->property->endsWith($value);
        }
        else {
            $this->property = new ODataEndsWithOperator($this->property, $value);
        }
        return $this;
    }

    public function indexOf($value) {
        if (method_exists($this->property, 'indexOf')) {
            $this->property = $this->property->indexOf($value);
        }
        else {
            $this->property = new ODataIndexOfOperator($this->property, $value);
        }
        return $this;
    }

    public function length() {
        if (method_exists($this->property, 'length')) {
            $this->property = $this->property->length();
        }
        else {
            $this->property = new ODataLengthOperator($this->property);
        }
        return $this;
    }

    public function trim() {
        if (method_exists($this->property, 'trim')) {
            $this->property = $this->property->trim();
        }
        else {
            $this->property = new ODataTrimOperator($this->property);
        }
        return $this;
    }

    public function substring($start, $end = NULL) {
        if (method_exists($this->property, 'substring')) {
            $this->property = $this->property->substring($start, $end);
        }
        else {
            $this->property = new ODataSubstringOperator($this->property, $start, $end);
        }
        return $this;
    }

    public function replace($find, $replace) {
        if (method_exists($this->property, 'replace')) {
            $this->property = $this->property->replace($find, $replace);
        }
        else {
            $this->property = new ODataReplaceOperator($this->property, $find, $replace);
        }
        return $this;
    }

    public function toUpper() {
        if (method_exists($this->property, 'toUpper')) {
            $this->property = $this->property->toUpper();
        }
        else {
            $this->property = new ODataToUpperOperator($this->property);
        }
        return $this;
    }

    public function toLower() {
        if (method_exists($this->property, 'toLower')) {
            $this->property = $this->property->toLower();
        }
        else {
            $this->property = new ODataToLowerOperator($this->property);
        }
        return $this;
    }

    /* Geographical */
    public function distance($toPoint) {
        $this->property = new ODataGeoDistanceOperator($this->property, $toPoint);
        return $this;
    }

    public function intersects($point) {
        $this->property = new ODataGeoIntersectsOperator($this->property, $point);
        return $this;
    }

    public function geoLength() {
        $this->property = new ODataGeoLengthOperator($this->property);
        return $this;
    }

    public function __toString() {
        return (string)$this->property;
    }
}