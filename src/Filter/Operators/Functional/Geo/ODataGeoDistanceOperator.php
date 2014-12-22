<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:22 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Geo;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataGeoDistanceOperator extends ODataComparableFunctionOperator {
    public function __construct($point1 = NULL, $point2 = NULL) {
        parent::__construct('geo.distance');
        $this->points($point1, $point2);
    }

    public function points($point1 = NULL, $point2 = NULL) {
        $args = &$this->arguments;
        if (isset($point1) || isset($point2)) {
            if (isset($point1)) {
                $args[0] = $point1;
            }
            if (isset($point2)) {
                $args[1] = $point2;
            }
        }
        return $args;
    }
}