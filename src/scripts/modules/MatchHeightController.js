function MatchHeightController() {

    this.init();

    return {
        parse: this.parse.bind(this)
    };
    

}

MatchHeightController.prototype = new Module();
MatchHeightController.prototype.constructor = MatchHeightController;

MatchHeightController.prototype.classes = {};

MatchHeightController.prototype.selectors = {
    matchHeight: 'js-matchheight'
};

MatchHeightController.prototype.variables = {
};




MatchHeightController.prototype.init = function() {
    var self = this;
};

MatchHeightController.prototype.parse = function(context) {
    var self = this;
    this.initMatchHeight();
};


MatchHeightController.prototype.initMatchHeight = function() {
    var $matchHeight = jQuery(this.getSelector('matchHeight'));
    console.log($matchHeight);
    if (!$matchHeight.length) {
        return false;
    }

    $matchHeight.matchHeight({
        'property': 'height'
    });

};

