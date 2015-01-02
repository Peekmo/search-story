<?php

/**
 * @author Axel Anceau <Peekmo>
 */
 namespace Peekmo\Story\Interfaces;

/**
* Interface which defines rules to apply on words
*/
interface RuleInterface
{
  /**
   * Method called to check if the words are authorized in the sentence
   *
   * @param string $sentence Sentence analyzed
   * @param string $words    Words to add the sentence
   */
  public function authorized($sentence, $words);
}
