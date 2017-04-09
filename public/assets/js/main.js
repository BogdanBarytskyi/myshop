$(document).ready(function(){



    $('.add').on('click', function(){

        var id = $(this).data('id'),
            self = $(this);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: '/cart/'+id+'/1/'
        }).done(function( msg ) {
            self.text("Товр в корзине").addClass('btn-danger');
        });

    });

    $('.add__detail').on('click', function(){

        var id = $(this).data('id'),
            self = $(this);
        var  quantity = ($("#quantity").val()>0)? $("#quantity").val() : 1;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: '/cart/'+id+'/'+quantity+'/'
        }).done(function( msg ) {
            self.text("Товр в корзине").addClass('btn-danger');
        });

    });
});

$(document).ready(function(){
    //-- Click on detail
    $("ul.menu-items > li").on("click",function(){
        $("ul.menu-items > li").removeClass("active");
        $(this).addClass("active");
    })

    $(".attr,.attr2").on("click",function(){
        var clase = $(this).attr("class");

        $("." + clase).removeClass("active");
        $(this).addClass("active");
    })

    //-- Click on QUANTITY
    $(".btn-minus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now)){
            if (parseInt(now) -1 > 0){ now--;}
            $(".section > div > input").val(now);
        }else{
            $(".section > div > input").val("1");
        }
    })
    $(".btn-plus").on("click",function(){
        var now = $(".section > div > input").val();
        if ($.isNumeric(now)){
            $(".section > div > input").val(parseInt(now)+1);
        }else{
            $(".section > div > input").val("1");
        }
    })
})