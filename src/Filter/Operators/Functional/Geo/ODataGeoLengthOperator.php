<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:26 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Geo;


use ODataQuery\Filter\Operators\Functional\ODataComparableFunctionOperator;

class ODataGeoLengthOperator extends ODataComparableFunctionOperator {
    public function __construct($property = NULL) {
        parent::__construct('geo.length', $property);
    }
}