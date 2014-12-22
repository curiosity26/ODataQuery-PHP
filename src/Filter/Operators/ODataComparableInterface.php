<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:12 PM
 */

namespace ODataQuery\Filter\Operators;

interface ODataComparableInterface {
    public function equals($value);
    public function notEquals($value);
    public function lessThan($value);
    public function lessThanEquals($value);
    public function greaterThan($value);
    public function greaterThanEquals($value);
}