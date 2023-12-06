<?
//Inicializando o puzzle inicial e o final
foreach ($_GET as $key => $value) 
	{$puzzle_ini[substr($key,3,1)][substr($key,4,1)]['linha']=substr($value,0,1);
	 $puzzle_ini[substr($key,3,1)][substr($key,4,1)]['coluna']=substr($value,1,1);}

$puzzle_final=[];			   
for ($i=0;$i<3;$i++) for ($j=0;$j<3;$j++)
		{$puzzle_final[$i][$j]["linha"]=$i;
	     $puzzle_final[$i][$j]["coluna"]=$j;}

$_operacoes=[fn($puzzle)=>mover_cima($puzzle,true),fn($puzzle)=>mover_baixo($puzzle,false), fn($puzzle)=>mover_esq($puzzle,true),fn($puzzle)=>mover_dir($puzzle,false)]; 
$_operacoes_string=["Baixo; ","Cima; ","Direita; ","Esquerda; "];

?><br>Puzzle inicial:<br><?imprimir_puzzle($puzzle_ini);
?><br>Puzzle final:<br><?imprimir_puzzle($puzzle_final);
?><br>Caminho:<br>