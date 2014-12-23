<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:05 PM
 */

namespace ODataQuery;


use ODataQuery\Expand\ODataExpandableCollectionInterface;
use ODataQuery\Expand\ODataExpandableInterface;
use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

class ODataResource implements ODataQueryOptionInterface, ODataResourceInterface {
    protected $pager;
    protected $filter;
    protected $search;
    protected $select;
    protected $expand;
    protected $count = FALSE;
    protected $orderBy;

    public function __construct(ODataQueryFilterInterface $filter = NULL, ODataQuerySelect $select = NULL,
        ODataResource $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL) {

        $this->select($select);
        $this->pager($pager);
        $this->filter($filter);
        $this->search($search);
        $this->expand($expand);
        $this->orderBy($orderBy);
    }

    public function pager(ODataQueryPager $pager = NULL) {
        if (isset($pager)) {
            $this->pager = $pager;
            return $this;
        }
        return $this->pager;
    }

    public function filter(ODataQueryFilterInterface $filter = NULL) {
        if (isset($filter)) {
            $this->filter = $filter;
            return $this;
        }
        return $this->filter;
    }

    public function search(ODataQuerySearch $search = NULL) {
        if (isset($search)) {
            $this->search = $search;
            return $this;
        }
        return $this->search;
    }

    public function select(ODataQuerySelect $select = NULL) {
        if (isset($select)) {
            $this->select = $select;
            return $this;
        }
        return $this->select;
    }

    public function expand(ODataExpandableCollectionInterface $expand = NULL) {
        if (isset($expand)) {
            $this->expand = $expand;
            return $this;
        }
        return $this->expand;
    }

    public function orderBy($orderBy = NULL) {
        if (isset($orderBy)) {
            $this->orderBy = $orderBy;
            return $this;
        }
        return $this->orderBy;
    }

    public function count($enable = TRUE) {
        $this->count = $enable === TRUE;
        return $this;
    }

    public function build() {
        $build = array(
                '$select' => $this->select(),
                '$filter' => $this->filter(),
                '$search' => $this->search(),
                '$expand' => $this->expand(),
                '$orderby' => $this->orderBy,
            );

        $pager = $this->pager();
        if (isset($pager)) {
            $build += $pager->build();
        }

        // Count Overrides other parameters
        if ($this->count === TRUE) {
            $build = array('$count' => TRUE);
        }
        return array_filter($build);
    }

    public function __toString() {
       $build = $this->build();
        $args = array();
        if (!empty($build)) {
            foreach ($build as $name => $value) {
                $args[] = "$name=$value";
            }
        }
       return implode('&', $args);
    }
}