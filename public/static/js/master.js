'use strict'
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
                
                nav.classList.toggle('show')
                
                toggle.classList.toggle('fa-bars')
                
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
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
            }
        });
    });
    
   
        
});