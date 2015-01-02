<?php

namespace Interfaces;

/**
* Interface called to check if the words are authorized in the sentence
*
* @param string $sentence Sentence analyzed
* @param string $words    Words to add the sentence
*/
interface RuleInterface
{
  public function authorized($sentence, $words);
}
