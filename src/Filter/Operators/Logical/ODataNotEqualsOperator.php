<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 4:11 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


class ODataNotEqualsOperator extends ODataLogicalOperator {
    private $not = FALSE;

    public function not() {
        $this->not = !$this->not;
        return $this;
    }

    public function __construct($property = NULL, $value = NULL) {
        parent::__construct($property, $value);
        $this->operator = 'ne';
    }
}