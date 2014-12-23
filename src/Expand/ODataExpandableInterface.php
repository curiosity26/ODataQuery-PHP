<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:06 PM
 */

namespace ODataQuery\Expand;


interface ODataExpandableInterface {
    public function property($property = NULL);
    public function limits($limits = NULL);
    public function __toString();
}