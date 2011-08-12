<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);

new sfDatabaseManager($configuration);
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/fixtures.yml');	

$t = new lime_test(2);

$t->comment('2 - getWaitingTrades()');
$t->comment('2.1 - Non existing Id');
$trades = Doctrine_Core::getTable('Trade')->getWaitingTrades(3);
$t->is($trades->count(),0);

$t->comment('2.2 - Valid Id');
$trades_2 = Doctrine_Core::getTable('Trade')->getWaitingTrades(4);
$t->isnt($trades_2->count(),0,sprintf('Number of tades is (%d) ',$trades_2->count()));
