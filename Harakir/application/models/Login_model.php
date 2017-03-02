<?php

class Login_model extends CI_Model{
	public function __construct(){
        $this->load->database();
    }
    public function get_usuarios(){
        $query=$this->db->query('SELECT * FROM usuarios ORDER BY puntos DESC LIMIT 10;');
        return $query->result_array();
	}
	public function buscar_usuario($nom, $clave){
		$query = $this->db->get_where('usuarios', array('nombre' => $nom, 'clave' => $clave));
		
		if(($query->row_array())==NULL){
			$puntos = 0;
			$role = 'usu';
			$data = array('nombre' => $nom,'clave' => $clave,'puntos' => $puntos,'role' => 'usu');
			$this->db->insert('usuarios', $data);
			return $data;
    	}else{
    		return $query->row_array();
   		}			
	}
	public function actualizar_usuario($nom, $clave, $puntos){
		$data = array(
        'nombre' => $nom,
        'clave' => $clave,
        'puntos' => $puntos,
        'role' => 'usu'
		);

		$this->db->where('clave', $clave);
		$this->db->update('usuarios', $data);
		/*$data = array(
        'nombre' => $nom,
        'clave'  => $clave,
        'puntos'  => $puntos,
        'role' => 'usu'
		);

		$this->db->replace('usuarios', $data);*/
	}
}
