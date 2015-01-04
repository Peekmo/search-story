<?php

$analyzers = array(
    'dot'            => array(
        'namespace'   => 'Peekmo\\Story\\Analyzers\\DotAnalyzer',
        'description' => 'Search for a dot on words to remove following words'
    ),
    'start_sentence' => array(
        'namespace'   => 'Peekmo\\Story\\Analyzers\\StartSentenceAnalyzer',
        'description' => 'Adds an uppercase character if it\'s the start of a sentence'
    )
);

$parsers = array(
    'google' => array(
        'namespace'   => 'Peekmo\\Story\\Parsers\\GoogleParser',
        'description' => 'Search accross Google search'
    )
);

$rules = array(
    'french_dictionary'  => array(
        'namespace'   => 'Peekmo\\Story\\Rules\\FrenchDictionaryRule',
        'description' => 'Search for forbidden french words'
    ),
    'letters_and_digits' => array(
        'namespace'   => 'Peekmo\\Story\\Rules\\LettersAndDigitsRule',
        'description' => 'Search for other characters than letters and digits'
    )
);
