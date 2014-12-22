<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:34 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataToUpperOperator extends ODataComparableStringFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('toupper', $property);
    }

    public function equals($value, $isField = FALSE) {
        if ($isField === TRUE) {
            return parent::equals($value, $isField);
        }
        return parent::equals(strtoupper($value), $isField);
    }

    public function notEquals($value, $isField = FALSE) {
        if ($isField === TRUE) {
            return parent::equals($value, $isField);
        }
        return parent::equals(strtoupper($value), $isField);
    }
}