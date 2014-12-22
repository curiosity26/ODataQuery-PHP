<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:59 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


class ODataOrOperator implements ODataLogicalOperatorInterface, ODataConditionalInterface {
    private $property;
    private $value;

    public function __construct(ODataLogicalOperatorInterface $property = NULL,
        ODataLogicalOperatorInterface $value = NULL) {

    }

    public function property($property = NULL) {
        if (isset($property)) {
            if ($property instanceof ODataLogicalOperatorInterface) {
                $this->property = $property;
            }
            return $this;
        }
        return $this->property;
    }

    public function value($value = NULL) {
        if (isset($value)) {
            if ($value instanceof ODataLogicalOperatorInterface) {
                $this->value = $value;
            }
            return $this;
        }
        return $this->value;
    }

    public function _and(ODataLogicalOperatorInterface $value) {
        return new ODataAndOperator($this, $value);
    }

    public function _or(ODataLogicalOperatorInterface $value) {
        return new ODataOrOperator($this, $value);
    }

    public function __toString() {
        $property = $this->property();
        $value = $this->value();
        if ($property instanceof ODataConditionalInterface) {
            $property = "($property)";
        }
        if ($value instanceof ODataConditionalInterface) {
            $value = "($value)";
        }

        return "$property or $value";
    }
}