/*
*
* Daqui para baixo são as funções de listagem dos produtos
*
* 1° função = somente listar os produtos, somente visualização,
* 2° função = lista com edição.
*
*/


// Função para listar os produtos na página lista produtos
function listProdutosForEdit() 
{

    // verifica se a requisição é possível
    xmlreq = CriaRequest()

    // capturando os valores de produto, grupo e status
    let produto   = document.getElementById("nomeProdutoPesquisa").value
    let grupo = document.getElementById("grupo").value
    let status = document.getElementById("status").value

    // let para url e os dados
    let url = "../../ajax/listaProdutosForEdit.php"
    let data = "produto=" + produto + "&grupo=" + grupo + "&status=" + status

    // const responsável pela request
    const request = $.ajax({
        url: url,
        data: data,
        type: "POST",
        dataType: "html"
    })

    // se a requisição for feita
    request.done( (jqXHR, textStatus) => {

        if(textStatus == "success")
        {
            document.getElementById("resultado").innerHTML = request.responseText
        }
        else
        {
            console.log("Error: " + request.responseText)
        }
        
    })

    // se a requisição falhar
    request.fail( (jqXHR, textStatus) => {
        console.log("Error: " + request.responseText)
    })
    
    // quando a requisição estiver completa
    request.always( _ => {
        // ...
    })
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



/*
*   daqui pra baixo é onde fica a função responsáve por listar as remessas
*/

// função responsável por listar a remessa de produção
function listRemessaProducao()
{
    let codigo = document.getElementById("codigoRemessaProducaoPesquisa").value

    // let responsável pela div do resultado
    let result = document.getElementById("result")

    let url = "../../ajax/listaRemessaProducao.php"
    let data = "codigo=" + codigo

    const request = $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: "html"
    })

    request.done( (responseText, textStatus) => {
        if( textStatus == "success")
        {
            result.innerHTML = responseText
        }
        else
        {
            console.log(responseText, textStatus)
            result.innerHTML = responseText
        }
    })

    request.fail( answer => {
        console.log(answer)
        result.innerHTML = responseText
    })

    request.always( _ => {
        // ...
    })
}