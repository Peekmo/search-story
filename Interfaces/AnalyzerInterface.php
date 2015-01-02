<?php

 namespace Interfaces;

 /**
  * Interface called to analyze the group of words to add to the sentence.
  * Words to add can be modify through this methods
  *
  * @param string $sentence Sentence analyzed
  * @param string $words    Words to add the sentence
  */
 interface AnalyzerInterface
 {
    public function analyze($sentence, &$words);
 }
