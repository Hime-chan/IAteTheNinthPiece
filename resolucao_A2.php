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
		 $this->peso = (diferenca_final($puzzle)+soma_graus($puzzle));
         $this->estado_pai = $estado_pai;}
}

include("inicializando.php");

function soma_graus($puzzle)
	{$dif=0; global $puzzle_final;
	 for ($i=0;$i<3;$i++) for ($j=0;$j<3;$j++)
		{$dif+=abs($puzzle[$i][$j]["linha"]-$puzzle_final[$i][$j]["linha"]);
		 $dif+=abs($puzzle[$i][$j]["coluna"]-$puzzle_final[$i][$j]["coluna"]);
		 }
	 return $dif;	
	}


// Função de cálculo de peso
function diferenca_final($puzzle)
	{$dif=0; global $puzzle_final;
	 for ($i=0;$i<3;$i++) for ($j=0;$j<3;$j++)
		{$dif+=count(array_diff($puzzle[$i][$j], $puzzle_final[$i][$j])); }
	 return $dif;}

function primeiro_elemento($vetor_bidimensional)
	{for ($i=0;$i<47;$i++)
		{if (is_array($vetor_bidimensional[$i])&&(!empty($vetor_bidimensional[$i])))
			{return $vetor_bidimensional[$i][array_key_first($vetor_bidimensional[$i])];}}
	 }


function apagar_primeiro_elemento(&$vetor_bidimensional) 
	{if ((!is_array($vetor_bidimensional))||empty($vetor_bidimensional)) 
		{echo "Vetor vazio!!"; return false;}
	 for ($i=0;$i<47;$i++)
		{if (is_array($vetor_bidimensional[$i])&&(!empty($vetor_bidimensional[$i])))
			{array_shift($vetor_bidimensional[$i]); return true;}}
	 //foreach($vetor_bidimensional as $key => $value)
	//	{if (is_array($value)&&(!empty($value))) 
		//	   {array_shift($vetor_bidimensional[$key]); return true;}}
	 }

function copia_profunda($array) 
	{$copia = [];
	 foreach ($array as $key => $value)
		{foreach ($value as $key2 => $valor2) 
			{$copia[$key][$key2]['linha']=$valor2['linha'];
			 $copia[$key][$key2]['coluna']=$valor2['coluna'];}}
	 return $copia;}

function imprimir_estado($estado)
	{echo "Peso: ".$estado->peso;
	 imprimir_puzzle($estado->puzzle);
	 echo "<br><br><br>";}
	

//*****************************************************//
$_jafoi=[]; // ARRAY de puzzles
$estado_inicial= new Estado($puzzle_ini,'',null);
$_estaindo[diferenca_final($estado_inicial->puzzle)+soma_graus($estado_inicial->puzzle)][0]=$estado_inicial; //ARRAY DE ESTADOS que estão sendo testados


const TENTATIVAS = 1000;//16400; 
   $cont=0;
   while(($cont<TENTATIVAS)&&(is_array($_estaindo))&&(!empty($_estaindo)))
		{$cont++;
		 $estado_indo=primeiro_elemento($_estaindo);
		 $_jafoi[]=copia_profunda($estado_indo->puzzle);
		 apagar_primeiro_elemento($_estaindo);
		 //echo "peso escolhido: ".$estado_indo->peso;
		 //imprimir_puzzle($estado_indo->puzzle); 
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
				 if ($novo) {$_estaindo[$estado_operado->peso][]=$estado_operado;}
				}} 
		 //echo("<br><br>JÁ FOI:");
		 //foreach($_jafoi as $key => $value) {imprimir_puzzle($value);}
		 //echo("<br><br>ESTA INDO:");
		 //foreach($_estaindo as $key => $value) 
		 //	foreach($value as $key2 => $value2)
		 //		{echo "Peso ".$key."<br>";imprimir_estado($value2);}
		 //print_r($_estaindo);echo "--";
		 }

	if (!$sucesso)
		{echo (($cont>=TENTATIVAS)?"Não achei o resultado em ".TENTATIVAS." tentativas<br>":"Não achei o resultado mesmo rodando todas as possibilidades.<br>")."As tentativas foram:";
			 foreach($_jafoi as $key => $value)
				{echo "<br>".$key.":<br>"; imprimir_puzzle($value);}}

 ?>
	