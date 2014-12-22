<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:58 PM
 */

namespace ODataQuery\Filter\Operators\Functional;

interface ODataNegateOperatorInterface {
    public function value($value = NULL);
    public function __toString();
}