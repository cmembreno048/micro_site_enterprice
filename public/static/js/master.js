'use strict'


var urlname = window.location.protocol + '//' + window.location.host;

window.addEventListener('DOMContentLoaded', (event) => {

    

    setTimeout(() => {
        $(".alert").fadeOut("slow")
    }, 5000);


    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
                
                nav.classList.toggle('show-side')
                
                toggle.classList.toggle('fa-bars')

                toggle.classList.toggle('fa-times')
                
                bodypd.classList.toggle('body-pd')

                bodypd.classList.toggle('pd-normal')
                
                headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')

    $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
            }
        });
    });
      
});


function showModalDeleteJs(id, goToFunction){

    document.getElementById('modal_delete').innerHTML = 
    `
    <div class="modal fade" id="modal_show_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body centerf">
                    <img  src="${urlname}/advertencia.png" style="width:100px" class="p-2 img-fluid centerf" >
                </div>
                <div class="modal-footer centerf">
                    <a type="button" class="btn btn-danger" data-dismiss="modal">No, cerrar</a>
                    <a type="button" href="${urlname}${goToFunction}${id}"  class="btn btn-success">Si, Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    `

    $('#modal_show_delete').modal('show')

}

function changeImage(){
    document.getElementById('photoloaded').innerHTML = ""
    document.getElementById('photoloaded').innerHTML = "<p style='color:green'><i class='far fa-check-circle'></i> Imagen lista para subir al servidor</p>"
}