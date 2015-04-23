<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:52 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataDayOperator extends ODataDateTimeFilter{
    public function __construct($property = NULL) {
        parent::__construct('day', $property);
    }
}