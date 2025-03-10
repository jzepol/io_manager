<?php  

	class User{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function getByEmail($email){
			$email =  $this->db->deleteSpecialChars($email,'email'); 
			$this->db->query('SELECT * FROM  plataforma_upro.empleados WHERE email = :email');
			$this->db->bind(':email', $email);

			$response = $this->db->getRecord();
			return $response;
		}

		public function userRecord($param){
			$this->db->query('INSERT INTO user (user_nick, user_email, user_password) VALUES (:user_nick, :user_email, :user_password)');
			# Link values
			$this->db->bind(':user_nick', $param['user-nick']);
			$this->db->bind(':user_email', $param['user-email']);
			$this->db->bind(':user_password', $param['user-password']);
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}

		public function getUsers(){
			$this->db->query('
				SELECT empleado.documento as "documento", empleado.apellido as "apellido", empleado.nombres as "nombres", empleado.telefono as "telefono", empleado.email as "email", empleado.status as "status", areas.nombre as "areas_nombre"
				FROM plataforma_upro.empleados empleado
				JOIN plataforma_upro.areas areas on areas.id = empleado.area_id
				ORDER BY apellido ASC
			'); 
			return $this->db->getRecords();;
		}

		public function getUserId($documento){
			$this->db->query('SELECT empleado.id, empleado.documento FROM plataforma_upro.empleados empleado WHERE empleado.documento = :documento');
			$this->db->bind(':documento', $documento);
			
			return ($this->db->getRecord())->id;
		}

		public function create($param){
			$this->db->query('
				INSERT INTO plataforma_upro.empleados (nombres, apellido, documento, email, telefono, contrasena, area_id, rol_id) 
				VALUES (:nombres, :apellido, :documento, :email, :telefono, :contrasena, :area, :rol)
			');
			$this->db->bind(':nombres',$param['nombre']);
			$this->db->bind(':apellido',$param['apellido']);
			$this->db->bind(':documento',$param['documento']);
			$this->db->bind(':email',$param['email']);
			$this->db->bind(':telefono',$param['telefono']);
			$this->db->bind(':contrasena', password_hash($param['documento'], PASSWORD_BCRYPT, ['cost' => 12]));
			$this->db->bind(':area',intval($param['area']));
			$this->db->bind(':rol',intval($param['rol']));

			return $this->db->execute();
		}
	}