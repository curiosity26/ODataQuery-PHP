<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:25 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Geo;


class ODataGeoIntersectsOperator extends ODataGeoDistanceOperator {
    public function __construct($point1 = NULL, $point2 = NULL) {
        parent::__construct($point1, $point2);
        $this->operator = 'geo.intersects';
    }
}