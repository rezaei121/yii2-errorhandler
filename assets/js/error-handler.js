$(document).ready(function(){
    $('#search-buttons button').click(function(){
        var id = $(this).attr('id');
        var title = $(this).attr('title');
        var search = $('.header h2').html();

        $('#search-result').html('<div class="search-title">please wait...</div>');

        var result = '<div class="search-title">'+title+'</div>';


        $.get('errorhandler',{'item': id, 'search': search},function(data){
            var i = 1;
            if(!data)
            {
                $('#search-result').html(result + '<div class="search-item"><div class="search-item-line">#</div>No results found!</div>');
            }
            else
            {
                $.each(data, function(title, link) {
                    result += '<div class="search-item"><div class="search-item-line">'+i+'</div><a href="'+link+'" target="_blank">'+title+'</a></div>';
                    i++;
                });
                $('#search-result').html(result);
            }
        })
    });
});