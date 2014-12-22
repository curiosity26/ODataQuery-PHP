<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 6:44 PM
 */

namespace ODataQuery\Filter\Operators\Logical\Mathematical;


class ODataDivideOperator extends ODataMathematicalOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct($property, $value, 'div');
    }
}