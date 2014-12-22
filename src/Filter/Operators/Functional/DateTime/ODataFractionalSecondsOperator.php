<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:55 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataFractionalSecondsOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('fractionalseconds', $property);
    }
}