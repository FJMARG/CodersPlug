<?php 
	class ProfileRepository{
		public static function agregarPerfilUsuario($id,$sexo, $telefono, $descripcion, $tAnt, $tAct, $foto, $fnac, $cuil, $dni, $rubro, $region, $nick, $direccion){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("INSERT INTO perfil (sexo, telefono, descripcion, trabajos_anteriores, trabajos_actuales, foto, fecha_nacimiento, cuil_cuit, dni, rubro, usuario_id, region, nick, direccion) VALUES (:sexo, :tel, :descr,:trAnt, :trAct, :foto, :fecNac, :cuil, :dni, :rubro, :uid, :region, :ni, :dir)");
			$query->bindParam(":sexo",$sexo,PDO::PARAM_STR);
			$query->bindParam(":tel",$telefono,PDO::PARAM_STR);
			$query->bindParam(":descr",$descripcion,PDO::PARAM_STR);
			$query->bindParam(":trAnt",$tAnt,PDO::PARAM_STR);
			$query->bindParam(":trAct",$tAct,PDO::PARAM_STR);
			$query->bindParam(":foto",$foto,PDO::PARAM_STR);
			$query->bindParam(":fecNac",$fnac,PDO::PARAM_STR);
			$query->bindParam(":cuil",$cuil,PDO::PARAM_STR);
			$query->bindParam(":dni",$dni,PDO::PARAM_STR);
			$query->bindParam(":rubro",$rubro,PDO::PARAM_STR);
			$query->bindParam(":uid",$id,PDO::PARAM_INT);
			$query->bindParam(":region",$region,PDO::PARAM_STR);
			$query->bindParam(":ni",$nick,PDO::PARAM_STR);
			$query->bindParam(":dir",$direccion,PDO::PARAM_STR);
			return $query->execute();
		}
	}
?>