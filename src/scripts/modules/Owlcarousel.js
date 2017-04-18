function Owlcarousel($element) {
    this.elements.owl = $element;
    this.init();
    return {};
}

Owlcarousel.prototype = new Module;
Owlcarousel.prototype.constructor = Owlcarousel;

Owlcarousel.prototype.variables = {
    owlObject: undefined,
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
    },]
};

Owlcarousel.prototype.options = {
    items: 1,
    loop: true,
    nav: true,
    dots: true,
    dotsData: false,
    lazyLoad: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsiveClass: true,
    responsivetype: 0,
    responsive: undefined,
    animateIn: undefined,
    animateOut: undefined,
    smartSpeed: 200,
    slideBy: 2,
    navSpeed: 300,
    dotsSpeed: 250,
    touchDrag: true,
    mouseDrag: false,
    filter: false,
    navText: [
      "<div class='blue-circle'><i class='icon icon-arrow-left'></i></div>",
      "<div class='blue-circle'><i class='icon icon-arrow-right'></i></div>"
    ],
    scrollleft: false,
};

Owlcarousel.prototype.init = function() {

    var data = this.elements.owl.data(),
        self = this;

    if (data.dotsdata) {
        data.dotsData = data.dotsdata;
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

    if(options.filter) {
        this.options.filter = options.filter;
    }

    options.responsive = this.variables.responsivetypes[options.responsivetype];

    this.variables.owlObject = this.elements.owl.owlCarousel(options);

};