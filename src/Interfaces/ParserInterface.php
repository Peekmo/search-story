<?php

/**
 * @author Axel Anceau <Peekmo>
 */
namespace Peekmo\Story\Interfaces;

/**
 * Interface used to define methods for the parsing of a website providing words
 * to build the fantastic story
 */
interface ParserInterface
{
    /**
     * Get data from the remote application, following the given query string
     * @param  string $query  Last words searched
     * @param  array  $params Additional parameters for the search (like page, lang etc..)
     * @return string Data from the remote search engine
     */
    public function get($query, array $params = array());

    /**
     * Parse data fetched with get() method
     * @param string $query Last words searched
     * @param string $data  Data from the remote search engine
     * @return array Suggestions found by the parsing
     */
    public function parse($query, $data);
}
