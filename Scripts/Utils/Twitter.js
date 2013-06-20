
!function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
	if (!d.getElementById(id)) {
		js = d.createElement(s);
		js.id = id;
		js.src = p + "://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
	}
}(document, "script", "twitter-wjs");

//new TWTR.Widget({
//	version : 2,
//	type : 'profile',
//	rpp : 6,
//	interval : 30000,
//	width : 'auto',
//	height : 300,
//	theme : {
//		shell : {
//			background : '#f3f3ee',
//			color : '#333333'
//		},
//		tweets : {
//			background : '#ffffff',
//			color : '#a19d9a',
//			links : '#ff2f00'
//		}
//	},
//	features : {
//		scrollbar : false,
//		loop : false,
//		live : false,
//		behavior : 'all'
//	}
//}).render().setUser('PhiGammEmir').start();
