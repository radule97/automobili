$(document).ready(function () {

    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();

        //console.log($(this).attr('href').split('page=')[1]);
        var page =  $(this).attr('href').split('page=')[1];

        getProductPage(page);
    });

    function getProductPage(page){
        $.ajax({
            url: '/cars?page='+page
        }).done(function(data){
            //console.log(data);
            $('body').html(data);
        });
    }


    $('.category-select').on('change', function(){
        /*$('category-form').submit();*/
        var token = $('input[name=_token]').val();
        var catId = $('.category-select').val();

        //console.log(" token: "+token+" id: "+catId);
        $.ajax({
            url: '/cars?_token='+token+"&category_id="+catId, /* URL LOOKS LIKE: /cars?_token=$token&category_id=$id*/
            type: "get",
            data: {category_id: catId}
        }).done(function(data){
            //console.log(data);
            $('body').html(data + "<script type=\"text/javascript\" src=\"js/pagination.js\" ></script>" + '<script type="text/javascript" src="js/fixselect.js"></script>');
        });

    });




    //console.log($('.id-category').text());
    //console.log($(".category-select option" ).val());




});
