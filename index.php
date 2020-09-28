<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RPG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="dist/css/cenario.css">
</head>
<body>
	<?php 
		include "batalha.php";
	?>
	<div id="cenario">
		<div id="fundo" > <img src="dist/img/bg.jpg" /> </div>
		<div id="personagem" > <img src="dist/img/guerreiro.png" width="30%" /> </div>
		<div id="inimigo" > <img src="dist/img/orc.png"  /> </div>
		
		<div id="dados">
		<table border=2 width="100%">
			<thead>
				<tr>
					<th width="50%"> Humano </th>
					<th width="50%"> Orc </th>
				</tr>
			</thead>
			<tbody>
				<tr> 
					<td> Espada </td>
					<td> Clava </td>
				</tr>
				<tr> 
					<td> Ataque +2 | Defesa +1 </td>
					<td> Ataque +1 | Defesa +0 </td>
				</tr>

				<tr> 
					<td> Agilidade +2 </td>
					<td> Agilidade +0 </td>
				</tr>
				<tr> 
					<td> Pontos de Vida <?php echo $_SESSION["lp_human"]; ?>/12 </td>
					<td> Pontos de Vida <?php echo $_SESSION["lp_orc"]; ?>/20 </td>
				</tr>
				<tr>
					<td align="center"> <a href="?vez=<?php echo base64_encode("orc");?>"><button <?php echo $disabled_human; ?> > Atacar </button> </a></td>
					<td align="center"> <a href="?vez=<?php echo base64_encode("humano");?>"><button <?php echo $disabled_orc; ?> > Atacar </button> </a> </td>
				</tr>
			</tbody>
		</table>
		</div>
		
		<div id="historico">
			<h4> <?php echo $mensagem; ?> </h4>
			<?php 
				if($vitoria != ""){
					echo "<h3> $vitoria venceu! </h3>";
					
					echo "<a href='index.php'> <button> RESTART </button></a>";
				}
				
				if(!isset($_GET["vez"])){
					echo "INICIATIVA HUMANO: ".$iniciativa_human;
					echo "<br>INICIATIVA ORC: ".$iniciativa_orc;
				}
			?>
		</div>
	</div>
	
	
</body>

</html>