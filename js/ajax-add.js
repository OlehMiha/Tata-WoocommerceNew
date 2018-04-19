jQuery(document).ready(function($){
     $("[data-src=#modal_basket]").click(function () {
         var productId = $(this).attr('data-product_id');

         var data = {
             id:productId,
             action: 'ajax_quick_viwe',
             noce: ajax_add.nonce
         }

         $.ajax({
             url:ajax_add.url,
             data: data,
             type: 'POST',
             dataType:'json',
             beforeSend:function (xhr) {
                $('#modal_basket').text('Загрузка');
             },
             success:function (data) {
                 $('#modal_basket').html(data.product);
             }


         });

     });
});