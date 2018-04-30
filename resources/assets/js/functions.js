window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
$(document).ready(function(){
    Vue.component("navbar-links", require("./components/Navbar.vue"))
    
    const app = new Vue({
        el: '#app'
    });
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        }
    });
    $("#logout").on("click", function(event){
        event.preventDefault();
        $.post("/logout").done(function(){
            location.reload()
        })
    });
    try {
        CKEDITOR.replace('description');
    } catch (error) {
        
    }
    $(".destroy").click(function(){
        event.preventDefault();
        $.post($(this).attr("href"), {
            _method: "DELETE"
        }).done(function(data){
        }).catch(function(){
            toastr.error("Error");
        })
    })
})