<?php
include_once('../PDO/personas_modelo.php');

if(isset($_POST["h_operacion"]))
{
	// Verifico que "operacion" sea igual a "agregar"
	if($_POST["h_operacion"] === "Agregar")
	{
		$id_persona_ingredada  = Personas_Model::Agregar_Persona_Static(
			$_POST["txt_cedula"],
			$_POST["txt_primer_nombre"],
			$_POST["txt_segundo_nombre"],
			$_POST["txt_primer_apellido"],
			$_POST["txt_segundo_apellido"],
			date("Ymd", strtotime($_POST["txt_fecha_nac"]))
		);	

		if(!empty($id_persona_ingredada)){

			if($id_persona_ingredada > 0)
				echo "Datos Ingresados con Éxito";
			else
				echo "Error: " . $id_persona_ingredada;
		}
					
	}

	if($_POST["h_operacion"] === "Editar"){

		$pm = new Personas_Model();
		$persona_modificada = $pm->Modificar_Persona(
			$_POST["txt_cedula"],
			$_POST["txt_primer_nombre"],
			$_POST["txt_segundo_nombre"],
			$_POST["txt_primer_apellido"],
			$_POST["txt_segundo_apellido"],
			date("Ymd", strtotime($_POST["txt_fecha_nac"])),
			$_POST["h_persona_id"]
		);

		if(!empty($persona_modificada)){

			if($persona_modificada > 0)
				echo "Datos Modificados con Éxito";
			else
				echo "Error: " . $persona_modificada;
		}
		
	}
}



?>