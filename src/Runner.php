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
    protected $parsers;

    /**
     * @var AnalyzerInterface[]
     */
    protected $analyzers;

    /**
     * @var RuleInterface[]
     */
    protected $rules;

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
                            $this->rule[] = new $class();
                            break;
                        default:
                            throw new \InvalidArgumentException(sprintf('Unknow %s type', $type));
                    }
                }
            }
        }
    }

    public function run()
    {
        die('ok');
    }
}
