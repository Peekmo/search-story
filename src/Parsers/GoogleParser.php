<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Parsers;

use Peekmo\Story\Interfaces\ParserInterface;

class GoogleParser implements ParserInterface
{
    /**
     * @var array Urls for google, by language
     */
    protected $urls;

    public function __construct()
    {
        $this->urls = array(
            'fr' => 'http://www.google.fr'
        );
    }

    /**
    * Get data from the remote application, following the given query string
    * @param  string $query  Last words searched
    * @param  array  $params Additional parameters for the search (like page, lang etc..)
    * @return string Data from the remote search engine
    */
    public function get($query, array $params = array())
    {
        $lang = isset($params['lang']) ? $params['lang'] : 'fr';
        $result = file_get_contents(sprintf('%s/search?q=%s', $this->urls[$lang], urlencode('"' . $query . '"')));

        return $result;
    }

    /**
    * Parse data fetched with get() method
    * @param string $query Last words searched
    * @param string $data  Data from the remote search engine
    * @return array Suggestions found by the parsing
    */
    public function parse($query, $data)
    {
        $data = utf8_encode($data);
        $elements = explode('<span class="st">', $data);
        array_shift($elements); // Removing the first elements (not interesting)

        $words = [];
        foreach ($elements as $element) {
            $sentence = substr($element, 0, strpos($element, '</span>') + 1);
            $clean = html_entity_decode(strip_tags($sentence));

            if (false !== $pos = strpos($clean, $query)) {
                $next = substr($clean, $pos + strlen($query));
                $exWords = explode(' ', trim($next));

                $words[] = implode(' ', array_chunk($exWords, 4)[0]);
            }
        }

        return $words;
    }
}
