<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Rules;

class FrenchDictionaryRule implements RuleInterface
{
    /**
    * Interface called to check if the words are authorized in the sentence
    *
    * Checks for a forbidden french word in $words
    *
    * @param string $sentence Sentence analyzed
    * @param string $words    Words to add the sentence
    *
    * @return bool
    */
    public function authorized($sentence, $words)
    {

    }
}
