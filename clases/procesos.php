<?php

    // IMPORTACIONES
    require_once 'conexion.php';


    class Procesos{

	//ATRIBUTOS
	private $conexion = null;

	    function __construct(){

		$this->conexion = new Conexion();

	    }

	    function altaPartida($datos){

		//Consulta SQL para añadir una fila nueva a la tabla partida
		$consulta = 'INSERT INTO partida(idJuego, nick, puntuacion, fechaHora)'.
			    'VALUES('.$datos['minijuego'].', "'.$datos['nick'].'", '.$datos['puntos'].', CURRENT_TIMESTAMP);';

		// Mandar la consulta a la Clase Conexion
		$this->conexion->consultar($consulta);

	    }

	    function comprobarFilas($datos){

		//Consulta SQL para comprobar la cantidad de filas que hay en la tabla partida
		$consulta = 'SELECT COUNT(idPartida) FROM partida';

		// Mandar la consulta a la Clase Conexion
		$this->conexion->consultar($consulta);

		//Obtener filas
		$filas = $this->conexion->extraerFila();

		// Comprobar si tiene menos de 10 filas
		if($filas < 10)
			$this->altaPartida($datos);
		else $this->modificarPartida($datos);

	    }

	    function modificarPartida($datos){

		//Consulta SQL para comprobar la cantidad de filas que hay en la tabla partida
		$consulta = 'UPDATE partida SET '.
			    'nick = "'.$datos['nick'].'", puntuacion = '.$datos['puntos'].', fechaHora = CURRENT_TIMESTAMP '.
			    'WHERE idPartida = (SELECT idPartida FROM partida HAVING MIN(puntuacion)) '.
			    'AND '.$datos['puntos'].' > (SELECT MIN(puntuacion) FROM partida);';

		// Mandar la consulta a la Clase Conexion
		$this->conexion->consultar($consulta);

	    }

    }
