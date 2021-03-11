<?php
class operative_handler {
	private $operatives = array(
		// Add operatives below. Additional properties can be added. Update $this->return_dossier and command_dossier.php to include these properties.
		'USERNAME1' => array(
			'alias' => 'ALIAS',
			'password' => 'PASSWORD',
			'name' => 'NAME',
			'status' => 'ACTIVE|TERMINATED',
			'species' => 'SPECIES',
			'gender' => 'GENDER'
		),
		'USERNAME2' => array(
			'alias' => 'ALIAS',
			'password' => 'PASSWORD',
			'name' => 'NAME',
			'status' => 'ACTIVE|TERMINATED',
			'species' => 'SPECIES',
			'gender' => 'GENDER'
		)
	);
	
	
	public function return_dossier($operative) {
		if(is_array($this->operatives[$operative])) {
			$dossier = array(
				'alias' => $this->operatives[$operative]['alias'],
				'name' => $this->operatives[$operative]['name'],
				'status' => $this->operatives[$operative]['status'],
				'species' => $this->operatives[$operative]['species'],
				'gender' => $this->operatives[$operative]['gender']
			);
			
			return $dossier;
		}
		else {
			return false;
		}
	}
	
	
	public function return_operatives($status = 'all') {
		$operatives = array();
		
		foreach($this->operatives as $value) {
			if($status == 'all' || $status == $value['status']) {
				$operatives[] = array(
					'alias' => $value['alias'],
					'status' => $value['status']
				);
			}
		}
		
		return $operatives;
	}
	
	
	public function check_credentials($operative, $password) {
		if($this->operatives[$operative]['password'] == $password && $this->operatives[$operative]['status'] == 'ACTIVE') {
			return true;
		}
		else {
			return false;
		}
	}
}
?>