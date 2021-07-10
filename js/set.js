// arquivo para setar valores no código, faz processamento no banco

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


// função para setar o produto selecionado
function setProdutoRemessa(id = false, keyup = false)
{

    xmlreq = CriaRequest()

    if(keyup == 1)
    {
        id = document.getElementById('produto-codigo').value
        xmlreq.open("GET", "../../ajax/selectNameProduto.php?codigo=" + id, true)

        xmlreq.onreadystatechange = () =>
        {
            result = document.querySelectorAll('nomeProdutoPesquisaDisable')

            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
            if (xmlreq.readyState == 4) 
            {
        
                // Verifica se o arquivo foi encontrado com sucesso
                if (xmlreq.status == 200) 
                {
                    $('#nomeProdutoPesquisaDisable').val(xmlreq.responseText)
                }
                else
                {
                    result.innerHTML = "Erro: " + xmlreq.statusText
                }
            }
        };
    }
    else
    {
        xmlreq.open("GET", "../../ajax/selectNameProduto.php?codigo=" + id, true)

        xmlreq.onreadystatechange = () =>
        {
            result = document.querySelectorAll('nomeProdutoPesquisaDisable')

            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
            if (xmlreq.readyState == 4) 
            {
        
                // Verifica se o arquivo foi encontrado com sucesso
                if (xmlreq.status == 200) 
                {
                    $('#nomeProdutoPesquisaDisable').val(xmlreq.responseText)
                    $('#produto-codigo').val(id) 
                    $("#modalProduto").modal('hide')
                }
                else
                {
                    result.innerHTML = "Erro: " + xmlreq.statusText
                }
            }
        }
    }

    xmlreq.send(null)
}


// função para setar o produto selecionado
function setEtapaRemessa(id = false, keyup = false)
{

    xmlreq = CriaRequest()

    if(keyup == 1)
    {
        id = document.getElementById('etapa-codigo').value
        xmlreq.open("GET", "../../ajax/selectNameEtapa.php?codigo=" + id, true)

        xmlreq.onreadystatechange = () =>
        {
            result = document.querySelectorAll('nomeEtapaPesquisaDisable')

            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
            if (xmlreq.readyState == 4) 
            {
        
                // Verifica se o arquivo foi encontrado com sucesso
                if (xmlreq.status == 200) 
                {
                    $('#nomeEtapaPesquisaDisable').val(xmlreq.responseText)
                }
                else
                {
                    result.innerHTML = "Erro: " + xmlreq.statusText
                }
            }
        };
    }
    else
    {
        xmlreq.open("GET", "../../ajax/selectNameEtapa.php?codigo=" + id, true)

        xmlreq.onreadystatechange = () =>
        {
            result = document.querySelectorAll('nomeEtapaPesquisaDisable')

            // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
            if (xmlreq.readyState == 4) 
            {
        
                // Verifica se o arquivo foi encontrado com sucesso
                if (xmlreq.status == 200) 
                {
                    $('#nomeEtapaPesquisaDisable').val(xmlreq.responseText)
                    $('#etapa-codigo').val(id) 
                    $("#modalEtapa").modal('hide')
                }
                else
                {
                    result.innerHTML = "Erro: " + xmlreq.statusText
                }
            }
        }
    }

    xmlreq.send(null)
}