<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story\Analyzers;

class DotAnalyzer implements AnalyzerInterface
{
    /**
    * Method called to analyze the group of words to add to the sentence.
    * Words to add can be modify through this methods
    *
    * Split the words if there's a dot "."
    *
    * @param string $sentence Sentence analyzed
    * @param string $words    Words to add the sentence
    */
    public function analyze($sentence, &$words)
    {

    }
}
