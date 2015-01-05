<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story;

use Peekmo\Story\Config;
use Peekmo\Story\Interfaces\ParserInterface;
use Peekmo\Story\Interfaces\AnalyzerInterface;
use Peekmo\Story\Interfaces\RuleInterface;

/**
 * Main class.
 * Runs all the process
 */
class Runner
{
    /**
     * @var ParserInterface[]
     */
    protected $parsers = [];

    /**
     * @var AnalyzerInterface[]
     */
    protected $analyzers = [];

    /**
     * @var RuleInterface[]
     */
    protected $rules = [];

    /**
     * Initialize rules, parsers & analyzers containers
     * @param array $config Config of wanted parsers, rules & analyzers
     */
    public function __construct(array $config)
    {
        foreach ($config as $type => $tokens) {
            foreach ($tokens as $token) {
                $data = Config::get($type, $token);

                if (!empty($data)) {
                    $class = $data['class'];

                    switch ($type) {
                        case 'parser':
                            $this->parsers[] = new $class();
                            break;
                        case 'analyzer':
                            $this->analyzers[] = new $class();
                            break;
                        case 'rule':
                            $this->rules[] = new $class();
                            break;
                        default:
                            throw new \InvalidArgumentException(sprintf('Unknow %s type', $type));
                    }
                }
            }
        }
    }

    public function run($query, $words, $params)
    {
        $text = $query;
        echo $text;
        while(str_word_count($text) < $words) {
            $value = '';
            while ('' === $value = $this->execute($query, $params)) {
                $exWords = explode(' ', $query);
                array_shift($exWords);
                $query = implode(' ', $exWords);
            }

            $text .= ' ' . $value;

            $sub = explode(' ', substr($text, strlen($text) < 100 ? 0 : strlen($text)-100));
            $query = '';
            for ($i=0; $i<3; $i++) {
                $query = array_pop($sub) . ' ' . $query;
            }

            $query = str_replace(['.',',',';','...'], '', $query);
            echo ' ' . $value;
        }
    }

    /**
     * Executes a search
     * @param string $query  Words searched
     * @param array  $params Search parameters
     * @return string
     */
    private function execute($query, $params)
    {
        $words = array();
        foreach ($this->parsers as $parser) {
            $result = $parser->get($query, $params);

            $words = array_merge($words, $parser->parse($query, $result));
        }

        $finalWords = array();
        foreach ($words as $word) {
            // Analyzers on words
            foreach ($this->analyzers as $analyzer) {
                $analyzer->analyze($query, $word);
            }

            // Applying rules to words
            $authorized = true;
            foreach ($this->rules as $rule) {
                if (!$rule->authorized($query, $word)) {
                    $authorized = false;
                    break;
                }
            }

            if ($authorized) {
                $finalWords[] = $word;
            }
        }

        if (empty($finalWords)) {
            return '';
        }

        $index = rand(0, count($finalWords)-1);
        return $finalWords[$index];
    }
}
