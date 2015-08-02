var closingTipHandling = function(){
	$('.close-tip').click(function(){
		$('#tips').addClass('tips-none');
		$('#content').css({top: '25px'});
		
		sessionStorage.setItem('showTips',false);

	});
};
$(function() {
	closingTipHandling();
	if ((typeof(sessionStorage.getItem('showTips'))!= 'undefined') && sessionStorage.getItem('showTips')=='false'){
		$('.close-tip').trigger('click');	
});