<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 4:15 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


class ODataGreaterThanOperator extends ODataLogicalOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct($property, $value);
        $this->operator = 'gt';
    }
}