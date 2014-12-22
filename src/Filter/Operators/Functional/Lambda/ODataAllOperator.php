<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:51 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Lambda;


use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;

class ODataAllOperator extends ODataFunctionalOperator {
    protected $argument;

    public function __construct($property = NULL, ODataQueryFilterInterface $argument = NULL) {
        parent::__construct('all', $property);
        $this->argument = $argument;
    }

    public function __toString() {
        $lambda = $this->operator;
        $property = $this->property;
        $arg = $this->argument;
        return "$property/$lambda(d:d/$arg)";
    }
}