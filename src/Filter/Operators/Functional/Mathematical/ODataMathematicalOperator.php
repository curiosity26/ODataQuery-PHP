<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 11:18 AM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataMathematicalOperator extends ODataComparableFunctionOperator implements ODataMathematicalOperatorInterface {
    public function ceiling() {
        return new ODataCeilingOperator($this);
    }

    public function floor() {
        return new ODataFloorOperator($this);
    }

    public function round() {
        return new ODataRoundOperator($this);
    }
}