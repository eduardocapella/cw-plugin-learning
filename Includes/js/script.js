jQuery(document).ready(function($) {
    
    $headings = $( 'body' ).find( 'h3' );
    // console.log( $headings );

    $url = $(location).attr( 'href').split('#')[0];
    $site_url = $(location).attr( "origin" );
    console.log('$url', $url, $site_url);

    $headings.each(function(i) {

        let $title = $(this).text();
        
        let $slug = slugify( $title );

        $(this).attr( 'id', $slug );

        let $copyText = $url + '#' + $slug;
        
        console.log( $title, $title_slugfied, $url, $copyText );

        $(this).append( '<a href="'+ $copyText + '" style="display:inline-block; min-width:20px;min-height:20px; background-color=black"><img src="' + $site_url + '/plugins-tests/wp-content/plugins/cw-plugin-learning/includes/img/cwpl-copy-url-link.svg" ></a> ');

        $(this).click(function(e) {
            e.preventDefault();
            navigator.clipboard.writeText( $copyText );
        })

    });


    

    function slugify( $stringToSlugify ) {

        $title_slugfied = $stringToSlugify.toLowerCase();

        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to   = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            $title_slugfied = $title_slugfied.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        $title_slugfied = $title_slugfied.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

        return( $title_slugfied );
    }


});