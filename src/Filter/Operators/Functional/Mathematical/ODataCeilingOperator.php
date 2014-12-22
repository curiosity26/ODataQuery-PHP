<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:09 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataCeilingOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('ceiling', $property);
    }
}