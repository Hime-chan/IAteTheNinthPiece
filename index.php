<html><meta charset="UTF-8">
<head><title>IAte the ninth piece: Atividade de IA - BCC - Discente: Claudia Cavalcante Fonseca</title></head>
<link href='style.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="functions.js"></script>
<body>
<div>
<h1>Modifique o tabuleiro à sua vontade:</h1>
<div id="tabuleiro">
	<? for ($i=0;$i<3;$i++) 
		{for ($j=0;$j<3;$j++) {echo "<div onclick='mover(this)' id='div".$i.$j."'></div>";}}?>
</div>
<button class="botao" onclick="aleatorizar();">Aleatorizar as peças</button>
<button class="botao" onclick="resolucao();">Resolver por B. Horiz.</button>
<button class="botao" onclick="resolucao('_A1')";>Resolver por A* 1</button>
<button class="botao" onclick="resolucao('_A2')";>Resolver por A* 2</button>
<div id='alvo'>
	
</div>
</div>
<div id='rodape'>Esta atividade foi sugerida pelo professor <a href='http://bcc.ifc-riodosul.edu.br/docentes.php' target='_blank'>Juliano Tonizetti Brignoli</a> na disciplina de Inteligência Artificial do IFC - Rio do Sul. Esta implementação foi feita pela aluna <a href='https://ccf.purrfect.codes' target='_blank'>Claudia Cavalcante Fonseca</a>.</div>
</body>
</html>

