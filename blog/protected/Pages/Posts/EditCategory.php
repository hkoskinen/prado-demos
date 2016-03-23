<?php
/**
 * EditCategory class file
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://github.com/pradosoft/prado
 * @copyright Copyright &copy; 2006-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado/blob/master/COPYRIGHT
 */

/**
 * EditCategory class
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link https://github.com/pradosoft/prado
 * @copyright Copyright &copy; 2006-2016 The PRADO Group
 * @license https://github.com/pradosoft/prado/blob/master/COPYRIGHT
 */
class EditCategory extends BlogPage
{
	private $_category;

	public function onInit($param)
	{
		parent::onInit($param);
		$id=TPropertyValue::ensureInteger($this->Request['id']);
		$this->_category=$this->DataAccess->queryCategoryByID($id);
		if($this->_category===null)
			throw new BlogException(500,'category_id_invalid',$id);
	}

	public function onLoad($param)
	{
		parent::onLoad($param);
		if(!$this->IsPostBack)
		{
			$this->CategoryName->Text=$this->_category->Name;
			$this->CategoryDescription->Text=$this->_category->Description;
		}
	}

	public function saveButtonClicked($sender,$param)
	{
		if($this->IsValid)
		{
			$this->_category->Name=$this->CategoryName->Text;
			$this->_category->Description=$this->CategoryDescription->Text;
			$this->DataAccess->updateCategory($this->_category);
			$this->gotoPage('Posts.ListPost',array('cat'=>$this->_category->ID));
		}
	}

	public function checkCategoryName($sender,$param)
	{
		$name=$this->CategoryName->Text;
		$param->IsValid=$this->DataAccess->queryCategoryByName($name)===null;
	}
}

