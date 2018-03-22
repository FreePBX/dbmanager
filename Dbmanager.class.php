<?php
namespace FreePBX\modules;
/*
 * Class stub for BMO Module class
 * In _Construct you may remove the database line if you don't use it
 * In getActionbar change extdisplay to align with whatever variable you use to decide if the page is in edit mode.
 *
 */

class Dbmanager extends \DB_Helper implements \BMO {
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}
		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
		$this->defaults = [
			'id' => 'new',
			'description' => '',
			'host' => '127.0.0.1',
			'user' => 'root',
			'backups' => [],
		];
	}
	//Install method. use this or install.php using both may cause weird behavior
	public function install() {}
	//Uninstall method. use this or install.php using both may cause weird behavior
	public function uninstall() {}
	//Not yet implemented
	public function backup() {}
	//not yet implimented
	public function restore($backup) {}
	//process form
	public function doConfigPageInit($page) {
		if($page == 'dbmanager'){
			if(isset($_POST['id'])){
			$id = ($_POST['id'] == 'new')?$this->generateID():$_POST['id'];
				foreach($this->defaults as $var => $default){
					if($var == 'description'){
						$this->setConfig($id,$val,'dblist');
					}
					$value = (!isset($_POST['var']) || empty($_POST['var']))?$default:$_POST[$var];
					$this->setConfig($var,$value,$id);
				}
			}
			if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
				$this->delete($_GET['id']);
			}
		}
	}
	public function generateId(){
		return \Ramsey\Uuid\Uuid::uuid4()->toString();
	}
	public function listAll(){
		$ret = [];
		$all = $this->getAll('dblist');
		if($all){
			foreach($all as $key => $val){
				$ret[] = ['id' => $key, 'description' => $val];	
			}
		}
		return $ret;
	}
	public function delete($id){
		$this->delById($_GET['id']);
		$this->delConfig($id,'dblist');
	}
	//This shows the submit buttons
	public function getActionBar($request) {
		$buttons = array();
		switch($_GET['display']) {
			case 'dbmanager':
				$buttons = array(
					'delete' => array(
						'name' => 'delete',
						'id' => 'delete',
						'value' => _('Delete')
					),
					'reset' => array(
						'name' => 'reset',
						'id' => 'reset',
						'value' => _('Reset')
					),
					'submit' => array(
						'name' => 'submit',
						'id' => 'submit',
						'value' => _('Submit')
					)
				);
				if (empty($_GET['extdisplay'])) {
					unset($buttons['delete']);
				}
			break;
		}
		return $buttons;
	}
	public function showPage(){
		if($_GET['view'] == 'form'){
			if(isset($_GET['id'])){
				$vars = $this->getAll($_GET['id']);
				$vars['id'] = $_GET['id'];
			}
			$vars = is_array($vars)?$vars:$this->defaults;
			$vars['backuplist'] = $this->generateSelectArray($vars['backups']);
			dbug($vars);
			return load_view(__DIR__.'/views/form.php',$vars);
		}
		return load_view(__DIR__.'/views/main.php',$vars);
	}
	public function ajaxRequest($req, &$setting) {
		switch ($req) {
			case 'getJSON':
				return true;
			break;
			default:
				return false;
			break;
		}
	}
	public function ajaxHandler(){
		switch ($_REQUEST['command']) {
			case 'getJSON':
				switch ($_REQUEST['jdata']) {
					case 'grid':
						return $this->listAll();
					break;

					default:
						return false;
					break;
				}
			break;

			default:
				return false;
			break;
		}
	}
	public function listBackups(){
		try{
			return $this->FreePBX->Backup->listBackups();
		}catch(\Exception $e){
			return [];
		}
		$this->FreePBX->Backup->listBackups();
	}
	public function generateSelectArray($id = []){
		$options = [];
		foreach($this->listBackups() as $backup){
			$options[] = [
				'value' => $backup['id'],
				'text' => $backup['name'],
				'selected' => (in_array($backup['id'],$id)?'SELECTED':''),
			];
		}
		return $options;
	}
	public function getRightNav($request) {
		$html = 'your custom html';
		return $html;
	}

}
