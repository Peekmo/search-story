<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Parsers;

use Peekmo\Story\Interfaces\ParserInterface;

class GoogleParser implements ParserInterface
{
    /**
    * Get data from the remote application, following the given query string
    * @param  string $query  Last words searched
    * @param  array  $params Additional parameters for the search (like page, lang etc..)
    * @return string Data from the remote search engine
    */
    public function get($query, array $params = array())
    {

    }

    /**
    * Parse data fetched with get() method
    * @param string $data Data from the remote search engine
    * @return array Suggestions found by the parsing
    */
    public function parse($data)
    {

    }
}
