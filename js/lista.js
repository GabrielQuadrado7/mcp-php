// arquivo para listar, faz processamento no banco


// Função para criar um objeto XMLHTTPRequest
function CriaRequest() {
    try{
        request = new XMLHttpRequest()
    }catch (IEAtual){

        try{
            request = new ActiveXObject("Msxml2.XMLHTTP")
        }catch(IEAntigo){

            try{
                request = new ActiveXObject("Microsoft.XMLHTTP")
            }catch(falha){
                request = false
            }
        }
    }

    if (!request)
        alert("Seu Navegador não suporta Ajax!")
    else
        return request
}


// Função para listar os produtos na página lista produtos
function listProdutos() 
{

    // div que mostra o resultado :)
    result = document.getElementById("result")

    // verifica se a requisição é possível
    xmlreq = CriaRequest()

    // capturando os valores de produto, grupo e status
    produto   = document.getElementById("nomeProdutoPesquisa").value
    grupo = document.getElementById("grupo").value
    status = document.getElementById("status").value

    url = "../../ajax/listaProdutos.php?produto=" + produto + "&grupo=" + grupo + "&status=" + status + "&select=select"

    xmlreq.open("GET", url, true)

    // função para colocar o resultado da requisição na tela
    xmlreq.onreadystatechange = function()
    {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) 
        {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) 
            {
                document.getElementById("resultado").innerHTML = xmlreq.responseText
            }
            else
            {
                result.innerHTML = "Erro: " + xmlreq.statusText
            }
        }
    }
    xmlreq.send(null)
}


// função para listar os grupos
function listGrupos() 
{

    // captura o resultado do input
    grupo   = document.getElementById("nomeGrupoPesquisa").value

    // div que mostra o resultado :)
    result = document.getElementById("resultado")

    // verifica se a requisição é possível
    xmlreq = CriaRequest()

    // Inicia a requisição no arquivo listaGrupos.php
    xmlreq.open("GET", "../../ajax/listaGrupos.php?nomeGrupoPesquisa=" + grupo, true)

    // função para colocar o resultado da requisição na tela
    xmlreq.onreadystatechange = function()
    {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) 
        {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) 
            {
                result.innerHTML = xmlreq.responseText
            }
            else
            {
                result.innerHTML = "Erro: " + xmlreq.statusText
            }
        }
    };
    xmlreq.send(null)
}


// função para listar as etapas
function listEtapas(select = false) 
{

    // captura o resultado do input
    etapa = document.getElementById("nomeEtapaPesquisa").value

    // div que mostra o resultado :)
    result = document.getElementById("resultadoEtapa")

    // verifica se a requisição é possível
    xmlreq = CriaRequest()

    if(select == true)
    {
        xmlreq.open("GET", "../../ajax/listaEtapas.php?nomeEtapaPesquisa=" + etapa + "&select=select", true)
    }
    else
    {
        xmlreq.open("GET", "../../ajax/listaEtapas.php?nomeEtapaPesquisa=" + etapa, true)
    }     

    // função para colocar o resultado da requisição na tela
    xmlreq.onreadystatechange = function()
    {

        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) 
        {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) 
            {
                result.innerHTML = xmlreq.responseText
            }
            else
            {
                result.innerHTML = "Erro: " + xmlreq.statusText
            }
        }
    };
    xmlreq.send(null)
}

function listRemessaProducao()
{
    codigo = document.getElementById("codigoRemessaProducaoPesquisa").value

    result = document.getElementById("result")

    xmlreq = CriaRequest()
    xmlreq.open("GET", "../../ajax/listaRemessaProducao.php?codigo=" + codigo)

    xmlreq.onreadystatechange = function()
    {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) 
        {

            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) 
            {
                result.innerHTML = xmlreq.responseText
            }
            else
            {
                result.innerHTML = "Erro: " + xmlreq.statusText
            }
        }
    }
    xmlreq.send(null)

}