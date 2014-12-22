<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:02 PM
 */

namespace ODataQuery\Filter\Operators\Functional\DateTime;


class ODataNowOperator extends ODataDateTimeOperator {
    public function __construct() {
        parent::__construct('now');
    }
}