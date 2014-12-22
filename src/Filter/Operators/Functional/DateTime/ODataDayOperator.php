<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:52 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataDayOperator extends ODataComparableFunctionOperator{
    public function __construct($property = NULL) {
        parent::__construct('day', $property);
    }
}