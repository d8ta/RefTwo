function Owlcarousel($element) {
    this.elements.owl = $element;
    this.elements.owl.find(".js-owl-item").shuffle();
    this.init();

    return {};
}

Owlcarousel.prototype = new Module();
Owlcarousel.prototype.constructor = Owlcarousel;

Owlcarousel.prototype.variables = {
    responsivetypes: [{
        0: {
            items: 1
        },
        500: {
            items: 1
        },
        850: {
            items: 1
        }
    }, {
        0: {
            items: 1
        },
        500: {
            items: 1
        },
        850: {
            items: 1
        }
    }, ]
};

Owlcarousel.prototype.options = {
    items: 1,
    loop: true,
    nav: true,
    dots: true,
    dotsData: false,
    lazyLoad: true,
    autoplay: false,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsivetype: 0,
    responsive: undefined,
    animateIn: undefined,
    animateOut: undefined,
    smartSpeed: 200,
    slideBy: 2,
    navSpeed: 100,
    dotsSpeed: 100,
    touchDrag: true,
    mouseDrag: false,
    navText: [
        "<i class='icon'></i>",
        "<i class='icon'></i>"
    ],
    scrollleft: false,
};

Owlcarousel.prototype.init = function() {

    var data = this.elements.owl.data(),
        self = this;

    if (data.dotsdata) {
        data.dotsData = data.dotsdata;
    }




    if (!!data.icontop) {
        data.onInitialized = function() {
            self.elements.owl.find(".owl-stage-outer").before(self.elements.owl.find(".owl-dots"));
            self.elements.owl.find(".owl-stage-outer").before(self.elements.owl.find(".owl-nav"));
            self.elements.owl.find(".owl-dots").wrap('<div class="dots-wrapper"></div>');
            self.elements.owl.find(".owl-dots").wrap('<div class="dots-overflow-wrapper"></div>');
            jQuery("<div class='before-dots'></div>").insertBefore(self.elements.owl.find(".owl-dots"));
            jQuery("<div class='after-dots'></div>").insertAfter(self.elements.owl.find(".owl-dots"));
        };
    }

    if (typeof data.lazyload !== "undefined") {
        data.lazyLoad = data.lazyload;
    }

    var options = {};

    jQuery.extend(options, this.options, data);

    if (!options.responsive) {
        options.responsive = {};
    }


    if (data.animatein) {
        options.animateIn = data.animatein;
    }

    if (data.animateout) {
        options.animateOut = data.animateout;
    }

    if (!data.touchdrag) {
        options.touchDrag = data.touchdrag;
    }

    options.responsive = this.variables.responsivetypes[options.responsivetype];

    if (options.randomslide) {
        var slideCount = self.elements.owl.children().length;
        var random = Math.floor(Math.random() * slideCount);
        options.startPosition = random;

    }

    var owl = this.elements.owl.owlCarousel(options);

    owl.on('changed.owl.carousel', function(e) {
        if (options.scrollleft && Modernizr.touchevents) {
            var offset = 5,
                index = Math.max(e.item.index - offset, 0),
                widthDot = self.elements.owl.find(".owl-dot").eq(0).width(),
                widthDots = self.elements.owl.find(".dots-overflow-wrapper").eq(0).width(),
                left = Math.max((index * widthDot) - (widthDots / 2) + (widthDot * 3 / 2), 0);

            self.elements.owl.find(".dots-overflow-wrapper").animate({ scrollLeft: left }, 200);
        }

    });

};
