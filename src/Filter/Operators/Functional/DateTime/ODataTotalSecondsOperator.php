<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:05 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataTotalSecondsOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('totalseconds', $property);
    }
}