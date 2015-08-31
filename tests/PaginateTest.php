<?php

require '../src/Pagerange/Paginate/Paginate.php';

use Pagerange\Paginate\Paginate;

class AuthCheckTest extends PHPUnit_Framework_TestCase
{

    private $p; // paginator

    public function setUp()
    {
        $this->p = new Paginate(2,45); // offset 2, 45 results
    }

    public function testPagination()
    {
        $this->assertTrue(is_array($this->p->getPagination()), "Pageinator should return an array");
    }

    public function testPaginationLast()
    {
        $pagination = $this->p->getPagination();
        $expected = 5;
        $actual = $pagination['last'];
        $this->assertEquals($expected, $actual, "Value of last link should be 5");
    }

    public function testPaginationPrev()
    {
        $pagination = $this->p->getPagination();
        $expected = 1;
        $actual = $pagination['prev'];
        $this->assertEquals($expected, $actual, "Value of prev link should be 1");
    }

    public function testPaginationNext()
    {
        $pagination = $this->p->getPagination();
        $expected = 3;
        $actual = $pagination['next'];
        $this->assertEquals($expected, $actual, "Value of next link should be 3");
    }

    public function testPagiantionNumberOfLinks()
    {
        $pagination = $this->p->getPagination();
        $links = $pagination['links'];
        $expected = 5;
        $actual = count($links);
        $this->assertEquals($expected, $actual, "Should have 5 links in total");
    }

}
