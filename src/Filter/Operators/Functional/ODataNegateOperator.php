<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 7:16 PM
 */

namespace ODataQuery\Filter\Operators\Functional;


use ODataQuery\Filter\ODataQueryFilter;

class ODataNegateOperator extends ODataQueryFilter implements ODataNegateOperatorInterface {
    private $value;

    public function __construct($value = NULL) {
        $this->value = $value;
    }

    public function __toString() {
        return "not {$this->value}";
    }
}