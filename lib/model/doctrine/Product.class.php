<?php

/**
 * Product
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    trocar
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Product extends BaseProduct
{
	
	public function usuarioHasWantedProduct($userId)
	{
		$q = Doctrine_Core::getTable('WantList')
		->createQuery('c')
		->where('c.user_id = ?', $userId)
		->andWhere('c.product_id = ?',  $this->getId());
		
		$resultado = $q->execute();
		
		if($resultado->count() == 0)return false;
		else return true;
		
	}
	public function usuarioHasProduct($userId){
		$q = Doctrine_Core::getTable("HaveList")
		->createQuery('c')
		->where('c.user_id = ?', $userId)
		->andWhere('c.product_id = ?', $this->getId());
		
		$resultado = $q->execute();
		
		return ($resultado->count() != 0);
		
		
		}
		/*
		public function save(Doctrine_Connection $conn = null)
		{  
		  $conn = $conn ? $conn : ProductTable::getConnection();
		  $conn->beginTransaction();
		  try
		  {
		    $ret = parent::save($conn);
		 
		    $this->updateLuceneIndex();
		 
		    $conn->commit();
		 
		    return $ret;
		  }
		  catch (Exception $e)
		  {
		    $conn->rollBack();
		    throw $e;
		  }
	}
	
	public function delete(Doctrine_Connection $conn = null)
	{
	  $index = ProductTable::getLuceneIndex();
	 
	  if ($hit = $index->find('pk:'.$this->getId()))
	  {
	    $index->delete($hit->id);
	  }
	 
	  return parent::delete($conn);
		}
		
		
	public function updateLuceneIndex()
	{
	  $index = ProductTable::getLuceneIndex();
	 
	  // remove an existing entry
	  if ($hit = $index->find('pk:'.$this->getId()))
	  {
	    $index->delete($hit->id);
	  }
	 
	  // don't index expired and non-activated jobs
	  if ($this->isExpired() || !$this->getIsActivated())
	  {
	    return;
	  }
	 
	  $doc = new Zend_Search_Lucene_Document();
	 
	  // store job primary key URL to identify it in the search results
	  $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk', $this->getId()));
	 
	  // index job fields
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('name', $this->getName(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('description', $this->getDescription(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('picture', $this->getPicture(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('link', $this->getLink(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('youtube', $this->getYoutube(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('brand', $this->getBrand(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('model', $this->getModel(), 'utf-8'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('category', $this->getCategory()->getName(), 'utf-8'));
			  
	  // add job to the index
	  $index->addDocument($doc);
	  $index->commit();
	}

	*/
		
		
		
}
