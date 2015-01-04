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

    public function run($query, $params)
    {
        echo $query . ' ';

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
            foreach ($this->rules as $rule) {
                if ($rule->authorized($query, $word)) {
                    $finalWords[] = $word;
                }
            }
        }

        $this->run($finalWords[0], $params);
    }
}
