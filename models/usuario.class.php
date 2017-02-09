<?php
class Usuario 
{
	
	var $idUsuario; 
	var $nombre; 
	var $apellido; 
	var $telefono; 
	var $email; 
	var $user; 
	var $password; 
	var $gerarquia; 

	function Usuario($_id=0) 
	{
		if ($_id<>0) 
		{
		$conn = new Conexion();

		$sql = $conn->prepare("select * from usuarios where idUsuario=:ID"); 
		$sql->execute(array('ID' => $_id));
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);	
		$this->idUsuario = $datos_carga['idUsuario']; 
		$this->nombre = $datos_carga['nombre']; 
		$this->apellido = $datos_carga['apellido']; 
		$this->telefono = $datos_carga['telefono']; 
		$this->email = $datos_carga['email']; 
		$this->user = $datos_carga['user']; 
		$this->password = $datos_carga['password']; 
		$this->gerarquia = $datos_carga['gerarquia']; 
		}
	}
	 function save() 
	 {//Guarda o inserta segun corresponda
		$conn = new Conexion();

		if ($this->idUsuario<>0) 
			{ 
				$sql = $conn->prepare("update usuarios set nombre = '$this->nombre', apellido = '$this->apellido', telefono = '$this->telefono', email = '$this->email', user = '$this->user', password = '$this->password', gerarquia = '$this->gerarquia' where idUsuario=$this->idUsuario"); 
				$sql->execute();

			}
			else
			{
			 $sql = $conn->prepare("insert into usuarios values (null, '$this->nombre', '$this->apellido', '$this->telefono', '$this->email', '$this->user', '$this->password', '$this->gerarquia')");
				$sql->execute();
				$this->id = $conn->lastInsertId();

			}
	}

	function erase()
		{//Borra el CONTACTO, segun el ID, 
		if ($this->idUsuario<>0)
			{
				$conn = new Conexion();
				$sql = $conn->prepare("DELETE FROM usuarios WHERE idUsuario = $this->idUsuario ");
				$sql->execute();
				$sql=null;
				$conn=null;
			}
		
		}


	/*------------------------------------------------------------------------*/
	/* Metodo NUEVO USUARIO : realiza el ingreso de nuevo, validando que los datos ingresados sean validos, 
	/*retornando TRUE en el caso de que pudo ser creado; o False en el caso contrario.
	/*------------------------------------------------------------------------*/		
	function nuevo_usuario($_PARAM)
		{
//		$nombreyapellido = mysql_num_rows( mysql_query ("Select idUsuario From usuarios WHERE nombre = '" .$_PARAM["nombre"]."' AND  apellido = '".$_PARAM["apellido"]."'"));
//		$email = mysql_num_rows( mysql_query ("Select idUsuario From usuarios WHERE email = '" .$_PARAM["email"]."'"));		
	//	$usuario= mysql_num_rows( mysql_query ("Select idUsuario From usuarios WHERE user = '" .$_PARAM["user"]."'"));

	//	if(

	//			$nombreyapellido == 0	AND	
	//			$email == 0	AND
	//			$usuario == 0		
	//		)	
	//		{
	//				echo "entro aca"; die();
			$usuario = new Usuario ();
			$usuario->set_nombre($_PARAM['nombre']);
			$usuario->set_apellido($_PARAM['apellido']);
			$usuario->set_telefono($_PARAM['telefono']);
			$usuario->set_email($_PARAM['email']);
			$usuario->set_user($_PARAM['usuario']);
			$usuario->set_password($_PARAM['pass']);
			$usuario->set_gerarquia($_PARAM['gerarquia']);
			$usuario->save();
	//		}	
			
		}

	/*FUNCION VERFICADORA DE ADMIN AND PASSWORD*/
	function login_admin($_user,$_password)
		{
		$conn = new Conexion();

		$sql = $conn->prepare("select idUsuario from usuarios where user = '$_user' AND password = '$_password'");
		$sql->execute();
		$resultado = $sql->fetch(PDO::FETCH_ASSOC);	

		if($resultado):
			return($resultado["idUsuario"]);
		else:
			return(false);
		endif;	

		}

	/*------------------------------------------------------------------------*/
	/* Metodo que  devuelve el listado de todos los usuarios
	/*------------------------------------------------------------------------*/
	function get_usuarios($start, $end)
	{
		$conn = new Conexion();

		$sql = $conn->prepare("Select * from usuarios order by apellido,nombre LIMIT " . $start . ", " . $end);
		$sql->execute();
		$usuarios = array();
		$result_listado = $sql->fetchAll();
		foreach($result_listado as $dato_usuario):
			$usuarios[] = new Usuario($dato_usuario["idUsuario"]);
		endforeach;	

		$sql=null;
		$conn=null;

		return($usuarios);
	}

	function total_usuarios()
	{
		$conn = new Conexion();

		$sql = $conn->prepare("select count(idUsuario) from usuarios");
		$sql->execute();
		$resultado = $sql->fetch(PDO::FETCH_ASSOC);	

		$sql=null;
		$conn=null;

		return($resultado);

	}


	
	/*------------------------------------------------------------------------*/
	/* Funcion que retorna un booleano indicando si el usuario es Aministrador
	/*------------------------------------------------------------------------*/
	function es_administrador()
		{
		if ($this->gerarquia==1)
			{
			return true;
			}
		else
			{
			return false;
			}
		}
	
	/*---GETTERS--------------------------------------------------------------*/ 


	/*---Funcion, que devuelve el nombre completo del usuario--------------   */
	function get_nombre_completo ()
	{
	 return($this->nombre ." ".  $this->apellido);

	}

	function get_idUsuario() { 
		return($this->idUsuario); 
	}
	function get_nombre() { 
		return($this->nombre); 
	} 
	function get_apellido() {
		return($this->apellido); 
	}
	function get_telefono() {
		return($this->telefono); 
	} 
	function get_email() {
		return($this->email); 
	} 
	function get_user() { 
		return($this->user); 
	}
	function get_password() {
		return($this->password); 
	}
	function get_gerarquia() {
		return($this->gerarquia); 
	}
	/*------------------------------------------------------------------------*/ /*---SETTERS--------------------------------------------------------------*/ 
	function set_idUsuario($_idUsuario) {
		$this->idUsuario = $_idUsuario; 
	}
	function set_nombre($_nombre) {
		$this->nombre = $_nombre; 
	}
	function set_apellido($_apellido) {
		$this->apellido = $_apellido; 
	}
	function set_telefono($_telefono) {
		$this->telefono = $_telefono; 
	}
	function set_email($_email) {
		$this->email = $_email; 
	}
	function set_user($_user) {
		$this->user = $_user; 
	}
	function set_password($_password) {
		$this->password = $_password; 
	}
	function set_gerarquia($_gerarquia) {
		$this->gerarquia = $_gerarquia; 
	}
	/*------------------------------------------------------------------------*/ 
}

?>