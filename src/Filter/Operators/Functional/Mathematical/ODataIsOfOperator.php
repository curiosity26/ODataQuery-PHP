<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:10 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


use ODataQuery\Filter\Operators\Functional\ODataFunctionalOperator;

class ODataIsOfOperator extends ODataFunctionalOperator {
    protected $assignable = FALSE;
    public function __construct($type, $assignable = FALSE) {
        parent::__construct('isof', $type);
        $this->assignable= $assignable;
    }

    public function __toString() {
        $function = $this->operator;
        $type = $this->property;
        if ($this->assignable) {
            return "$function(\$it, $type)";
        }
        return "$function($type)";
    }
}