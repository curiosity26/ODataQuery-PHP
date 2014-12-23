<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 12:08 PM
 */

namespace ODataQuery\Pager;


use ODataQuery\ODataQueryOptionInterface;

class ODataQueryPager implements ODataQueryOptionInterface {
    protected $top = 500;
    protected $page = 0;

    public function __construct($limit = NULL, $page = 0) {
        $this->limit($limit);
        $this->page($page);
    }

    public function limit($limit = NULL) {
        if (isset($limit)) {
            if ($limit > 0) {
                $this->top = $limit;
            }
            return $this;
        }
        return $this->top;
    }

    public function page($page = NULL) {
        if (isset($page)) {
            if ($page > 0) {
                $this->page = $page;
            }
            return $this;
        }
        return $this->page;
    }

    public function skip($skip = NULL, $limit = NULL) {
        if (isset($skip) && $skip >= 0) {
            $this->top = isset($limit) && $limit > 0 ? $limit : $this->top;
            $this->page = floor($skip / $this->top);
            return $this;
        }
        return $this->top * $this->page;
    }


    public function build() {
        return array(
            '$top' => $this->limit(),
            '$skip' => $this->skip()
        );
    }

    public function __toString() {
        $output = array();
        foreach ($this->build() as $param => $value) {
            $output[] = "$param=$value";
        }
        return implode('&', $output);
    }
}