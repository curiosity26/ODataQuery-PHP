<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:03 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataMaxDateTimeOperator extends ODataDateTimeOperator {
    public function __construct() {
        parent::__construct('maxdatetime');
    }
}