<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:04 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataMinDateTimeOperator extends ODataDateTimeOperator {
    public function __construct() {
        parent::__construct('mindatetime');
    }
}