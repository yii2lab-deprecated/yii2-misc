
(function($){
	
	var request = function (method, uri, data, successHandler) {
		if(empty(uri)) {
			return;
		}
		$.ajax({
			method: method,
			url: app.env.url.api+uri,
			data: data,
			dataType: 'json',
			success: successHandler,
		});
	};
	
	$.restApi = {
		get: function (uri, data, successHandler) {
			request('get', uri, data, successHandler);
		},
		post: function (uri, data, successHandler) {
			request('post', uri, data, successHandler);
		},
		put: function (uri, data, successHandler) {
			request('put', uri, data, successHandler);
		},
		delete: function (uri, data, successHandler) {
			request('delete', uri, data, successHandler);
		},
	};
})(jQuery);
