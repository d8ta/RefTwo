function Page() {


    return {
        init: this.init.bind(this)
    };
}

Page.prototype = new Module();
Page.prototype.constructor = Page;

Page.prototype.elements = {

};



Page.prototype.init = function() {

};
