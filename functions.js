function alert_discreto(string)
	{ var alertaDiv = document.createElement("div");
	  alertaDiv.textContent = string;
	  alertaDiv.style.backgroundColor = "#330033";
	  alertaDiv.style.position = "fixed";
	  alertaDiv.style.bottom = "10px";
	  alertaDiv.style.right = "10px";
	  alertaDiv.style.padding = "10px";
	  alertaDiv.style.border = "1px dashed yellow";
	  alertaDiv.style.borderRadius = "5px";
	  alertaDiv.style.zIndex = "9999";
	  document.body.appendChild(alertaDiv);
	  setTimeout(function () {alertaDiv.style.display = "none";}, 1500);
	}

function mover_vert(lim,mod_vazio)
	{var vazio=document.getElementById("div22");
	 var vazio_linha=vazio.offsetTop/200;
	 var vazio_coluna=vazio.offsetLeft/200;
	 if (vazio_linha==lim) {return false;}
	 else {for (var i=0;i<3;i++) for(var j=0;j<3;j++) 
			 {var div=document.getElementById("div"+i+j);
			  var div_linha=div.offsetTop/200;
			  var div_coluna=div.offsetLeft/200; 
			  if ((div_linha==vazio_linha+mod_vazio)&&(div_coluna==vazio_coluna)) 
				{vazio.style.top=((vazio_linha+mod_vazio)*200)+'px';
				 div.style.top=((div_linha-mod_vazio)*200)+'px';
				 return true;}}}}
function mover_horiz(lim,mod_vazio)
	{var vazio=document.getElementById("div22");
	 var vazio_linha=vazio.offsetTop/200;
	 var vazio_coluna=vazio.offsetLeft/200;
	 if (vazio_coluna==lim) {return false;}
	 else {for (var i=0;i<3;i++) for(var j=0;j<3;j++) 
			 {var div=document.getElementById("div"+i+j);
			  var div_linha=div.offsetTop/200;
			  var div_coluna=div.offsetLeft/200; 
			  if ((div_linha==vazio_linha)&&(div_coluna==vazio_coluna+mod_vazio)) 
				{vazio.style.left=((vazio_coluna+mod_vazio)*200)+'px';
				 div.style.left=((div_coluna-mod_vazio)*200)+'px';
				 return true;}}}}

var arrayDeFuncoes = [function () {mover_vert(0,-1);}, 
					  function () {mover_horiz(2,1);}, 
					  function () {mover_vert(2,1);}, 
					  function () {mover_horiz(0,-1);}];
				 
	
function aleatorizar()
	{for (var i=0;i<=30;i++)
		{setTimeout(function () {arrayDeFuncoes[Math.floor(4*Math.random())]();}, 200*i);}}

function podeMover(div)
	{var lado=Math.abs(document.getElementById("div22").offsetLeft-div.offsetLeft);
	 var topo=Math.abs(document.getElementById("div22").offsetTop-div.offsetTop);
	 return((lado+topo)==200);}

function mover(div,jaTestou=false)
	{if (jaTestou||podeMover(div))
		{var vazio = document.getElementById("div22");
		 var left_temp=div.offsetLeft+"px";
		 var top_temp=div.offsetTop+"px";
		 div.style.left=vazio.offsetLeft+"px";
		 div.style.top=vazio.offsetTop+"px";
		 vazio.style.left=left_temp;
		 vazio.style.top=top_temp;
		 return true;}
	 else {alert_discreto("Você não pode mover essa peça."); return(false);}
	 }
	 
function resolucao(arquivo="")
	{var arquivo="resolucao"+arquivo+".php";
	 var alvo="alvo";
	 var parametros="";
	 for (var i=0;i<3;i++)
		{for (var j=0;j<3;j++)
			{var div_atual=document.getElementById("div"+i+j);
			 parametros+="div"+i+j+"="+(div_atual.offsetTop/200)+div_atual.offsetLeft/200+"&"; //parametros+="div"+(div_atual.offsetTop/200)+div_atual.offsetLeft/200+"="+i+j+"&";
			 }
		 }
	 ajax(arquivo+"?"+parametros,alvo);	
	 }
	 
	 