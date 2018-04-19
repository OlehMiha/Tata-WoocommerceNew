// custom scripts
jQuery(document).ready(function($) {
    $('#list').click(function(event){event.preventDefault();$('#catalog .wrap_product').removeClass('wrap_product_grid');$('#catalog .wrap_product').addClass('wrap_product_list');$('.info_product').removeClass('displaynone');});
    $('#grid').click(function(event){event.preventDefault();$('#catalog .wrap_product').removeClass('wrap_product_list');$('#catalog .wrap_product').addClass('wrap_product_grid');$('.info_product').addClass('displaynone');});
});


