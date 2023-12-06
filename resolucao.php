<? include("functions.php");

//Classe Estado, com o estado pai e a ação que o gerou
class Estado 
	{public $puzzle;
	 public $acao;
     public $estado_pai;
	 public $peso;
     
     public function __construct($puzzle, $acao, $estado_pai) 
		{$this->puzzle = $puzzle;
         $this->acao = $acao;
         $this->estado_pai = $estado_pai;}
}

include("inicializando.php");

//*****************************************************//
$_jafoi=[]; // ARRAY DE puzzles que já foram (não precisamos mais do estado)
$estado_inicial= new Estado($puzzle_ini,'',null);
$_estaindo=[$estado_inicial]; //ARRAY DE ESTADOS que estão sendo testados

   const TENTATIVAS = 16400; 
   $cont=0;
   while(($cont<TENTATIVAS)&&(count($_estaindo)!=0))
		{$cont++;
		 $estado_indo=$_estaindo[0];
		 $sucesso=igual($estado_indo->puzzle,$puzzle_final);
		 if ($sucesso) 
			{?><ol><?imprimir_solucao($estado_indo);?></ol><?
			 echo"sucesso em ".$cont." nós!";
			 break;}
		 foreach ($_operacoes as $key2 => $operacao) //O puzzle não é o final: criar os próximos puzzles e estados
			{$novo_puzzle=$operacao($estado_indo->puzzle);
			 if($novo_puzzle!=null)
				{$estado_operado = new Estado($operacao($estado_indo->puzzle), $_operacoes_string[$key2],$estado_indo);
				 $novo=true;
				 foreach($_jafoi as $key3 => $puzzle_jafoi)
					{if (igual($puzzle_jafoi,$estado_operado->puzzle))
						{$novo=false;break;}}
				 if ($novo) {$_estaindo[]=$estado_operado;}
				}} 
		 $_jafoi[]=(reset($_estaindo))->puzzle;
		 array_shift($_estaindo);}
	if (!$sucesso)
		{if ($cont>=TENTATIVAS) 
			{echo "Não achei o resultado em ".TENTATIVAS." tentativas<br>";
			 echo "As tentativas foram:";
			 foreach($_jafoi as $key => $value)
				{echo "<br>".$key.":<br>"; imprimir_puzzle($value);}
			 }
		else {echo "Não achei o resultado mesmo rodando todas as possibilidades.<br>";}}

 ?>
	