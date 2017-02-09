<?php
class Vendedor
{
	var $id; 
	var $nombre; 
	var $direccion; 
	var $telefono; 
	var $comision; 
	var $activo; 
	
	function Vendedor($_id=0) 
	{
		if ($_id<>0)
		{ 
		$query_carga= "select * from vendedores where id=$_id"; 
		$result_carga = mysql_query($query_carga); 
		$datos_carga = mysql_fetch_assoc($result_carga); 
		$this->id = $datos_carga['id']; 
		$this->nombre = $datos_carga['nombre']; 
		$this->direccion = $datos_carga['direccion']; 
		$this->telefono = $datos_carga['telefono']; 
		$this->comision = $datos_carga['comision']; 
		$this->activo = $datos_carga['activo']; 
		} 
	}
	
	function save() 
	{//Guarda o inserta segun corresponda 
		if ($this->id<>0)
			{ 
			$query_save = "update vendedores set nombre = '$this->nombre', direccion = '$this->direccion', telefono = '$this->telefono', comision = '$this->comision', activo = '$this->activo' where id='$this->id'"; 
			mysql_query($query_save) or die(mysql_error()); 
			}
		else
			{ 
			$query_save = "insert into vendedores values (null, '$this->nombre', '$this->direccion', '$this->telefono', '$this->comision', '$this->activo')"; 
			mysql_query($query_save) or die(mysql_error()); 
			$this->id = mysql_insert_id(); 
			} 
	}

	function erase()
		{//Borra el CONTACTO, segun el ID, 
		if ($this->id<>0)
			{
				$query_erase = "DELETE FROM vendedores WHERE id = $this->id ";
				mysql_query($query_erase) or die(mysql_error());
			}
		
		}	

	function nuevo_vendedor($_PARAM, $_idtipo)
	{
		$vendedor = new Vendedor ();
		$vendedor->set_nombre($_PARAM['nombre']);
		$vendedor->set_direccion($_PARAM['direccion']);
		$vendedor->set_telefono($_PARAM['telefono']);
		$vendedor->set_comision($_PARAM['comision']);
		$vendedor->set_activo(1);
	
		$vendedor->save();
	
	}


	function get_vendedores($start=0, $end=0)
	{
		if($start==0 and $end== 0)	$limit ="" ; else $limit = "LIMIT $start , $end";

		$query_listado = "Select * FROM vendedores order by id $limit";
		$result_listado = mysql_query($query_listado);
		$vendedores = array();
		while ($dato_vendedor = @mysql_fetch_assoc($result_listado))
		{
		$vendedores[] = new Vendedor($dato_vendedor["id"]);
		}
		@mysql_free_result($result_listado);
		return($vendedores);
	}

	function total_vendedores()
	{
	$query_all = "select id from vendedores";
	$result_all = mysql_query($query_all) or die(mysql_error());
	$nrows = mysql_num_rows($result_all);	
	return($nrows);
	}	


	function get_comisiones_vendedor($_id_vendendor)
	{
		$result = mysql_query("SELECT n_factura, comision_vendedor, CF.fecha, C.nombre FROM clientes_facturas as CF
								Inner join clientes as C ON C.id = CF.idCliente
								where C.idVendedor = $_id_vendendor and CF.idTipo = 1");
			
		$comisiones = array();
		while($row = @mysql_fetch_assoc($result))
		{
		$comisiones[] = $row;
		}
		@mysql_free_result($result);
		return($comisiones);  	
	
	
	}


	/*---GETTERS--------------------------------------------------------------*/ 
	function get_id() { return($this->id); } 
	function get_nombre() { return($this->nombre); } 
	function get_direccion() { return($this->direccion); } 
	function get_telefono() { return($this->telefono); } 
	function get_comision() { return($this->comision); } 
	function get_activo() { return($this->activo); } 
	/*------------------------------------------------------------------------*/ 
	
	/*---SETTERS--------------------------------------------------------------*/ 
	function set_id($_id) { $this->id = $_id; } 
	function set_nombre($_nombre) { $this->nombre = $_nombre; } 
	function set_direccion($_direccion) { $this->direccion = $_direccion; } 
	function set_telefono($_telefono) { $this->telefono = $_telefono; } 
	function set_comision($_comision) { $this->comision = $_comision; } 
	function set_activo($_activo) { $this->activo = $_activo; } 
	
	/*------------------------------------------------------------------------*/ 

}//end class 


?>