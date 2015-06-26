'use strict';

//
// Require lib
// -------------------------

var $ = require('jquery'),
    TweenMax = require('gsap');

TweenLite.defaultEase = Power1.easeInOut;

function App() {

    var _this = this;

    this.width;
    this.height;

    App.prototype.initialize = function(){

        this.resize();
        this.events();

        // hide loader :
        // TweenMax.to("#loader", 0.3, { opacity: 0, onComplete: function(e){            
        //     console.log('website load');            
        // }});

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
    };


    App.prototype.calculateAspectRatioFit = function(srcWidth, srcHeight, maxWidth, maxHeight) {
        var ratio = Math.min(maxWidth / srcWidth, maxHeight / srcHeight);

        return { width: srcWidth*ratio, height: srcHeight*ratio };
    };

    this.initialize();
}

// init app
window.onload = new App();