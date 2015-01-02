<?php

/**
 * @author Axel Anceau <Peekmo>
 */
 namespace Peekmo\Story\Interfaces;

interface RuleInterface
{
    /**
     * Interface called to check if the words are authorized in the sentence
     *
     * @param string $sentence Sentence analyzed
     * @param string $words    Words to add the sentence
     *
     * @return bool
     */
    public function authorized($sentence, $words);
}
