function add_js(texto){
	// inicializa o inicio ><
	var ini = 0;
	// loop enquanto achar um script
	while (ini!=-1){
		// procura uma tag de script
		ini = texto.indexOf('<script', ini);
		// se encontrar
		if (ini >=0){
			// define o inicio para depois do fechamento dessa tag
			ini = texto.indexOf('>', ini) + 1;
			// procura o final do script
			var fim = texto.indexOf('</script>', ini);
			// extrai apenas o script e executa
			eval(texto.substring(ini,fim)); 
		}
	}
}
function geraxmlhttp()
		  {try {xmlhttp = new XMLHttpRequest();}
		   catch(erro1){xmlhttp = false; alert('Este site utiliza Ajax. Certifique-se que seu navegador permite essa tecnologia.');}
		   return(xmlhttp);};	
		   
function ajax(url,iddoelemento)
		  {if (document.body.style.cursor!='wait')
			  {document.body.style.cursor='wait';
			   var startTime = performance.now();
			   objxmlhttp = geraxmlhttp();
			   objxmlhttp.open("GET",url,true);
			   objxmlhttp.onreadystatechange=function() 
				  {if (objxmlhttp.readyState==4)
						 {alert(("Tempo de resposta: " + (performance.now()- startTime))+ "ms");
					      document.getElementById(iddoelemento).innerHTML=objxmlhttp.responseText;
						  document.body.style.cursor='default';}
				   }
			   objxmlhttp.send(null);}
		   else {setTimeout("ajax('"+url+"','"+iddoelemento+"');",500);}	   
		   };		
		   