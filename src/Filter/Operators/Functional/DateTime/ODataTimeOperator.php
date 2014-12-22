<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 8:58 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataTimeOperator extends ODataDateTimeOperator {
    public function __construct($property = NULL) {
        parent::__construct('time', $property);
        $this->format = 'H:i:s e';
    }
}