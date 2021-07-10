// toggle menu on/off 
$("#menu-toggle").click((e) => {
    e.preventDefault()
    $("#wrapper").toggleClass("toggled")
    $(".menuButton").toggleClass("buttonMenuToggled")
})

// impede que o formulario dê submit na página
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