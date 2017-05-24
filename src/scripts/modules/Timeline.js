function Timeline() {
    return {
        init: this.init.bind(this),
    };
}

Timeline.prototype = new Module();
Timeline.prototype.constructor = Timeline;

Timeline.prototype.elements = {};

Timeline.prototype.vars = {
};

Timeline.prototype.selectors = {
    timelines: undefined,
};

Timeline.prototype.init = function() {

    this.selectors.timelines = jQuery('.js-timeline');

    if(this.selectors.timelines.length == 0) return;
    
    jQuery('.js-timeline__nav').on('click', function(){
        var id = jQuery(this).data("id");
        console.log(id);
        jQuery('.js-timeline__nav').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.js-timeline__content').removeClass('active');
        jQuery('.js-timeline__content[data-id="'+ id +'"]').addClass('active');
    });

};
