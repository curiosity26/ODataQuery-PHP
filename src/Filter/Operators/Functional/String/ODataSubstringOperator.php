<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:16 PM
 */

namespace ODataQuery\Filter\Operators\Functional\String;


class ODataSubstringOperator extends ODataComparableStringFunctionOperator {
    public function __construct($property = NULL, $start = NULL, $finish = NULL) {
        parent::__construct('substring', $property);
        $this->range($start, $finish);
    }

    public function range($start = NULL, $finish = NULL) {
        if (isset($start)) {
            $args = array($start, $finish);
            $this->arguments = array_filter($args);
            return $this;
        }
        $args = $this->arguments;
        $range = array(
            'start' => $args[0],
            'finish' => isset($args[1]) ? $args[1] : NULL
        );
        return $range;
    }
}