<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:33 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Lambda;


use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;

class ODataAnyOperator extends ODataFunctionalOperator {
    protected $argument = FALSE;

    public function __construct($property = NULL, ODataQueryFilterInterface $argument = NULL) {
        parent::__construct('any', $property);
        $this->argument = $argument;
    }

    public function __toString() {
        $lambda = $this->operator;
        $property = $this->property;
        $arg = $this->argument;
        return "$property/$lambda(d:d/$arg)";
    }
}