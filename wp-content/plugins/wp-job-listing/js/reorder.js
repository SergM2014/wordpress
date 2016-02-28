jQuery(document).ready(function($){
    var sortList = $('ul#custom-type-list');
    var animation= $('#loading-animation');
    var pageTitle =$('div h2');

    sortList.sortable({
        update: function(event, ui){
            animation.show();


            $.ajax({
                url:ajaxurl,
                type:'POST',
                dataType:'json',
                data:{
                    action: 'save_post',
                    order: sortList.sortable('toArray').toString()
                },
                success: function(response){
                   animation.hide();
                    pageTitle.after('<div id="message" class="updated "><p>Jobs sort order has benn saved</p></div>');
                },
                error: function(error){
                    animation.hide();
                   pageTitle.after('<div id="message" class="error "><p>There was an error saving the sort order, or you do not have the permission</p></div>');
                }


            })


        }
    });


});