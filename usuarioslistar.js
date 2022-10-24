// O JS acionará o PHP, contudo é necessário que esta função seja assíncrona
// É necessário aguardar para recever a resposta do Servidor.
const listarUsuarios = async () => {
	//Aciona o SQL e recebe a resposta.
	const dados = await fetch("usuarioslistar.php");
	const resposta = await dados.json();
	//Você pode usar o console para saber se os dados foram recebidos.
	//console.log(resposta['dados']);

	//Exibe uma mensagem de erro ou mostra os dados
	if(!resposta['status']){
		document.getElementById("tabela").innerHTML = resposta['msg'];
	}else{
		document.getElementById("tabela").innerHTML = resposta['dados'];
	}

}

listarUsuarios();