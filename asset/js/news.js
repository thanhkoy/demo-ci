$(document).ready(function () {
	var add_news = $('#add_news');
	var edit_news = $('button.edit_news');
	var news_modal = $('#news_modal');
	var news_content = $('#news_content');
	var modal_data = news_modal.find('input[name=data]');
	var modal_save = news_modal.find('button[name=save_modal]');

	add_news.click(function () {
		news_content.val('');
		modal_data.data('action', 'create');
		news_modal.modal('show');

	});
	edit_news.click(function () {
		let row_data = $(this).parents('tr').find('input[name=data]');
		let data = getNewsInfo(row_data.data('id'));
		data = JSON.parse(data);
		news_content.val(data.content);
		modal_data.data('action', 'edit');
		modal_data.data('id', row_data.data('id'));
		news_modal.modal('show');
	});
	modal_save.click(function () {
		let action = modal_data.data('action');
		let data = {
			id: modal_data.data('id'),
			content: news_content.val()
		};
		saveNews(action, data);
	});
});

function saveNews(action, data) {
	$.ajaxSetup({async: false});
	$.post(window.location.origin + "/demo-ci/index.php/news_controller/saveNews", {
		action: action,
		id: data.id,
		content: data.content
	}).done(function (data) {
		window.location.reload();
	});
}

function getNewsInfo(id) {
	var result;
	$.ajaxSetup({async: false});
	$.post(window.location.origin + "/demo-ci/index.php/news_controller/getInfo", {
		id: id,
	}).done(function (data) {
		result = data;
	});
	return result;
}
