// arquivo para deletar, faz processamento no banco

// função para deletar a página dos favoritos
function deletarFavorito(nome, caminho)
{
    let nomeFav = nome
    let caminhoFav = caminho

    let url = "../../ajax/deletaFavorito.php"
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
            star.src = "../../assets/star-fill.svg"

            favoritarBtn = document.getElementById("botao-favoritar")
            favoritarBtn.setAttribute("onclick", "cadastrarFavorito(`" + nomeFav + "`,`" + caminhoFav + "`)")
        
            $("#area-notificacao").append(`
                    <div class="toast mb-3" role="alert" aria-live="assertive" arial-atomic="true" data-delay="2500">
                        <div class="toast-header bg-danger">
                            <strong class="mr-auto text-light pr-5 mr-5">Sistema</strong>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                            <button type="button" class="close" data-bs-dismiss="toast aria-label="Close">
                        </div>

                        <div class="toast-body">
                            Pagina removida dos favoritos!
                        </div>
                    </div>
            `)

            //metodo para exibir o toast
            $(".toast").toast("show")


            // comando para fazer com que a notificação desapareça antes que o usuario tente executar outra ação
            setTimeout(_ => {
                $("#botao-favoritar").prop("disabled", false)
            },2700)
            $("#botao-favoritar").prop("disabled", true)

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
                        Houve um erro ao remover a página dos favoritos, tente novamente!
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

    // caso a requisição falhe
    request.fail( answer => {
        console.log(answer)
    })
    
    // quando a requisição for concluida
    request.always( _ => {
        // ...
    })
}

// função para confirmar a exclusão do produto após o botão mudar de comportamento
function confirmarExclusaoProduto(codigo)
{
    let url = "../../ajax/deletarProduto.php"
    let data = "codigo=" + codigo

    const request = $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: "json"
    })

    // se a requisiçaõ for feita
    request.done((jqXHR, textStatus) => {
        if(textStatus == "success")
        {
            if(request.responseJSON.length > 0)
            {
                $("#area-notificacao").append(`
                    <div class="toast mb-3" role="alert" aria-live="assertive" arial-atomic="true" data-delay="1500">
                        <div class="toast-header bg-warning">
                            <strong class="mr-auto text-light pr-5 mr-5">Sistema</strong>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg>
                            <button type="button" class="close" data-bs-dismiss="toast aria-label="Close">
                        </div>

                        <div class="toast-body">
                            Não é possível deletar este produto pois ele está referenciado em <strong>` + request.responseJSON.length +` remessa(s)</strong>
                        </div>
                    </div>
                `)

                //metodo para exibir o toast
                $(".toast").toast("show")

                //metodo para remover o toast
                $(".toast").on("hidden.bs.toast", (e) => {
                    $(e.currentTarget).remove()
                })

                // voltar o botão de deletar ao estado padrão
                $("#botaoDeletar" + codigo + " img").attr("src", "../../assets/trash-fill.svg")
                $("#botaoDeletar" + codigo).attr("onclick", "deletarProduto(" + codigo + ")")
            }
            else
            {
                // atualiza a lista :) 
                listProdutosForEdit()
            }
        }
        else
        {
            console.log("Error: " + jqXHR)
        }
    })
    
    // caso a requisição falhe
    request.fail( _ => {
        console.log("Errora: " + request.statusText)
    })

    // quando a requisição for concluida
    request.always( _ => {
        // ...
    })
}