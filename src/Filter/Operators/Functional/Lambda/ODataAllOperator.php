<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:51 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Lambda;


use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;
use ODataQuery\Filter\Operators\Logical\ODataLogicalOperatorInterface;

class ODataAllOperator extends ODataFunctionalOperator {
    public function __construct($property = NULL, ODataLogicalOperatorInterface $argument = NULL) {
        parent::__construct('all', $property);
        $this->argument($argument);
    }

    public function argument(ODataLogicalOperatorInterface $arg = NULL) {
        if (isset($arg)) {
            $this->arguments(array($arg));
            return $this;
        }
        $args = $this->arguments();
        return array_shift($args);
    }

    public function __toString() {
        $lambda = $this->operator();
        $property = $this->property();
        $arg = $this->argument();
        return "$property/$lambda(d:d/$arg)";
    }
}