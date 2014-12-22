<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:07 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataRoundOperator extends ODataComparableFunctionOperator{
    public function __construct($property = NULL) {
        parent::__construct('round', $property);
    }
}