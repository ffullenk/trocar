<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);

new sfDatabaseManager($configuration);
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/fixtures.yml');	

$t = new lime_test(4);
$t->comment('->getUserHaveList()');
$t->comment('1 ->getUserHaveList() - Non existing user');
$have1 = Havelist::getUserHaveList(0);
$t->is($have1->count(),0, "Null user have 0 products");

$t->comment('2 -> getUserHaveList() - Existing user with have_list, User:admin@trocar.cl, requeriment: have a have_list');
$q = $query = Doctrine_Core::getTable('sfGuardUser')
                        ->createQuery('u')
                        ->select('u.id')
                        ->where('u.username= ?', 'admin@trocar.cl');
$user = $q->fetchOne();
$have2 = Havelist::getUserHaveList($user->getId());
$t->isnt($have2->count(),0,"Return > 0 for existing user with have list");

$t->comment('2 - getProductsToSwapFor()');
$t->comment('2.1 - Non existing Id');
$productsWant = Doctrine_Core::getTable('Havelist')->getProductsToSwapFor('-1');
$t->is($productsWant->count(),0);

$t->comment('2.2 - Valid Id');
$product = Doctrine_Core::getTable('Product')->createQuery('p')->select('p.*')->fetchOne();
$productsWant_2 = Doctrine_Core::getTable('Havelist')->getProductsToSwapFor($product->getId());
$t->isnt($productsWant_2->count(),0,sprintf('Number of products is (%d) ',$productsWant_2->count()));
