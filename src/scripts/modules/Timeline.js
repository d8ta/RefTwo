function Timeline() {
    return {
        init: this.init.bind(this),
    };
}

Timeline.prototype = new Module();
Timeline.prototype.constructor = Timeline;

Timeline.prototype.elements = {};

Timeline.prototype.vars = {
    eventsMinDistance: 150,
};

Timeline.prototype.selectors = {
    timelines: undefined,
};

Timeline.prototype.init = function() {
    this.selectors.timelines = jQuery('.timeline__horizontal');
    (this.selectors.timelines.length > 0) && this.initTimeline(this.selectors.timelines);
};


Timeline.prototype.initTimeline = function(timelines) {

    var that = this;
    timelines.each(function(){
        var timeline = jQuery(this),
            timelineComponents = {};
        //cache timeline components 
        timelineComponents['timelineWrapper'] = timeline.find('.events-wrapper');
        timelineComponents['eventsWrapper'] = timelineComponents['timelineWrapper'].children('.events');
        timelineComponents['fillingLine'] = timelineComponents['eventsWrapper'].children('.filling-line');
        timelineComponents['timelineEvents'] = timelineComponents['eventsWrapper'].find('a');
        timelineComponents['timelineDates'] = that.parseDate(timelineComponents['timelineEvents']);
        timelineComponents['eventsMinLapse'] = that.minLapse(timelineComponents['timelineDates']);
        timelineComponents['timelineNavigation'] = timeline.find('.timeline__horizontal__navigation');
        timelineComponents['eventsContent'] = timeline.children('.events__content');

        //assign a left postion to the single events along the timeline
        that.setDatePosition(timelineComponents, that.vars.eventsMinDistance);
        //assign a width to the timeline
        var timelineTotWidth = that.setTimelineWidth(timelineComponents, that.vars.eventsMinDistance);
        //the timeline has been initialize - show it
        timeline.addClass('loaded');

        //detect click on the next arrow
        timelineComponents['timelineNavigation'].on('click', '.next', function(event){
            event.preventDefault();
            that.updateSlide(timelineComponents, timelineTotWidth, 'next');
        });
        //detect click on the prev arrow
        timelineComponents['timelineNavigation'].on('click', '.prev', function(event){
            event.preventDefault();
            that.updateSlide(timelineComponents, timelineTotWidth, 'prev');
        });
        //detect click on the a single event - show new event content
        timelineComponents['eventsWrapper'].on('click', 'a', function(event){
            event.preventDefault();
            timelineComponents['timelineEvents'].removeClass('selected');
            jQuery(this).addClass('selected');
            that.updateOlderEvents(jQuery(this));
            that.updateFilling(jQuery(this), timelineComponents['fillingLine'], timelineTotWidth);
            that.updateVisibleContent(jQuery(this), timelineComponents['eventsContent']);
        });

        //on swipe, show next/prev event content
        timelineComponents['eventsContent'].on('swipeleft', function(){
            var mq = that.checkMQ();
            ( mq == 'mobile' ) && that.showNewContent(timelineComponents, timelineTotWidth, 'next');
        });
        timelineComponents['eventsContent'].on('swiperight', function(){
            var mq = that.checkMQ();
            ( mq == 'mobile' ) && that.showNewContent(timelineComponents, timelineTotWidth, 'prev');
        });

        //keyboard navigation
        $(document).keyup(function(event){
            if(event.which=='37' && that.elementInViewport(timeline.get(0)) ) {
                that.showNewContent(timelineComponents, timelineTotWidth, 'prev');
            } else if( event.which=='39' && that.elementInViewport(timeline.get(0))) {
                that.showNewContent(timelineComponents, timelineTotWidth, 'next');
            }
        });
    });
}

Timeline.prototype.updateSlide = function(timelineComponents, timelineTotWidth, string) {
    //retrieve translateX value of timelineComponents['eventsWrapper']
    var translateValue = this.getTranslateValue(timelineComponents['eventsWrapper']),
        wrapperWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', ''));
    //translate the timeline to the left('next')/right('prev') 
    (string == 'next') 
        ? this.translateTimeline(timelineComponents, translateValue - wrapperWidth + this.vars.eventsMinDistance, wrapperWidth - timelineTotWidth)
        : this.translateTimeline(timelineComponents, translateValue + wrapperWidth - this.vars.eventsMinDistance);
}

Timeline.prototype.showNewContent = function(timelineComponents, timelineTotWidth, string) {
    //go from one event to the next/previous one
    var visibleContent =  timelineComponents['eventsContent'].find('.selected'),
        newContent = ( string == 'next' ) ? visibleContent.next() : visibleContent.prev();

    if ( newContent.length > 0 ) { //if there's a next/prev event - show it
        var selectedDate = timelineComponents['eventsWrapper'].find('.selected'),
            newEvent = ( string == 'next' ) ? selectedDate.parent('li').next('li').children('a') : selectedDate.parent('li').prev('li').children('a');
        
        this.updateFilling(newEvent, timelineComponents['fillingLine'], timelineTotWidth);
        this.updateVisibleContent(newEvent, timelineComponents['eventsContent']);
        newEvent.addClass('selected');
        selectedDate.removeClass('selected');
        this.updateOlderEvents(newEvent);
        this.updateTimelinePosition(string, newEvent, timelineComponents, timelineTotWidth);
    }
}

Timeline.prototype.updateTimelinePosition = function(string, event, timelineComponents, timelineTotWidth) {
    //translate timeline to the left/right according to the position of the selected event
    var eventStyle = window.getComputedStyle(event.get(0), null),
        eventLeft = Number(eventStyle.getPropertyValue("left").replace('px', '')),
        timelineWidth = Number(timelineComponents['timelineWrapper'].css('width').replace('px', '')),
        timelineTotWidth = Number(timelineComponents['eventsWrapper'].css('width').replace('px', ''));
    var timelineTranslate = this.getTranslateValue(timelineComponents['eventsWrapper']);

    if( (string == 'next' && eventLeft > timelineWidth - timelineTranslate) || (string == 'prev' && eventLeft < - timelineTranslate) ) {
        this.translateTimeline(timelineComponents, - eventLeft + timelineWidth/2, timelineWidth - timelineTotWidth);
    }
}

Timeline.prototype.translateTimeline = function(timelineComponents, value, totWidth) {
    var eventsWrapper = timelineComponents['eventsWrapper'].get(0);
        value = (value > 0) ? 0 : value; //only negative translate value
        value = ( !(typeof totWidth === 'undefined') &&  value < totWidth ) ? totWidth : value; //do not translate more than timeline width
        this.setTransformValue(eventsWrapper, 'translateX', value+'px');
        //update navigation arrows visibility
        (value == 0 ) ? timelineComponents['timelineNavigation'].find('.prev').addClass('inactive') : timelineComponents['timelineNavigation'].find('.prev').removeClass('inactive');
        (value == totWidth ) ? timelineComponents['timelineNavigation'].find('.next').addClass('inactive') : timelineComponents['timelineNavigation'].find('.next').removeClass('inactive');
}

Timeline.prototype.updateFilling = function(selectedEvent, filling, totWidth) {
    //change .filling-line length according to the selected event
    var eventStyle = window.getComputedStyle(selectedEvent.get(0), null),
        eventLeft = eventStyle.getPropertyValue("left"),
        eventWidth = eventStyle.getPropertyValue("width");
    eventLeft = Number(eventLeft.replace('px', '')) + Number(eventWidth.replace('px', ''))/2;
    var scaleValue = eventLeft/totWidth;
    this.setTransformValue(filling.get(0), 'scaleX', scaleValue);
}

Timeline.prototype.setDatePosition = function(timelineComponents, min) {
    var that = this;
    for (i = 0; i < timelineComponents['timelineDates'].length; i++) { 
        var distance = that.daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][i]),
            distanceNorm = Math.round(distance/timelineComponents['eventsMinLapse']) + 0.5;
        timelineComponents['timelineEvents'].eq(i).css('left', distanceNorm*min+'px');
    }
}

Timeline.prototype.setTimelineWidth = function(timelineComponents, width) { 
    var timeSpan = this.daydiff(timelineComponents['timelineDates'][0], timelineComponents['timelineDates'][timelineComponents['timelineDates'].length-1]),
        timeSpanNorm = timeSpan/timelineComponents['eventsMinLapse'],
        timeSpanNorm = Math.round(timeSpanNorm) + 4,
        totalWidth = timeSpanNorm*width;
    timelineComponents['eventsWrapper'].css('width', totalWidth+'px');
    this.updateFilling(timelineComponents['timelineEvents'].eq(0), timelineComponents['fillingLine'], totalWidth);

    return totalWidth;
}

Timeline.prototype.updateVisibleContent = function(event, eventsContent) {
    var eventDate = event.data('date'),
        visibleContent = eventsContent.find('.selected'),
        selectedContent = eventsContent.find('[data-date="'+ eventDate +'"]'),
        selectedContentHeight = selectedContent.height();

    if (selectedContent.index() > visibleContent.index()) {
        var classEnetering = 'selected enter-right',
            classLeaving = 'leave-left';
    } else {
        var classEnetering = 'selected enter-left',
            classLeaving = 'leave-right';
    }

    selectedContent.attr('class', classEnetering);
    visibleContent.attr('class', classLeaving).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
        visibleContent.removeClass('leave-right leave-left');
        selectedContent.removeClass('enter-left enter-right');
    });
    eventsContent.css('height', selectedContentHeight+'px');
}

Timeline.prototype.updateOlderEvents = function(event) {
    event.parent('li').prevAll('li').children('a').addClass('older-event').end().end().nextAll('li').children('a').removeClass('older-event');
}

Timeline.prototype.getTranslateValue = function(timeline) {
    var timelineStyle = window.getComputedStyle(timeline.get(0), null),
        timelineTranslate = timelineStyle.getPropertyValue("-webkit-transform") ||
            timelineStyle.getPropertyValue("-moz-transform") ||
            timelineStyle.getPropertyValue("-ms-transform") ||
            timelineStyle.getPropertyValue("-o-transform") ||
            timelineStyle.getPropertyValue("transform");

    if( timelineTranslate.indexOf('(') >=0 ) {
        var timelineTranslate = timelineTranslate.split('(')[1];
        timelineTranslate = timelineTranslate.split(')')[0];
        timelineTranslate = timelineTranslate.split(',');
        var translateValue = timelineTranslate[4];
    } else {
        var translateValue = 0;
    }

    return Number(translateValue);
}

Timeline.prototype.setTransformValue = function(element, property, value) {
    element.style["-webkit-transform"] = property+"("+value+")";
    element.style["-moz-transform"] = property+"("+value+")";
    element.style["-ms-transform"] = property+"("+value+")";
    element.style["-o-transform"] = property+"("+value+")";
    element.style["transform"] = property+"("+value+")";
} 

Timeline.prototype.parseDate = function(events) {
    var dateArrays = [];
    events.each(function(){
        var dateComp = jQuery(this).data('date').split('/'),
            newDate = new Date(2009, dateComp[0]+1, dateComp[0]);
            console.log(newDate);
        dateArrays.push(newDate);
    });
    return dateArrays;
}

Timeline.prototype.parseDate2 = function(events) {
    var dateArrays = [];
    events.each(function(){
        var singleDate = jQuery(this),
            dateComp = singleDate.data('date').split('T');
        if( dateComp.length > 1 ) { //both DD/MM/YEAR and time are provided
            var dayComp = dateComp[0].split('/'),
                timeComp = dateComp[1].split(':');
        } else if( dateComp[0].indexOf(':') >=0 ) { //only time is provide
            var dayComp = ["2000", "0", "0"],
                timeComp = dateComp[0].split(':');
        } else { //only DD/MM/YEAR
            var dayComp = dateComp[0].split('/'),
                timeComp = ["0", "0"];
        }
        var newDate = new Date(dayComp[2], dayComp[1]-1, dayComp[0], timeComp[0], timeComp[1]);
        dateArrays.push(newDate);
    });
    return dateArrays;
}

Timeline.prototype.daydiff = function(first, second) {
    return Math.round((second-first));
}

Timeline.prototype.minLapse = function(dates) {
    //determine the minimum distance among events
    var dateDistances = [];
    for (i = 1; i < dates.length; i++) { 
        var distance = this.daydiff(dates[i-1], dates[i]);
        dateDistances.push(distance);
    }
    return Math.min.apply(null, dateDistances);
}

Timeline.prototype.elementInViewport = function(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while(el.offsetParent) {
        el = el.offsetParent;
        top += el.offsetTop;
        left += el.offsetLeft;
    }

    return (
        top < (window.pageYOffset + window.innerHeight) &&
        left < (window.pageXOffset + window.innerWidth) &&
        (top + height) > window.pageYOffset &&
        (left + width) > window.pageXOffset
    );
}

Timeline.prototype.checkMQ = function() {
    //check if mobile or desktop device
    return window.getComputedStyle(document.querySelector('.timeline__horizontal'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
}







