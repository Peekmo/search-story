<?php

 /**
 * @author Axel Anceau <Peekmo>
 */
 namespace Peekmo\Story\Interfaces;

 /**
  * Interface which defines to analyze and modify words
  */
 interface AnalyzerInterface
 {
    /**
     * Method called to analyze the group of words to add to the sentence.
     * Words to add can be modify through this methods
     *
     * @param string $sentence Sentence analyzed
     * @param string $words    Words to add the sentence
     */
    public function analyze($sentence, &$words);
 }
