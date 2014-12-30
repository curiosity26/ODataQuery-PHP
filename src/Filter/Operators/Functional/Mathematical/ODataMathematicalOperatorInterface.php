<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 1/1/15
 * Time: 11:16 AM
 */

namespace ODataQuery\Filter\Operators\Functional\Mathematical;


interface ODataMathematicalOperatorInterface {
    public function ceiling();
    public function floor();
    public function round();
}