<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:57 PM
 */

namespace ODataQuery\Filter\Operators\Functional;


interface ODataNegatableOperatorInterface {
    public function not();
}