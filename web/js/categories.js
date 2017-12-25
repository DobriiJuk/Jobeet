/**
 * Created by artio on 12/6/2017.
 */
var $collectionHolder=$('#job_categories');

var $addCategoryLink=$('<a href="#" class="add_catategory_link">Add Category Link</a>');
var $newLinkLi=$('<div></div>').append($addCategoryLink);

$(function(){
    //$collectionHolder=$('#job_categories');
    $collectionHolder.append($newLinkLi);
    $collectionHolder.data('index',$collectionHolder.find(':input').length);

    $addCategoryLink.on('click',function(e){
        e.preventDefault();
        addCategoryForm($collectionHolder,$newLinkLi);
    });
});

function addCategoryForm($collectionHolder, $newLinkLi){
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;
    newForm = newForm.replace(/__name__/g, index);
    $collectionHolder.data('index',index+1);
    var $newFormLi= $('<div></div>').append(newForm);
    $newLinkLi.before($newFormLi);
}