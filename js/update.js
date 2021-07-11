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

// função para dar update no produto [pagina = lista produtos]
function updateProduto(index)
{
    let descricao = document.getElementById("nomeInput" + index).value
    let grupo = document.getElementById("grupoSelect" + index).value
    let status = document.getElementById("statusSelect" + index).value

    console.log("codigo: " + index)
    console.log("descrição: " + descricao)
    console.log("grupo: " + grupo)
    console.log("status: " + status)

    $("#nomeInput" + index).prop("disabled", true)
    $("#grupoSelect" + index).prop("disabled", true)
    $("#statusSelect" + index).prop("disabled", true)

    $("#botaoEditar" + index).removeClass("btn-success")
    $("#botaoEditar" + index).addClass("btn-warning")
    $("#botaoEditar" + index + " img").attr("src", "../../assets/pencil-fill.svg")
    $("#botaoEditar" + index).attr("onclick", "editarProduto(" + index + ")") 

    $("#botaoDeletar" + index).removeClass("btn-info")
    $("#botaoDeletar" + index).addClass("btn-danger")
    $("#botaoDeletar" + index + " img").attr("src", "../../assets/trash-fill.svg")
    $("#botaoDeletar" + index).attr("onclick", "deletarProduto(" + index + ")")
}