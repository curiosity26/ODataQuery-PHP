<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 11:06 AM
 */

namespace ODataQuery\Filter;


interface ODataFilterFactoryInterface {

    /* Logical */
    public function equals($value);
    public function equalsString($value);
    public function notEquals($value);
    public function notEqualsString($value);
    public function lessThan($value);
    public function lessThanEquals($value);
    public function greaterThan($value);
    public function greaterThanEquals($value);

    /* Conditional */
    public function _and($value);
    public function _or($value);

    /* Mathematical */
    public function add($value);
    public function subtract($value);
    public function multiply($value);
    public function divide($value);
    public function modulo($value);
    public function ceiling();
    public function floor();
    public function round();

    /* Recordset */
    public function count();

    /* Negatable */
    public function not();

    /* Lambda */
    public function any($value);
    public function all($value);

    /* String Functions */
    public function concat($value);
    public function contains($value);
    public function startsWith($value);
    public function endsWith($value);
    public function indexOf($value);
    public function length();
    public function trim();
    public function substring($start, $end = NULL);
    public function replace($find, $replace);
    public function toUpper();
    public function toLower();

    /* Geographical */
    public function distance($toPoint);
    public function intersects($point);
    public function geoLength();
}