<?
function imprimir_puzzle($puzzle)
	{?><div class="puzzle_mini">
	<?for ($i=0;$i<3;$i++)
		for($j=0;$j<3;$j++)
		{$numero=1+3*$i+$j;
		 ?><div style="top:<? echo $puzzle[$i][$j]["linha"]*30; ?>;left:<? echo $puzzle[$i][$j]["coluna"]*30; ?>;"><? echo ($numero!=9)?$numero:""; ?></div><?}
	 ?></div><?}

function mover_vert($puzzle,$lim,$mod_vazio)
	{$vazio=$puzzle[2][2];
	 if ($vazio["linha"]==$lim) {return null;}
	 else {for ($i=0;$i<3;$i++) for($j=0;$j<3;$j++) 
			 {if (($puzzle[$i][$j]["linha"]==$vazio['linha']+$mod_vazio)&&($puzzle[$i][$j]["coluna"]==$vazio['coluna'])) 
				{$puzzle[2][2]["linha"]+=$mod_vazio;
				 $puzzle[$i][$j]["linha"]-=$mod_vazio;
				 return $puzzle;}}}}
function mover_horiz($puzzle,$lim,$mod_vazio)
	{$vazio=$puzzle[2][2];
	 if ($vazio["coluna"]==$lim) {return null;}
	 else {for ($i=0;$i<3;$i++) for($j=0;$j<3;$j++) 
			 {if (($puzzle[$i][$j]["linha"]==$vazio['linha'])&&($puzzle[$i][$j]["coluna"]==$vazio['coluna']+$mod_vazio)) 
				{$puzzle[2][2]["coluna"]+=$mod_vazio;
				 $puzzle[$i][$j]["coluna"]-=$mod_vazio;
				 return $puzzle;}}}}


function mover_cima($puzzle) //Move o vazio para a célula acima
	{return mover_vert($puzzle,0,-1);}
function mover_baixo($puzzle) //Move o vazio para a célula abaixo
	{return mover_vert($puzzle,2,1);}
function mover_esq($puzzle) //Move o vazio para a célula à esq
	{return mover_horiz($puzzle,0,-1);}
function mover_dir($puzzle) //Move o vazio para a célula à dir
	{return mover_horiz($puzzle,2,1);}

//Funções importantes
function igual($puz1,$puz2)
	{for ($i=0;$i<3;$i++) for($j=0;$j<3;$j++) 
		{if (($puz1[$i][$j]['linha']!=$puz2[$i][$j]['linha'])||
		     ($puz1[$i][$j]['coluna']!=$puz2[$i][$j]['coluna'])) 
			 {return false;}}
	 return true;}
$_funcoesJS["Baixo; "]="mover_vert(0,-1);";
$_funcoesJS["Cima; "]="mover_vert(2,1);";
$_funcoesJS["Direita; "]="mover_horiz(0,-1);";
$_funcoesJS["Esquerda; "]="mover_horiz(2,1);";
	
function imprimir_solucao($caminho_estado)
	{global $_funcoesJS;
	 $msg_final = [];
	 $funcoes = [];
	 $botao='';
	 $cont=0;
	 while ($caminho_estado->acao != "")
		{$msg_final[]=$caminho_estado->acao; 
		 $funcoes[] = "setTimeout(function () {".$_funcoesJS[$caminho_estado->acao]."}, ";
		 //var_dump($caminho_estado->cubo);
		 $caminho_estado=$caminho_estado->estado_pai;}
	 foreach(array_reverse($msg_final) as $key => $value)
		{echo $value;}
	 foreach(array_reverse($funcoes) as $key => $value)
		{$botao.=$value.(250*$cont++).");";}	
	 echo "<br><button class='botao' onclick=\"".$botao."\">Veja a resolução</button>";}
?>