
$(document).ready(function(){
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
    
    $(".destroy").click(function(){
        event.preventDefault();
        $.post($(this).attr("href"), {
            _method: "DELETE"
        }).done(function(data){
            location.reload();
        }).catch(function(){
            toastr.error("Error");
        })
    })
    $("#coupon-link").click(function(){
        event.preventDefault();
        $("#modal-coupon").modal("toggle");
    })
    $.get("/json/category/all").done(function(data){
        data.forEach(category => {
            $("#categories-menu").append("<a>" + category.category + "</a>");
            $("#categories-menu a").last().attr("href", "/categorias/" + category.category)
        });
    })
    $.get("/json/brand/all").done(function(data){
        data.forEach(brand => {
            $("#brands-menu").append("<a>" + brand.brand + "</a>");
            $("#brands-menu a").last().attr("href", "/marcas/" + brand.brand)
        });
    })
})