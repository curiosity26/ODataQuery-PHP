<?php
/**
 * Created by PhpStorm.
 * User: mskrzypecki
 * Date: 25-8-2015
 * Time: 14:18
 */

namespace ODataQuery\Format;

use ODataQuery\ODataQueryOptionInterface;

class ODataQueryFormat implements ODataQueryOptionInterface
{
    /** @var string */
    private $type;

    public function __construct($type = null)
    {
        $this->type($type);
    }

    public function type($type = null)
    {
        if (isset($type)) {
            $this->type = $type;
            return $this;
        }

        return $this->type;
    }

    public function __toString()
    {
        return $this->type;
    }
}