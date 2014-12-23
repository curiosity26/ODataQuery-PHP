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
    protected $type;
    public function __construct($type, $property = NULL) {
        parent::__construct('isof', $property);
        $this->type = $type;
    }

    public function __toString() {
        $function = $this->operator;
        $type = $this->type;
        $property = $this->property;
        if (isset($property)) {
            return "$function($property, $type)";
        }
        return "$function($type)";
    }
}