function buildComment(data) {
    var comments = ''; 
    data.comments.forEach(comment => {
        comments += 
        `
            <article class='comment'> 
                <p class='uid'>${comment.uid}</p>
                <p class='message'>${comment.message}</p>
                <form class='delete-form' method='POST' action=''>
                    <input type='hidden' name='cid' value='${comment.cid}'>   
        `;

        if(data.user === comment.uid){
            comments += "<button type='submit' name='comment-delete'>Delete</button>";
        }

        comments += "</form></article>";
    }); 
    
    return comments;
}

function listComments () {
    var pathArray = window.location.pathname.split('/');
    var recipeId = pathArray[4];

    $.ajax({
        url: "http://localhost/tastyajax/recipes/showComments/"+recipeId,
        dataType: "JSON",
        success: function (data) {
            var comments = buildComment(data);
            $('.comments').html(comments);    
        }
    });
}

$(document).ready(function(){
    
    listComments();

    setInterval(function(){
       listComments();
    }, 10000);

    $('#comment-form').on('submit', function (e) {

        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "http://localhost/tastyajax/recipes/addComment",
            method: "POST",
            data: formData,
            success: function(res){
                listComments();
                $("#comment-form")[0].reset();
            }
        });
    });

    $('.comments').on('submit', '.delete-form', function (e) {
        
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "http://localhost/tastyajax/recipes/deleteComment",
            method: "POST",
            data: formData,
            success: function(res){
                listComments();
            }
        });
    });
});