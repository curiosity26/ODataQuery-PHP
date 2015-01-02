<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:57 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataDateOperator extends ODataDateTimeOperator {
    protected $format = 'Y-m-d';
    public function __construct($property = NULL) {
        parent::__construct('date', $property);
    }
}