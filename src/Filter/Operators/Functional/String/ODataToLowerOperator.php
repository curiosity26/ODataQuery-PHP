<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:39 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataToLowerOperator extends ODataComparableStringFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('tolower', $property);
    }

    public function equals($value, $isField = FALSE) {
        if ($isField === TRUE) {
            return parent::equals($value, $isField);
        }
        return parent::equals(strtolower($value), $isField);
    }

    public function notEquals($value, $isField = FALSE) {
        if ($isField === TRUE) {
            return parent::equals($value, $isField);
        }
        return parent::equals(strtolower($value), $isField);
    }
}