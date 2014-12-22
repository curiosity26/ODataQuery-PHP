<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 12:44 PM
 */

namespace ODataQuery\Search;


use ODataQuery\ODataQueryOptionInterface;

class ODataQuerySearch implements ODataQueryOptionInterface, ODataQuerySearchInterface {
    private $query;

    public function __construct($query = NULL) {
        $this->query($query);
    }

    public function query($query = NULL) {
        if (isset($query)) {
            $query = trim($query);
            if (preg_match('/\s+/', $query) !== FALSE) {
                $query = "\"$query\"";
            }
            $this->query = $query;
            return $this;
        }
        return $this->query;
    }

    public function _and(ODataQuerySearchInterface $conditional) {
        return new ODataQuerySearchAndConditional($this, $conditional);
    }

    public function _or(ODataQuerySearchInterface $conditional) {
        return new ODataQuerySearchOrConditional($this, $conditional);
    }

    public function build() {
        return $this;
    }

    public function __toString() {
        return $this->query;
    }
}