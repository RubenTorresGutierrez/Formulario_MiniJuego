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
						'VALUES("'.$datos['minijuego'].'", "'.$datos['nick'].'", '.$datos['puntos'].', CURRENT_TIMESTAMP);';
			
			// Mandar la consulta a la Clase Conexion
			$this->conexion->consultar($consulta);

		}

		function comprobarFilas($datos){

			//Consulta SQL para comprobar la cantidad de filas que hay en la tabla partida
			$consulta = 'SELECT idPartida FROM partida';

			// Mandar la consulta a la Clase Conexion
			$this->conexion->consultar($consulta);

			// Comprobar si tiene menos de 10 filas
			if($this->conexion->numeroFilas() < 10)
				$this->altaPartida($datos);
			else $this->modificarPartida($datos);

		}

		function modificarPartida($datos){

			//Consulta SQL para comprobar la cantidad de filas que hay en la tabla partida
			$consulta = 'UPDATE partida SET'.
						'idJuego = $idJuego, nick = $nick, puntuacion = $puntuacion, fechaHora = CURRENT_TIMESTAMP'.
						'WHERE idPartida = (SELECT idPartida FROM partida WHERE puntuacion = MIN(puntuacion))'.
						AND
							puntuacion > (
								SELECT
									MIN(puntuacion)
								FROM
									partida
							)
						;

		}

	}