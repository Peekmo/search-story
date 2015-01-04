<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Rules;

use Peekmo\Story\Interfaces\RuleInterface;

class LettersAndDigitsRule implements RuleInterface
{
    /**
    * Interface called to check if the words are authorized in the sentence
    *
    * Checks if there's special characters not allowed in $words
    *
    * @param string $sentence Sentence analyzed
    * @param string $words    Words to add the sentence
    *
    * @return bool
    */
    public function authorized($sentence, $words)
    {
        return 0 !== preg_match('/^([a-zA-Z \.,_-])+$/i', $words);
    }
}
