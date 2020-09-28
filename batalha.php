<?php
	
	$iniciativa_human = rand(1,20)+2;
	$iniciativa_orc = rand(1,20)+0;
	$vitoria = null;
	$mensagem = null;
	
	$again = 0;
	
	session_start();
	
		
	while($again = 0){
		if($iniciativa_human == $iniciativa_orc){
			$iniciativa_human = rand(1,20)+2;
			$iniciativa_orc = rand(1,20)+0;
		}else{
			$again = 1;
		}
	}
	
	if($iniciativa_human > $iniciativa_orc){

		$disabled_human = null;
		$disabled_orc = "disabled";

	}else{

		$disabled_human = "disabled";
		$disabled_orc = null;
	}
	
	
	$humano = 2;
	$orc = 1;
	
	$pv[$orc] = 20;
	$pv[$humano] = 12;
	
	$atk[$humano] = 2;
	$dano_arma[$humano] = rand(1,6);
	
	$atk[$orc] = 1;
	$dano_arma[$orc] = rand(1,8);
	
	$forca[$humano] = 1;
	$forca[$orc] = 2;
	
	$def[$humano] = 1;
	$def[$orc] = 0;
	
	$agilidade[$humano] = 2;
	$agilidade[$orc] = 0;
	
	if(isset($_GET["vez"])){
		if($_GET["vez"] == base64_encode("humano") ){
			$disabled_human = null;
			$disabled_orc = "disabled";
			
			$dado_ataque = rand(1,20);
			$dado_defesa = rand(1,20);
			
			$ataque = $dado_ataque+$agilidade[$orc]+$atk[$orc];
			$defesa = $dado_defesa+$agilidade[$humano]+$def[$humano];
			
			if($ataque > $defesa){
				$mensagem = "D20 de ataque $dado_ataque X D20 de defesa $dado_defesa <br>Orc acertou Humano <br>";
				$dano = $dano_arma[$orc]+$forca[$orc];
				$mensagem .= "D8 ".$dano_arma[$orc]." <br>Dano +$dano";
				$_SESSION["lp_human"] = $_SESSION["lp_human"]-$dano;
				
				if($_SESSION["lp_human"] <= 0)
					$vitoria = "Orc";
				
			}else{
				$mensagem = "Orc errou Humano <br>";
			}
		}else{
			$disabled_human = "disabled";
			$disabled_orc = null;
			
			$dado_ataque = rand(1,20);
			$dado_defesa = rand(1,20);
			
			$defesa = $dado_ataque+$agilidade[$orc]+$atk[$orc];
			$ataque = $dado_defesa+$agilidade[$humano]+$def[$humano];
			
			if($ataque > $defesa){
				$mensagem = "Humano acertou Orc <br>";
				$dano = $dano_arma[$humano]+$forca[$humano];
				$mensagem .= "D6 ".$dano_arma[$humano]."<br> Dano +$dano";
				$_SESSION["lp_orc"] = $_SESSION["lp_orc"]-$dano;
				
				if($_SESSION["lp_orc"] <= 0)
					$vitoria = "Humano";
			}else{
				$mensagem = "Humano errou Orc <br>";
			}
		}
		
	}else{
		$_SESSION["lp_orc"] = 20;
		$_SESSION["lp_human"] = 12;
	}
	
	if($vitoria != ""){
		$disabled_human = "disabled";
		$disabled_orc = "disabled";
	}
	
?>
