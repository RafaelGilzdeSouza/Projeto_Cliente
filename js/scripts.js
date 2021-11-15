// Função que verifica se o navegador tem suporte AJAX
function AjaxF() {
	var ajax;
	try {
		ajax = new XMLHttpRequest();
	}
	catch (e) {
		try {
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) {
			try {
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e) {
				alert("Seu browser não da suporte à AJAX!");
				return false;
			}
		}
	}
	return ajax;
}

//funcao que altera o conteudo dos card quando uma busca é feit na barra de pesquisa
function AlteraConteudo() {
	var ajax = AjaxF();

	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//'conteudo' é o id da div onde será inserido via html, o resultado
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	}

	// Variável com os dados que serão enviados ao PHP
	var conteudo_busca = document.querySelector("#input_produtos").value;
	ajax.open("GET", "home_backend.php?produtos=" + conteudo_busca);
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
}

//funcao que altera o conteudo dos card quando for usado o filtro na navbar
function AlteraConteudoDrop(name) {
	var ajax = AjaxF();

	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			//'conteudo' é o id da div onde será inserido via html, o resultado
			document.getElementById('conteudo').innerHTML = ajax.responseText;
		}
	}
	//'name' contem o grupo e o fabricante correspondente ao botao de filtro clicado, e a funcao split divide o conteudo em dois
	var info_produtos = name.split("-");
	//a consulta contem filtros de grupos e/ou fabricantes (sim)
	if (name.includes('-')) {
		var grupo = info_produtos[0];
		var fabricante = info_produtos[1];
		var dados = "grupo=" + grupo + "&&" + "fabricante=" + fabricante;
	}
	//a consulta contem filtros de grupos e/ou fabricantes (nao)
	else {
		if (name.includes('todos')) {
			dados = "grupo=" + '' + "&&" + "fabricante=" + '';
		} else {
			var grupo = name;
			dados = "grupo=" + grupo + "&&" + "fabricante=" + '';
		}
	}
	ajax.open("GET", "home_backend_botoes.php?" + dados);
	ajax.setRequestHeader("Content-Type", "text/html");
	ajax.send();
}
//alerta para intem configurações 
function funcao1() {
	alert("No momento o site não possui essa função!");
}
