<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:53 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataHourOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('hour', $property);
    }
}