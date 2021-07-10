// arquivo para dar update no banco de dados, faz processamento no banco

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

function updateRemessaProducao(index, modal)
{
    xmlreq = new CriaRequest()

    quantidade = document.getElementById("quantidade" + index).value
    status = document.getElementById("status" + index).value
    etapa = document.getElementById("etapa" + index).value

    sql = "UPDATE remessaproducao SET quantidade = " + quantidade + ", status = '" + status + "', etapa = " + etapa + " WHERE codigo = " + index
    url = "../ajax/updateRemessaProducao.php?quantidade=" + quantidade + "&status=" + status+ "&etapa=" + etapa              
    xmlreq.open("GET", url)


    xmlreq.onreadystatechange = () =>
    {
        if (xmlreq.readyState == 4) 
        {
            if (xmlreq.status == 200) 
            {
                $("#modalRemessaProduto" + index).modal.hide()
            }
            else
            {
                console.log(xmlreq.statusText)
            }
        }
    }

    $("#modalRemessaProduto" + modal).modal("hide")
        
}