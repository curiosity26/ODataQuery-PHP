<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:18 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


class ODataCastOperator extends ODataIsOfOperator {
    public function __construct($type = NULL, $property = NULL) {
        parent::__construct($type, $property);
        $this->operator = 'cast';
    }
}