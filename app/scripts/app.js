'use strict';

//
// Require lib
// -------------------------

var $ = require('jquery'),
    TweenMax = require('gsap');

require('waypoints');

TweenLite.defaultEase = Power1.easeInOut;

function App() {

    var _this = this;

    this.width;
    this.height;
    var $submenuWrapper = $('.submenu-wrapper');

    App.prototype.initialize = function(){

        this.resize();
        this.events();
        
        // hide loader :
        // TweenMax.to("#loader", 0.3, { opacity: 0, onComplete: function(e){            
        //     console.log('website load');            
        // }});
        
        var menuContentFixedHeight = $('.menu-fixed-content').height();
        $('.menu-fixed-content').css({'margin-top': -(menuContentFixedHeight/2)+'px'});

        $('.submenu').css({
            'margin-left': -($('.wrapper').width()/2)+'px'
        });

        if ( $('body').hasClass('home') ){
            $('.bloc-link-container').show();
        }else {
            $('.bloc-link-container').hide();
        }

        if ($(window).width() < 769){
            $('body').addClass('mobile');
            $('.menu-fixed-content').hide();
            $('.principal-menu').hide();
            $('.bloc-link-wrapper').hide();
            $('.meet-expert-wrapper').slick({
                dots:true,
                arrows:false
            });
        }        

        // resize
        // -------------------------
        $(window).resize(function(){
            _this.resize();
        });

    };

    //
    // Events
    // -------------------------
    App.prototype.events = function() {
        //
        // Events Menu
        // -------------------------
        if( $(window).width() > 768 ){
            $('.first-menu-li').hover( function(e){
                if ($(this).hasClass('haschild')){
                    TweenMax.to('header', 0.4, {
                        height: 180,
                        onStart: function(){
                            $(this.target[0]).addClass('open active');
                        },
                        overwrite: true
                    });
                    TweenMax.to($(this).find('.submenu'), 0.6, {
                        opacity: 1,
                        visibility: 'visible'
                    });
                }                
            }, function(){
                TweenMax.to('header', 0.3, {
                    height: 90,
                    onStart: function(){
                        $(this.target[0]).removeClass('open active');
                    },
                    overwrite: true
                });
                TweenMax.to($(this).find('.submenu'), 0.4, {
                    opacity: 0,
                    visibility: 'hidden'
                });
            });

            //
            // Events Bloc Link Infos
            // -------------------------
            $(document).on('mouseover', '.link-infos-bloc', function(e){
                $('.link-infos-bloc').addClass('mini');
                $(this).removeClass('mini').addClass('expand');
            });

            $(document).on('mouseout', '.link-infos-bloc', function(e){
                $('.link-infos-bloc').removeClass('mini');
                $(this).removeClass('expand');
            });
        }
            $('.headlight-slider').slick({
                dots:true,
                arrows:true
            });

            $('.mobile-menu-open').on('click', function(e){
                $('.header').toggleClass('open-mobile');
                $('.nav-mobile').toggleClass('open-mobile');
                $('.main-content').toggleClass('open-mobile');                
            });

            // Handler NAV
            // -------------------------
            $('.menu-fixed-content a').on('click', function(e){
                e.preventDefault();
                $('.menu-fixed-content li').removeClass('active');
                $(this).parent().addClass('active');

                var top = $( $.attr(this, 'href') ).offset().top;

                $('html, body').animate({
                    scrollTop: top + (($(window).scrollTop() > top) ? -1 : 1)
                }, 500);
                
            });

            var offsetSection = '0';
            $('.subpage-content').waypoint(function(direction) {
                var element = $(this.element);
                var prev = $(this.element.previousElementSibling);
                var idLink = element.attr('id');
                var $fil = $('.menu-fixed-content');

                $('.menu-fixed-content a').parent().removeClass('active');
                $('.menu-fixed-content a[href="#'+idLink+'"]').parent().addClass('active');

            }, {offset: offsetSection});
        // },100);        

        //
        // Events Bloc Link More
        // -------------------------
        $(document).on('mouseover', '.link-more-bloc', function(e){
            $(this).addClass('hover');
        });

        $(document).on('mouseout', '.link-more-bloc', function(e){
            $(this).removeClass('hover');
        });

        
    };

    //
    // Resize stage
    // -------------------------
    App.prototype.resize = function() {
        this.width = window.innerWidth;
        this.height = window.innerHeight;
        if ($(window).width() < 769){
            $('body').addClass('mobile');
            $('.menu-fixed-content').hide();
            $('.mobile-menu-open').show();
            $('.principal-menu').hide();
            $('.bloc-link-wrapper').hide();
            $('.meet-expert-wrapper').slick({
                dots:true,
                arrows:false
            });
        }else {
            $('.principal-menu').show();
            $('.mobile-menu').hide();
            $('.menu-fixed-content').show();
        }
    };


    App.prototype.calculateAspectRatioFit = function(srcWidth, srcHeight, maxWidth, maxHeight) {
        var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);

        return { width: srcWidth*ratio, height: srcHeight*ratio };
    };

    this.initialize();
}

// init app
// window.onload = new App();
$(window).load(function(){
    new App();
});