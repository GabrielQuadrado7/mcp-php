// função para cadastrar o produto
function cadastrarProduto() 
{

    // captura o resultado dos inputs
    let nomeProduto = document.getElementById("nomeProduto").value
    let grupoProduto = document.getElementById("grupoProduto").value
    let statusProduto = document.getElementById("statusProduto").value

    // div que mostra o resultado da interação do usuario
    let result = document.getElementById("resultadoInclusao")


    // vefifica se alguns dos inputs estão vazios
    if
    (
        nomeProduto == "" || nomeProduto.length === 0 || !nomeProduto.trim() ||
        grupoProduto == "" || grupoProduto.length === 0 || !grupoProduto.trim() ||
        statusProduto == "" || statusProduto.length === 0 || !statusProduto.trim()
    )
    {
        /*
        *
        * essa sessão verifica qual é o campo que está vázio
        * caso o campo esteja vazio a div de erro do input é acionada
        *
        */

        // verifica se o nome do produto está vazio
        if(nomeProduto == "" || nomeProduto.length === 0 || !nomeProduto.trim())
        {

            document.getElementById("mensagemDeErroNomeProduto").innerHTML = "<small>O nome do produto não foi definido.</small>"
            
            if(!grupoProduto == "" || !grupoProduto.length === 0 || grupoProduto.trim())
            {
                document.getElementById("mensagemDeErroNomeGrupo").innerHTML = ""
            }
        }

        // verifica se algum grupo foi selecionado
        if(grupoProduto == "" || grupoProduto.length === 0 || !grupoProduto.trim())
        {
            
            document.getElementById("mensagemDeErroNomeGrupo").innerHTML = "<small>É necessário selecionar um grupo.</small>"

            if(!nomeProduto == "" || !nomeProduto.length === 0 || nomeProduto.trim())
            {
                document.getElementById("mensagemDeErroNomeProduto").innerHTML = ""
            }
        }

        // verifica se o status do produto foi setado
        if(statusProduto == "" || statusProduto.length === 0 || !statusProduto.trim())
        {
            document.getElementById("mensagemDeErroStatus").innerHTML = "<small>É necessário marcar o produto como ativo ou inativo.</small>"
        }

        // alerta que é exibido indicando o erro
        result.innerHTML = `
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Preencha todos os campos para prosseguir!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>`
    }
    else
    {

        let url = "../../ajax/cadastroProduto.php"
        let data = "nomeProduto=" + nomeProduto + "&grupoProduto=" + grupoProduto + "&statusProduto=" + statusProduto

        // const responsável pela request ao arquivo cadastroProduto.php
        const request = $.ajax({
            url: url,
            type: "POST",
            data: data
        })

        // spinner de loading
        result.innerHTML = `
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
        `
        // se a requisição for feita
        request.done( (jqXHR, textStatus) => {

            // caso o status da requisição retorne sucesso
            if(textStatus == "success")
            {
                document.getElementById("mensagemDeErroNomeGrupo").innerHTML = ""
                document.getElementById("mensagemDeErroNomeProduto").innerHTML = ""
                document.getElementById("mensagemDeErroStatus").innerHTML = ""

                document.getElementById("nomeProduto").value = ""
                document.getElementById("grupoProduto").value = ""
                document.getElementById("statusProduto").value = ""

                result.innerHTML = `
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Produto incluído com sucesso!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>`
            }
            else
            {
                console.log("Error: " + textStatus.statusText)
                result.innerHTML = `
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Houve um erro no cadastro, tente novamente!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
        })

        // se a requisição falhar
        request.fail( answer => {
            console.log("Error: " + answer.statusText)
            result.innerHTML = `
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Houve um erro no cadastro, tente novamente!</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>`
        })

        // quando a requisição estiver completa
        request.always( _ => {
            // ...
        })
    }
}


// função para cadastrar o grupo
function cadastrarGrupo() 
{

    // captura o resultado do input
    let nomeGrupo = document.getElementById("nomeGrupo").value

    // div que mostra o resultado da interação do usuario
    let result = document.getElementById("resultadoInclusao")
    
    // verifica se o input está vazio e caso esteja mostra a mensagem de erro
    if(nomeGrupo == "" || nomeGrupo.length === 0 || !nomeGrupo.trim())
    {
        document.getElementById("mensagemDeErro").innerHTML = "<small>O nome do Grupo não foi definido </small>"
        document.getElementById("nomeGrupo").focus()

        result.innerHTML = `
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Preencha o campo para prosseguir!</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>`
    }
    else
    {   
        let url = "../../ajax/cadastroGrupo.php"
        let data = "nomeGrupo=" + nomeGrupo

        // const responsável pela requisição do arquivo cadastroGrupo.php
        const request = $.ajax({
            url: url,
            type: "POST",
            data: data
        })

        // spinner de loading
        result.innerHTML = `
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>
            `
        // se a requisição for feita
        request.done( (jqXHR, textStatus) => {
            // caso o status da requisição retorne sucesso
            if(textStatus == "success")
            {
                document.getElementById("nomeGrupo").value = ""
                document.getElementById("mensagemDeErro").innerHTML = ""
                result.innerHTML = `
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Grupo incluído com sucesso!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
            else
            {
                console.log("Error: " + textStatus.statusText)
                result.innerHTML = `
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Houve um erro no cadastro, tente novamente!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
        })
    
        // se a requisição falhar
        request.fail( answer => {
            console.log("Error: " + answer.statusText)
            result.innerHTML = `
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Houve um erro no cadastro, tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>`
        })

        // quando a requisição estiver completa
        request.always( _ => {
            // ...
        })
    }
}


// função para cadastrar a etapa
function cadastrarEtapa() 
{

    // captura o resultado do input
    let nomeEtapa = document.getElementById("nomeEtapa").value

    // div que mostra o resultado :)
    let result = document.getElementById("resultadoInclusao")

    // verifica se o input está vazio e caso esteja mostra a messagem de erro
    if(nomeEtapa == "" || nomeEtapa.length === 0 || !nomeEtapa.trim())
    {

        document.getElementById("mensagemDeErro").innerHTML = "<small>O nome da Etapa não foi definido </small>"
        document.getElementById("nomeEtapa").focus()
        result.innerHTML = `
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Preencha o campo para prosseguir!</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>`
    }
    else
    {

        let url = "../../ajax/cadastroEtapa.php"
        let data = "nomeEtapa=" + nomeEtapa

        // const responsável pela requisição do arquivo cadastroGrupo.php
        const request = $.ajax({
            url: url,
            type: "POST",
            data: data
        })

        // spinner de loading
        result.innerHTML = `
            <div class="spinner-border" role="status">
                <span class="visually-hidden"></span>
            </div>`

        // se a requisição for feita
        request.done((jqXHR, textStatus) => {

            if(textStatus == "success")
            {
                document.getElementById("mensagemDeErro").innerHTML = ""
                document.getElementById("nomeEtapa").value = ""
                result.innerHTML = 
                    `<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Etapa incluída com sucesso!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
            else
            {
                console.log("Error: " + textStatus.statusText)
                result.innerHTML = `
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Houve um erro no cadastro, tente novamente!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
            
        })

        // se a requisição falhar
        request.fail( answer => {
            console.log("Error: " + answer.statusText)
            result.innerHTML = `
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Houve um erro no cadastro, tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>`
        })

        // quando a requisição estiver completa
        request.always( _ => {
            // ...
        })
    }
}


// função para cadastrar uma remessa de produção
function cadastrarRemessa()
{   
    // capturando o resultado dos inputs
    let produto = document.getElementById("produto-codigo").value
    let produtoNome = document.getElementById("nomeProdutoPesquisaDisable").value
    let quantidade = document.getElementById("quantidade").value
    let observacao = document.getElementById("observacao").value

    // let responsável pela div do resultado
    let result = document.getElementById("resultado-cadastro")

    // verifica se o campo produto e quantidade são validos
    if(produtoNome == "" || produtoNome == "Produto inexistente" || quantidade <= 0)
    {

        if(produtoNome == "" || produtoNome == "Produto inexistente")
        {
            document.getElementById("produto-erro").innerHTML = "Produto Inválido."
        }
        else
        {
            document.getElementById("produto-erro").innerHTML = ""
        }

        if(quantidade <= 0)
        {
            document.getElementById("quantidade-erro").innerHTML = "Quantidade inválida."
        }
        else
        {
            document.getElementById("quantidade-erro").innerHTML = ""
        }

        result.innerHTML = `
            <div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
                <strong>Há campos com informações vazias ou incorretas!</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>`
    }
    else
    {

        let url = "../../ajax/cadastroRemessaProducao.php"
        let data = "quantidade=" + quantidade + "&produto=" + produto + "&observacao=" + observacao
        
        // const responsável pela request ao arquivo cadastroRemessaProducao.php
        const request = $.ajax({
            url: url,
            type: "POST",
            data: data
        })

        // se a requisição for feita
        request.done((jqXHR, textStatus) => {
            if(textStatus == "success")
            {
                document.getElementById("produto-codigo").value = ''
                setProdutoRemessa(false,true)
                document.getElementById("quantidade").value = ''
                document.getElementById("observacao").value = ''

                result.innerHTML = `
                    <div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
                        <strong>Remessa cadastrada com sucesso!</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
            else
            {
                result.innerHTML = `
                    <div class='alert alert-warning alert-dismissible fade show mt-3' role='alert'>
                        <strong>Houve um erro no cadastro, tente novamente.</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>`
            }
        })

        // se a requisição falhar
        request.fail( answer => {
            console.log("Error: " + answer)
            result.innerHTML = `
                <div class='alert alert-warning alert-danger fade show mt-3' role='alert'>
                    <strong>Há campos com informações vazias ou incorretas!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>`
        })

        // quando a requisição finalizar
        request.always( _ => {
            // ...
        })
    }
}

// função para inserir a pagina favoritada
function cadastrarFavorito(nome, caminho)
{

    let nomeFav = nome
    let caminhoFav = caminho

    let url = "../../ajax/cadastroFavorito.php"
    let data = "name=" + nomeFav + "&path=" + caminhoFav

    // const responsável pela requisição
    const request = $.ajax({
        url: url,
        type: "POST",
        data: data
    })

    request.done( (jqXHR, textStatus) => {
                
        if(textStatus == "success")
        {
            let star = document.getElementById("favorito-star")
            star.src = "../../assets/star.svg"

            favoritarBtn = document.getElementById("botao-favotirar")
            favoritarBtn.setAttribute("onclick", "deletarFavorito(`" + nomeFav + "`,`" + caminhoFav + "`)")
        
            $("#area-notificacao").append(`
                    <div class="toast mb-3" role="alert" aria-live="assertive" arial-atomic="true" data-delay="2500">
                        <div class="toast-header bg-primary">
                            <strong class="mr-auto text-light pr-5 mr-5">Sistema</strong>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <button type="button" class="close" data-bs-dismiss="toast aria-label="Close">
                        </div>

                        <div class="toast-body">
                            Pagina Adicionada aos favoritos!
                        </div>
                    </div>
            `)

            //metodo para exibir o toast
            $(".toast").toast("show")

            //metodo para remover o toast
            $(".toast").on("hidden.bs.toast", (e) => {
                $(e.currentTarget).remove()
            })
        }
        else
        {
            $("#area-notificacao").append(`
                <div class="toast mb-3" role="alert" aria-live="assertive" arial-atomic="true" data-delay="2500">
                    <div class="toast-header bg-warning">
                        <strong class="mr-auto text-light pr-5 mr-5">Sistema</strong>

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg>
                        <button type="button" class="close" data-bs-dismiss="toast aria-label="Close">
                    </div>

                    <div class="toast-body">
                        Houve um erro ao adicionar a página aos favoritos, tente novamente!
                    </div>
                </div>
            `)

            //metodo para exibir o toast
            $(".toast").toast("show")

            //metodo para remover o toast
            $(".toast").on("hidden.bs.toast", (e) => {
                $(e.currentTarget).remove()
            })
        }
    })
}