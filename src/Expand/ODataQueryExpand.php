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

class ODataQueryExpand extends ODataResource implements ODataExpandableInterface {
    protected $limits;
    protected $property;

    public function __construct($property = NULL, ODataQueryFilterInterface $filter = NULL,
        ODataQuerySelect $select = NULL, ODataResource $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL) {
        $this->setProperty($property);
        parent::__construct($filter, $select, $expand, $pager, $search, $orderBy);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $property
     * @return $this
     * @deprecated
     */
    public function property($property = NULL) {
        if (isset($property)) {
            $this->setProperty($property);
            return $this;
        }
        return $this->getProperty();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $limits
     * @return $this
     * @deprecated
     */
    public function limits($limits = NULL) {
        if (isset($limits)) {
            if (is_int($limits)) {
                $this->setLimits($limits);
                return $this;
            }
        }
        return $this->getLimits();
    }

    public function build() {
        $build = parent::build();
        if ($this->count !== TRUE) {
            $build['$limits'] = $this->getLimits();
        }
        return array_filter($build);
    }

    public function __toString() {
        $output = (string)$this->getProperty();
        $build = $this->build();
        $args = array();
        if (!empty($build)) {
            foreach ($build as $param => $value) {
                $args[] = "$param=$value";
            }

            if (count($args) > 0) {
                $args = implode("&", $args);
                $output .= "($args)";
            }
        }

        return $output;
    }

    /**
     * @return mixed
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * @param mixed $limits
     */
    public function setLimits($limits = NULL)
    {
        $this->limits = $limits;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property = NULL)
    {
        $this->property = $property;
    }


}