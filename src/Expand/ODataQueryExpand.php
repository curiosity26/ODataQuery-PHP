<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:14 PM
 */

namespace ODataQuery\Expand;


use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\ODataResource;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

class ODataQueryExpand extends ODataResource {
    protected $limits;
    protected $property;

    public function __construct($property = NULL, ODataQueryFilterInterface $filter = NULL,
        ODataQuerySelect $select = NULL, ODataResource $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL) {
        $this->property($property);
        parent::__construct($filter, $select, $expand, $pager, $search, $orderBy);
    }

    public function property($property = NULL) {
        if (isset($property)) {
            $this->property = $property;
            return $this;
        }
        return $this->property;
    }

    public function limits($limits = NULL) {
        if (isset($limits)) {
            if (is_int($limits)) {
                $this->limits = $limits;
            }
        }
        return $this;
    }

    public function build() {
        $build = parent::build();
        if ($this->count() !== TRUE) {
            $build['$limits'] = $this->limits();
        }
        return array_filter($build);
    }

    public function __toString() {
        $output = $this->property();
        $args = implode(", ", $this->build());
        if (strlen($args) > 0) {
            $output .= "($args)";
        }

        return $output;
    }
}