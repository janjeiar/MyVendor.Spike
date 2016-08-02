<?php

namespace MyVendor\Spike\Resource\Page;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\Resource\ResourceObject;

/**
 * @Cacheable
 */
class Index extends ResourceObject
{
    public function onGet($key, $cat = 'news', $limit = null)
    {
        $this->body['key'] = $key;
        $this->body['cat'] = $cat;
        $this->body['limit'] = $limit;

        return $this;
    }
}
