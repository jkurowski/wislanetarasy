
//Using an object literal for a jQuery feature
var multipage = {
    init: function( settings ) {
        multipage.config = {
            url				: null,
            relUrl			: null,
            lang			: 'pl/',
            curUrl			: '',
            lock			: 0,
            menu			: 1,
            snap			: 0,
            offset			: 1,
            ready			: 0,
            menuSelector    : "#nav-multipage a, .navbar a",
            navSelector   : '#nav-multipage'
        };
        //allow overriding the default config
        $.extend( multipage.config, settings );

        multipage.setup();

        $( window ).resize( multipage.resize );
        $( window ).scroll( multipage.scroll );

        if( !multipage.config.snap )
            setInterval( function() { multipage.scroll( 'timer' ) } , 1000 );
    },
    setup: function() {
        multipage.initMultipage();
    },
    resize: function() {
        multipage.scroll( 'timer' );
    },
    scroll: function( opt ) {

        if( multipage.config.lock || multipage.config.snap ) return;

        var loadOffset = multipage.config.offset+10;
        var pageOffset = 100;
        var limitTop = $(document).scrollTop();
        var limitBottom = $(document).scrollTop() + $( window ).height();
        var position, height, value;

        $( 'section' ).each( function( id, el ) {

            if( !multipage.config.menu ){
                position = $(el).position();
                height = $(el).height();
                value = $(el).data('url');
                posTop = position.top;
                posBottom = position.top + height;

                if( posTop - pageOffset <= limitTop &&  posBottom - pageOffset >= limitTop ){
                    multipage.changeAddress( value );
                }
            }

            if( !$(el).hasClass('loaded') ){

                if( multipage.config.menu ){
                    position = $(el).position();
                    height = $(el).height();
                    value = $(el).data('url');
                    posTop = position.top;
                    posBottom = position.top + height;
                }

                //scroll up
                if( posTop - loadOffset <= limitTop && posBottom - loadOffset >= limitTop ){
                    if( opt=='timer' ) multipage.showPage( value, 0 );//scrollOnce
                    else multipage.showPage( value, 'scrollOnce' );//scrollOnce
                }

                //scroll down
                else if( posBottom + loadOffset >= limitBottom &&  posTop + loadOffset <= limitBottom ){
                    multipage.showPage( value, 0 );
                }

                //scroll inside
                else if( posTop >= limitTop &&  posBottom <= limitBottom ){
                    multipage.showPage( value, 0 );
                }

            }
        });
    },

    validateLink: function( el ) {

        var href = jQuery( el ).attr( 'href' ).replace( '#', '' );
        if( !href ||  jQuery( el ).attr( 'href' ).length < 1 )
            return 0;

        if( href.indexOf('captcha') > 0 )
            return 0;

        if( href.indexOf('ajax') > 0 )
            return 0;

        if( href.indexOf('ajax') > 0 )
            return 0;

        if( href.indexOf('.jpg') > 0 )
            return 0;

        if( href.indexOf('.png') > 0 )
            return 0;

        if( href.indexOf('.gif') > 0 )
            return 0;

        return 1;
    },

    prepareSectionName: function( name ) {

        if( !name || name=='' ) return name;

        name = name.replace( multipage.config.url, '').replace( multipage.config.lang, '' ).replace( document.location.hash, '' ).replace( '#', '' ).replace( /[^A-Za-z0-9\-]+/g, "" );

        return name;
    },

    initMultipage: function() {

        $('body').addClass('enable_multipage');
        //handle history
        if ( !$('html').hasClass('no-history') ) {
            $.address.state( multipage.config.url ).init(function(event) {})
        }
        else{
            $.address.state( multipage.config.relUrl ).init(function(event) {})
        }
        $.address.externalChange( multipage.onChangeAddress );

        $('[data-spy="scroll"]').each(function () {
            var $spy = $(this);
            $spy.scrollspy($spy.data())
        });

        multipage.initClicks();

        multipage.initNavigation();

        multipage.initDocument();

        if( multipage.config.snap ){
            multipage.initSnap();
        }
    },


    initDocument: function() {

        hashView = multipage.prepareSectionName( document.location.hash );

        if( hashView && jQuery( 'section[name=' + hashView + ']' ).length ){
            //initialView = multipage.prepareSectionName( document.location.hash );
            document.location.href = multipage.config.url + multipage.config.lang + hashView;
        }
        else{
            var initialView = document.location.href.replace( multipage.config.url, '' );
            if( initialView.indexOf( '?' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '?' ) );
            if( initialView.indexOf( '/p/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/p/' ) );
            if( initialView.indexOf( '/id/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/id/' ) );
            if( initialView.indexOf( '/sort/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/sort/' ) );
            if( initialView.indexOf( '/date/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/date/' ) );
            if( initialView.indexOf( '/type/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/type/' ) );
            if( initialView.indexOf( '/desc/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/desc/' ) );
            if( initialView.indexOf( '/asc/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/asc/' ) );
            if( initialView.indexOf( '/lang/' ) > -1 )
                initialView = initialView.substr( 0, initialView.indexOf( '/lang/' ) );

            initialView = multipage.prepareSectionName( initialView );
        }



        if(!initialView.length){
            initialView = 'no-initial-section';
        }

        if( !jQuery( 'section[name=' + initialView + ']' ).length){
            initialView = jQuery( 'section' ).eq(0).data('url');
            multipage.showPage( initialView, 'stay' );
        }
        else{
            multipage.showPage( initialView, 'move' );
        }

        setTimeout( function() {
            multipage.config.ready = 1;
        }, 100);
    },


    initClicks: function() {

        //prevent default click - nav
        jQuery(multipage.config.menuSelector).click( function( e ) {

            if( !multipage.validateLink( this ) )
                return;

            var value = multipage.prepareSectionName( jQuery( this ).data( 'url' ) );

            if( jQuery( 'section[name=' + value + ']' ).length ){
                e.preventDefault();
                multipage.config.lock = 0;
                multipage.showPage( value, 'scroll' );

                if( !multipage.config.menu ) multipage.changeAddress( value );
            }
        });

        //prevent default click - sections
        jQuery( 'section a' ).live("click", function(e){

            if( !multipage.validateLink( this ) )
                return;

            var value = multipage.prepareSectionName( jQuery( this ).attr( 'href' ) );

            if( jQuery( 'section[name=' + value + ']' ).length ){
                e.preventDefault();
                multipage.config.lock = 0;
                multipage.showPage( value, 'scroll' );

                if( !multipage.config.menu ) multipage.changeAddress( value );
            }

        });
    },

    initNavigation: function() {

        //handle nav activation - scrollspy
        $(window).on('activate.bs.scrollspy', function( e, el ) {

            var relatedTarget = $(multipage.config.navSelector);

            $(relatedTarget).find('.nav-item').removeClass('active');
            $(relatedTarget).find('a.active').parent().addClass('active');

            if( $(relatedTarget).find('a.active') && $(relatedTarget).find('a.active').data('url') ) {
                url = $(relatedTarget).find('a').data('url');
            }
            if( $(relatedTarget).find('a.active') && $(relatedTarget).find('a.active').data('url') ) {
                url = $(relatedTarget).find('a.active').eq(-1).data('url');
            }
            url = multipage.prepareSectionName( url );

            if( multipage.config.menu ){
                multipage.changeAddress( url );
            }
        });
    },

    changeAddress: function( url ) {

        pageUrl = multipage.config.lang+url;
        if( !url || pageUrl == multipage.config.curUrl ) return;

        multipage.config.curUrl = pageUrl;
        if( $.address.value().indexOf( pageUrl ) < 0 && !$("section[data-url="+url+"]").hasClass('one-page-content') && !$("section[data-url="+url+"]").hasClass('no-loading')){

            $.address.value( pageUrl );
            // $.address.title( $("section[data-url="+url+"]").data('name') );
        }
    },

    onChangeAddress: function( data ) {

        url = data.pathNames[data.pathNames.length-1];
        multipage.scrollTo( url );
    },

    showPage: function( pageUrl, mod ) {

        pageUrl = multipage.prepareSectionName( pageUrl );
        var elemSelector = "section[data-url="+pageUrl+"]";

        if( multipage.config.lock || typeof(pageUrl)=='undefined' ) return;

        multipage.config.lock = 1;
        setTimeout( function() { multipage.config.lock = 0 }, 750);

        if( mod=='scroll' ) {
            multipage.scrollTo( pageUrl );
        }
        if( mod=='move' ){
            multipage.moveTo( pageUrl );
            return;
        }
        if( mod=='stay' ){
            multipage.config.lock = 0;
        }

        if( !$(elemSelector).hasClass('loaded') && !$(elemSelector).hasClass('waiting') ){

            $(elemSelector).addClass('waiting');
            var heightPrev = $(elemSelector).height();
            var scrollPrev = $(document).scrollTop();

            $.ajaxSetup({'cache':true});
            $.ajax({
                url: multipage.config.url+'ajax/'+multipage.config.lang+pageUrl
            })
                .done( function ( data ) {

                    $(elemSelector).addClass('loaded');
                    $(elemSelector).removeClass('waiting');
                    $(elemSelector).removeClass('loading');
                    $(elemSelector).html( '<div class="loader"></div>'+data);
                    //$(elemSelector).find('.loader').css('height', $(window).height() );

                    multipage.initScrollSpy();
                    setTimeout( function() { multipage.initScrollSpy(); }, 500);
                    multipage.initFitImage( elemSelector + " .image-fit" );
                    //website.initLazyLoad( elemSelector+" img.lazy" );
                    //$( elemSelector+" img.lazy" ).filter(":in-viewport").trigger('scroll');
                    website.setup( elemSelector );
                    setTimeout( function() {
                        website.initLazyLoad( elemSelector+" img.lazy" );
                        $( elemSelector+" img.lazy" ).filter(":in-viewport").trigger('scroll');
                    }, 500);

                    $(elemSelector+' .loader').fadeOut(750);

                    if( mod=='scrollOnce' ) {
                        $(document).scrollTop( $(document).scrollTop() + $(elemSelector).height() - heightPrev - 50 );
                    }

                    if( typeof ga === "function" && typeof ga.getAll === "function" ){
                        tracker = ga.getAll()[0];
                        tracker.send('pageview', {
                            'page': multipage.config.lang+pageUrl,
                            'title': $(elemSelector).data('name')
                        });
                    }
                    else if( typeof ga === 'function' ){
                        ga('send', 'pageview', {
                            'page': multipage.config.lang+pageUrl,
                            'title': $(elemSelector).data('name')
                        });
                    }
                })
                .fail( function( jqXHR, textStatus, errorThrown ) {
                    $(elemSelector).removeClass('loaded');
                    $(elemSelector).removeClass('waiting');
                    $(elemSelector).addClass('loading');
                })
            ;
        }

    },

    scrollTo: function( obj ) {

        if( !multipage.config.ready )
            return;

        obj = multipage.prepareSectionName( obj );

        if( jQuery( 'section[name=' + obj + ']' ).length ) {
            if( multipage.config.snap ){
                var index = $('section').index( $('section[name=' + obj + ']') );
                $.fn.fullpage.moveTo( index+1 );
            } else {
                var offset = 0;
                if( jQuery( 'section[name=' + obj + ']' ).data('url') != jQuery( 'section:first-of-type' ).data('url') )
                    offset = jQuery( 'section[name=' + obj + ']' ).offset().top - multipage.config.offset; //- 80

                if(offset && multipage.config.mobile)
                    offset -= $('.menu-holder').height();

                jQuery( 'html, body' )
                    .stop(true,false)
                    .animate( { scrollTop : offset }, 500, 'easeInOutExpo', function() {

                        setTimeout( function() {
                            multipage.config.lock = 0;
                        }, 100);
                    } );
            }
        }
    },

    moveTo: function( obj ) {

        obj = multipage.prepareSectionName( obj );

        if( jQuery( 'section[name=' + obj + ']' ).length ) {
            if(multipage.config.snap) {
                var index = $('section').index( $('section[name=' + obj + ']') );
                if(!!($.fn.fullpage.silentMoveTo && $.fn.fullpage.silentMoveTo.constructor && $.fn.fullpage.silentMoveTo.call && $.fn.fullpage.silentMoveTo.apply))
                    $.fn.fullpage.silentMoveTo( index+1 );
            } else {
                var offset = 0;
                if( jQuery( 'section[name=' + obj + ']').data('url') != jQuery( 'section:first-of-type' ).data('url') )
                    offset = jQuery( 'section[name=' + obj + ']' ).offset().top - multipage.config.offset;

                if(offset && multipage.config.mobile)
                    offset -= $('.menu-holder').height();

                jQuery( 'html, body' )
                    .stop(true,false)
                    .animate( { scrollTop : offset }, 0, 'easeInOutExpo', function() {
                        setTimeout( function() {
                            multipage.config.lock = 0;
                        }, 500);
                    } );
            }

        }
    },

    //Init all lazy images based on .lazy class
    initScrollSpy: function() {

        if( $('[data-spy="scroll"]')!=null && $('[data-spy="scroll"]').length > 0 ){
            $('[data-spy="scroll"]').each(function () {
                var $spy = $(this).scrollspy('refresh');
            });
        }
    },

    //Init all fancy box galleries based on rel=lightbox-gallery
    initFitImage: function( obj ) {
        $(obj).each(function( id, el ) {
            website.fitImage( $(el), $(el).find('img') );
        });
    },

    initSnap: function( ) {
        //$.fn.fullpage.destroy();
        $('#multipage').fullpage({
            scrollingSpeed: 1000,
            sectionSelector: 'section',
            scrollBar: true,
            //autoScrolling: false,
            //fitToSectionDelay: 1000,
            onLeave: function(index, nextIndex, direction){

                var url = $('section').eq(nextIndex-1).data('url');

                if( url ){
                    multipage.changeAddress( url );
                    multipage.showPage( url, 'stay' );
                }

                multipage.initFlip(index, nextIndex, direction);
            }
        });


        setTimeout( function() {
            var url = $('section').filter('.loaded').data('url');
            multipage.moveTo( url );
        }, 100);
    },

    initFlip: function( index, nextIndex, direction ) {

        if ( direction == 'down' ) {
            $('.s'+index).find('.flipbox').addClass('active');
        }
        if ( direction == 'up' ) {
            $('.s'+nextIndex).find('.flipbox').removeClass('active');
        }
    }

};
