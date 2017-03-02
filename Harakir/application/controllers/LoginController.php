<?php
class LoginController extends CI_Controller {

	public function _contruct(){
		
		 parent::__construct();
                $this->load->model('login_model');
                $this->load->helper('url');
		//$this->load->library("sesion");
	}
    public function view(){
		if ( ! file_exists(APPPATH.'views/pages/login.php')){
                show_404();
        }
        $this->load->helper('url');
        $this->load->model('login_model');
		$data['title'] = 'Hara-kiri';

        if(isset($_REQUEST['salir'])){
        	//actualizar
        	$nom = $_POST['nombre'];
			$clave = $_POST['clave'];
			$puntos = $_POST['puntos'];

			$this->login_model->actualizar_usuario($nom,$clave,$puntos);
 			$this->load->view('templates/header', $data);
 			$this->load->view('pages/login', $data);
            $this->load->view('templates/footer', $data);
			return;
        }
        if(isset($_REQUEST['jugar'])){
        	//actualizar
        	$nom = $_POST['nombre'];
			$clave = $_POST['clave'];
			$puntos = $_POST['puntos'];

			$this->login_model->actualizar_usuario($nom,$clave,$puntos);

			$data['nombre'] = $nom;
			$data['puntos'] = $puntos;
			$data['clave'] = $clave;
			$this->load->view('pages/juego', $data);
			return;
        }

		# Si boton entrar y existe nombre con mas de 2 letras mostramos el juego
		if(isset($_REQUEST['entrar']) && isset($_POST['nombre']) && strlen($_POST['nombre'])>2){
			$nom = $_POST['nombre'];
			$clave = $_POST['clave'];

			$puntos = $this->login_model->buscar_usuario($nom, $clave);
			

			$data['nombre'] = $nom;
			$data['puntos'] = $puntos['puntos'];
			$data['clave'] = $puntos['clave'];
			$this->load->view('pages/juego', $data);
			
		}else{
		# Si es ranking llamamos a la bd y mostramos ranking.php
			if(isset($_REQUEST['ranking'])){
				
				$usuario['usuarios'] = $this->login_model->get_usuarios();

                $this->load->view('templates/header', $data);
                $this->load->view('pages/ranking', $usuario);
                $this->load->view('templates/footer', $data);
			}else{
		# Si no se cumple nada vuelve a salir la pantalla de login
				$this->load->view('templates/header', $data);
		        $this->load->view('pages/login', $data);
		        $this->load->view('templates/footer', $data); 
			}
		}
		     
    }
}