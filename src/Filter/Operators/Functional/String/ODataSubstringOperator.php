<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:16 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataSubstringOperator extends ODataComparableStringFunctionOperator {
    protected $start;
    protected $end;
    public function __construct($property = NULL, $start = NULL, $end = NULL) {
        parent::__construct('substring', $property);
        $this->range($start, $end);
    }

    public function range($start = NULL, $end = NULL) {
        $this->start = $start;
        $this->end = $end;
    }

    public function __toString() {
        $function = $this->operator;
        $property = $this->property;
        $start = $this->start;
        $end = $this->end;
        $arg = $start;
        if (isset($end)) {
            $arg .= ", $end";
        }
        return "$function($property, $arg)";
    }
}