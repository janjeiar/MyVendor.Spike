<?php
namespace MyVendor\Spike\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\RepositoryModule\Annotation\Cacheable;
/**
 * @Cacheable
 */
class News extends ResourceObject
{
    public function onGet($cat = 'news', $key, $limit = null, $offset = null)
    {
        /**
         * For some instance, offset paramenter was not retrieved here,
         * though offset get parameter is set in url parameter.
         */
    	$this['data'] = "cat:{$cat}, key:{$key}, limit:{$limit}, offset:{$offset}<br>";
        
        /**
         * The logic will retrieve the data from the database.
         * Since offset is null, the retrived data will be the same,
         * even if we pass different offset parameter value in URL
         */
        
		return $this;

    }
}


