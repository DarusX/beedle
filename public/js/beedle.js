
$(document).ready(function(){
    resizeContainer();
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
        $.ajax({
            url: $(this).attr("href"),
            method: "DELETE"
        }).done(function(data){
            location.reload()
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
});
function validateCode(){
    $.ajax({
        url: "/cliente/deal/validate",
        method: "POST",
        data: $("#form-deal-code").serialize(),
        success: function(data){
            if (data=="") {
                toastr.error("Cupón invalido")
            } else {
                $("#modal-coupon").modal("toggle")
                modalSelectColor(data)
            }
        }
    })
}
function modalSelectColor(data){
    $("#modal-select-color").modal("toggle")
    $("#deal-title").html(data.product.product)
    $("#deal-quantity").val(data.quantity)
    $("#deal-product_id").val(data.product.id)
    $("#img-deal").attr("src", "/" + data.product.photos[0].photo);
    $("#deal-color").empty();
    $.each(data.product.colors, function(key, value){
        $("#deal-color").append("<option value ='" + value.id +"'>" + value.color + "</option>")
    })
}
function modalAddress(){
    $.ajax({
        url: "/json/state/all",
        success: function(data){
            $("#state_id").empty();
            $("#state_id").append($("<option></option>"));
            $.each(data, function(key, value){
                $("#state_id").append($("<option></option>").append(value.state).attr({
                    value: value.id,
                }));
            })
        }
    })
    $("#municipality_id").empty();
    $("#modalAddress").modal("toggle");
}
function loadMunicipalities(){
    $.ajax({
        url: "/json/state/" + $("#state_id").val(),
        success: function(data){
            $("#municipality_id").empty();
            $("#municipality_id").append($("<option></option>"));
            $.each(data.municipalities, function(key, value){
                $("#municipality_id").append($("<option></option>").append(value.municipality).attr({
                    value: value.id,
                }));
            })
        }
    })
}
function resizeContainer(){
    $("#main").css("min-height", window.innerHeight);
}
$("#form-deal-code").keypress(function(){
    if (event.keyCode === 13) {
        event.preventDefault();
        validateCode()
    }
})