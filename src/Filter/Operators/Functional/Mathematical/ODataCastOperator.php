<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:18 PM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


class ODataCastOperator extends ODataIsOfOperator {
    public function __construct($type = NULL, $assignable = FALSE) {
        parent::__construct($type, $assignable);
        $this->operator = 'cast';
    }
}