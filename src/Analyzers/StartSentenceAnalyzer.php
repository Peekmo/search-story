<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Analyzers;

use Peekmo\Story\Interfaces\AnalyzerInterface;

class StartSentenceAnalyzer implements AnalyzerInterface
{
    /**
    * Method called to analyze the group of words to add to the sentence.
    * Words to add can be modify through this methods
    *
    * First character in uppercase if sentence has endend with a dot.
    *
    * @param string $sentence Sentence analyzed
    * @param string $words    Words to add the sentence
    */
    public function analyze($sentence, &$words)
    {

    }
}
