// toggle menu on/off 
$("#menu-toggle").click((e) => {
    e.preventDefault()
    $("#wrapper").toggleClass("toggled")
    $(".menuButton").toggleClass("buttonMenuToggled")
})

// impede que o input dê submit na página
$(document).ready(() => 
{
    $('input').keydown((event) => 
    {
        if(event.keyCode == 13) 
        {
            event.preventDefault()
            return false
        }
    })
})

// função que prepara os inputs e os botões para um interface editavel
function editarProduto(codigo)
{

    // tirando disable dos inputs
    $("#nomeInput" + codigo).prop("disabled", false)
    $("#grupoSelect" + codigo).prop("disabled", false)
    $("#statusSelect" + codigo).prop("disabled", false)

    // mudando a cor, logo e o evento do click do botao de edicao
    $("#botaoEditar" + codigo).removeClass("btn-warning")
    $("#botaoEditar" + codigo).addClass("btn-success")
    $("#botaoEditar" + codigo + " img").attr("src", "../../assets/check.svg")
    $("#botaoEditar" + codigo).attr("onclick", "updateProduto(" + codigo + ")")

    // mudando a cor, logo e o evento do botao de deletar, ele passa a virar um botao de cancelar
    $("#botaoDeletar" + codigo).removeClass("btn-danger")
    $("#botaoDeletar" + codigo).addClass("btn-info")
    $("#botaoDeletar" + codigo + " img").attr("src", "../../assets/x-white.svg")
    $("#botaoDeletar" + codigo).attr("onclick", "cancelaEdicaoProduto(" + codigo + ")")   
}

// funcao que cancela a edicao, ela volta os valores padros dos botoes e dos inputs
function cancelaEdicaoProduto(codigo)
{

    $("#nomeInput" + codigo).prop("disabled", true)
    $("#grupoSelect" + codigo).prop("disabled", true)
    $("#statusSelect" + codigo).prop("disabled", true)

    $("#botaoEditar" + codigo).removeClass("btn-success")
    $("#botaoEditar" + codigo).addClass("btn-warning")
    $("#botaoEditar" + codigo + " img").attr("src", "../../assets/pencil-fill.svg")
    $("#botaoEditar" + codigo).attr("onclick", "editarProduto(" + codigo + ")") 

    $("#botaoDeletar" + codigo).removeClass("btn-info")
    $("#botaoDeletar" + codigo).addClass("btn-danger")
    $("#botaoDeletar" + codigo + " img").attr("src", "../../assets/trash-fill.svg")
    $("#botaoDeletar" + codigo).attr("onclick", "deletarProduto(" + codigo + ")")
    listProdutosForEdit()

}