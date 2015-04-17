(function($) {
    Drupal.behaviors.plusone = {
        attach: function (context, settings) {
           // Attach some code to the click event for the
           // link with class "plusone-link".
            $('a.plusone-link').click(function () {
            link = $(this).attr('href');
                $.post( link,{js: 1},
                    function(data){
                        // Update the number of votes.
                        $('div.score').html(data.total_votes);
                        // Update the "Vote" string to "You voted".
                        $('div.vote').html(data.voted);
                    },"json"
                );

        // Prevent the browser from handling the click.
        return false;

    });
        }
    };
})(jQuery);
