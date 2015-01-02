<?php

 /**
 * @author Axel Anceau <Peekmo>
 */
 require_once('vendor/autoload.php');

 use Symfony\Component\Console\Application;
 use Peekmo\Story\Interfaces\RuleInterface;

 $console = new Application();
 $console->run();
