<?php 

	class Elecciones extends Controller{
		private $eleccionModel;
		public function __construct(){
			parent::__construct();
			$this->eleccionModel  = $this->model('Eleccion'); 
		}

		public function index(){
            
        }

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' ){
				$_POST = json_decode(file_get_contents("php://input") , true); 		
				return $this->userModel->create($_POST);  
			}

		public function store(){}

		public function show(){}

		public function edit(){}

		public function update(){}

		public function delete(){}
	}

?>