<?php

/**
 * @file Paginate.php
 * @short-description A simple pagination class
 * @description Builds a pagination object that can be easily used to output pagination links for a result set.
 * @author Steve George <steve@pagerange.com>
 * @created_at 2015-08-30
 * @updated_at 2015-08-30
 */

namespace Pagerange\Paginate;

class Paginate
{

    /**
     * @var int
     * Maximum number of results to show per paginated page
     */
    private $MAX_RESULTS_PER_PAGE = 10;

    /**
     * @var int
     * Current offset as passed by the View.
     */
    public $offset;

    /**
     * @var int
     * Total number of results to be paginated
     */
    public $num_results;

    /**
     * @var int
     * Last page of results (highest offset for result set)
     */
    public $last;

    /**
     * @var int
     * Previous offset (go back one page of results)
     */
    public $prev;

    /**
     * @var int
     * Next offset (go forward one page of results)
     */
    public $next;

    /**
     * @var int
     * First offset (initial page of results)
     */
    public $first;

    /**
     * @var int
     * Last offset (last page of results)
     */
    public $links;

    /**
     * Construct the paginator based on the current offset
     * and total number of results.
     * @param int $offset
     * @param int $num_results
     */
    public function __construct($offset = 0, $num_results = 0) {

        if(defined('MAX_RESULTS_PER_PAGE')) {
            $this->MAX_RESULTS_PER_PAGE = MAX_RESULTS_PER_PAGE;
        }

        $this->offset = $offset;
        $this->num_results = $num_results;

        $this->setPagination();

    } // end __construct

    /**
     * Wrapper function to execute all pagination functions
     * @void
     */
    private function setPagination()
    {
        $this->setFirst();
        $this->setLast();
        $this->setNext();
        $this->setPrev();
        $this->setLinks();
    }

    /**
     * Set the first offset (page of results).  Should always be one
     */
    private function setFirst()
    {
        $this->first = 1;
    }

    /**
     * Set the last offset (page of results).
     * Calculate based on number of results and max results per page
     */
    private function setLast()
    {
        if($this->num_results % $this->MAX_RESULTS_PER_PAGE) {
            $this->last = ceil($this->num_results / $this->MAX_RESULTS_PER_PAGE);
        } else {
            $this->last = $this->num_results / $this->MAX_RESULTS_PER_PAGE;
        }
    }

    /**
     * Set next offset based on current offset
     */
    private function setNext()
    {
        $this->next = ($this->offset < $this->last) ? $this->offset + 1 : $this->last;
    }

    /**
     * set prev offset based on current offset
     * Can't be less than 1
     */
    private function setPrev()
    {
        $this->prev = ($this->offset > 1) ? $this->offset - 1 : 1;
    }

    /**
     * Set the value of the links array... essentially an
     * array of integers between the first and last offset values
     */
    private function setLinks()
    {
        $links = array();
        for($i = $this->first; $i <= $this->last; $i++) {
            $links[] = $i;
        }
        $this->links = $links;
    }

    /**
     * Get an array with all the values required to
     * output a set of pagination links.  You can
     * use this instead of the object parameters if
     * you wish.
     * @return array
     */
    public function getPagination()
    {
        return array(
            'current' => $this->offset,
            'next' => $this->next,
            'prev' => $this->prev,
            'first' => $this->first,
            'last' => $this->last,
            'links' => $this->links
        );
    }


}