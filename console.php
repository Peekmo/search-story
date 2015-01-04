<?php

 /**
 * @author Axel Anceau <Peekmo>
 */
 require_once('vendor/autoload.php');

 require_once('config/app.php');
 require_once('config/config.php');

 use Symfony\Component\Console\Application;
 use Peekmo\Story\Config;
 use Peekmo\Story\Runner;

 foreach($parsers as $name => $infos) {
     Config::add('parser', $name, $infos['description'], $infos['namespace']);
 }

 foreach($analyzers as $name => $infos) {
     Config::add('analyzer', $name, $infos['description'], $infos['namespace']);
 }

 foreach($rules as $name => $infos) {
     Config::add('rule', $name, $infos['description'], $infos['namespace']);
 }

 $runner = new Runner($config);
 $runner->run("Il était une fois", array('lang' => 'fr'));

 // $console = new Application();
 // $console->run();
