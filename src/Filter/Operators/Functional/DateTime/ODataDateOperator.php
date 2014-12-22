<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:57 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataDateOperator extends ODataDateTimeOperator {
    public function __construct($property = NULL) {
        parent::__construct('date', $property);
        $this->format = 'Y-m-d';
    }
}