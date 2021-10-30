// Função que verifica se o navegador tem suporte AJAX
function AjaxF()
{
 var ajax;

 try
 {
  ajax = new XMLHttpRequest();
 }
 catch(e)
 {
  try
  {
   ajax = new ActiveXObject("Msxml2.XMLHTTP");
  }
  catch(e)
  {
   try
   {
    ajax = new ActiveXObject("Microsoft.XMLHTTP");
   }
   catch(e)
   {
    alert("Seu browser não da suporte à AJAX!");
    return false;
   }
  }
 }
 return ajax;
}

// Função que faz as requisição Ajax ao arquivo PHP
function AlteraConteudo()
{
 var ajax = AjaxF();

 ajax.onreadystatechange = function(){
  if(ajax.readyState == 4)
  {
   document.getElementById('conteudo').innerHTML = ajax.responseText;
  }
 }

 // Variável com os dados que serão enviados ao PHP

var dados = "produtos="+document.querySelector("#input_produtos").value;

ajax.open("GET", "home_backend.php?"+dados);
ajax.setRequestHeader("Content-Type", "text/html");
ajax.send();
}


function AlteraConteudoDrop(name)
{
	var ajax = AjaxF();

	ajax.onreadystatechange = function(){
	 if(ajax.readyState == 4)
	 {
	  document.getElementById('conteudo').innerHTML = ajax.responseText;
	 }
	}
	
	var info_produtos = name.split("-");
	if (name.includes('-')){
		var grupo = info_produtos[0];
		var fabricante = info_produtos[1];
		var dados = "grupo="+grupo+"&&"+"fabricante="+fabricante;
	}else{
		if(name.includes('todos')){
			dados = "grupo="+''+"&&"+"fabricante="+'';
		}else{
			var grupo = name;
			dados = "grupo="+grupo+"&&"+"fabricante="+'';
		}
	}
	
	ajax.open("GET", "home_backend_botoes.php?"+dados);
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
	
}