<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:41 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataTrimOperator extends ODataComparableStringFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('trim', $property);
    }
}