(function(jQuery){



	/* ======== Extern ======== */
	//= include ../bower_components/lazyloadxt/dist/jquery.lazyloadxt.min.js
	//= include ../bower_components/owl.carousel/dist/owl.carousel.min.js
	//= include ../bower_components/velocity/velocity.min.js
	//= include ../bower_components/js-cookie/src/js.cookie.js
	//= include ../bower_components/matchHeight/dist/jquery.matchHeight-min.js
	


	//= include vendor/jquery.lazyloadxt.js
	
	/* ======== Common includes ======== */
	//= include common/AjaxForm.js
	//= include common/Application.js
	//= include common/Module.js
	
	/* ======== Module includes ======== */
	//= include modules/AjaxFormController.js
	//= include modules/CookieAlert.js
	//= include modules/LanguageSwitch.js
	//= include modules/Page.js
	//= include modules/NestedNavigation.js
	//= include modules/NestedNavigationBig.js
	//= include modules/Sidebar.js
	//= include modules/SiteController.js
	//= include modules/ParsleyController.js
	//= include modules/Scroll.js
	//= include modules/ScrollController.js
	//= include modules/OwlcarouselController.js
	//= include modules/Owlcarousel.js
	//= include modules/MatchHeightController.js
	//= include modules/InteractiveMap.js
	//= include modules/InteractiveMapController.js
	
	

	/* ======== Application Setup ======== */
	var application = new Application();
	application
		.addModule(new AjaxFormController(), 'ajaxFormController')
		.addModule(new LanguageSwitch(), 'LanguageSwitch')
		.addModule(new CookieAlert(), 'CookieAlert')
		.addModule(new Page(), 'Page')
		.addModule(new NestedNavigation(), 'nestedNavigation')
		.addModule(new NestedNavigationBig(), 'nestedNavigationBig')
		.addModule(new Sidebar(), 'sidebar')
		.addModule(new SiteController(), 'siteController')
		.addModule(new ParsleyController(), 'parsleyController')
		.addModule(new Scroll(), 'scroll')
		.addModule(new ScrollController(), 'scrollcontroller')
		.addModule(new OwlcarouselController(), 'owlcarouselcontroller')
		.addModule(new MatchHeightController(), 'MatchHeightController')
		.addModule(new InteractiveMapController(), 'interactiveMapController')

		.run();


})(jQuery);