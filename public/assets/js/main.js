$(function(){

    $('.add').on('click', function(){
        var id = $(this).data('id'),
            self = $(this);

        $.post('/add_product/'+id,function(res){
            self.text("Товр в корзине").addClass('btn-danger');
        });
    });

});