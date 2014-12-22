<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 6:42 PM
 */

namespace ODataQuery\Filter\Operators\Logical\Mathematical;


class ODataSubtractOperator extends ODataMathematicalOperator {
    public function __construct($property = NULL, $value = NULL) {
        parent::__construct($property, $value, 'sub');
    }
}