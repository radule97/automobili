$(document).ready(function(){
    $('.category-select option').each(function() {
        if($('.id-category:first').text() !== $(this).val()){
            $(this).attr('selected', 'selected');
        }
    });
});