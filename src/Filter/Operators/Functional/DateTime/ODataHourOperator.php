<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:53 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;



class ODataHourOperator extends ODataDateTimeFilter {
    public function __construct($property = NULL) {
        parent::__construct('hour', $property);
    }
}