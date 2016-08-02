<?php

namespace MyVendor\Spike\Resource\Page;

use BEAR\Package\Bootstrap;

class IndexTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        parent::setUp();
        $app = (new Bootstrap)->getApp('MyVendor\Spike', 'prod-api-app');
        $this->resource = $app->resource;
    }

    public function testOnGet()
    {
        // resource request
        $page = $this->resource->get->uri('page://self/index')->withQuery(['key' => 'key1'])->eager->request();
        $this->assertSame(200, $page->code);
        $this->assertSame('key1', $page['key']);
        $this->assertSame('news', $page['cat']);
        $this->assertSame(null, $page['limit']);
    }

    public function testOnGet2()
    {
        // resource request
        $page = $this->resource->get->uri('page://self/index')->withQuery(['key' => 'key1', 'limit' => '10'])->eager->request();
        $this->assertSame(200, $page->code);
        $this->assertSame('key1', $page['key']);
        $this->assertSame('news', $page['cat']);
        $this->assertSame('10', $page['limit']);
    }
}
