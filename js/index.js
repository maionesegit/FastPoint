$(document).ready(function(){
	$('.collapsible').collapsible();
	$('.sidenav').sidenav();
	$('.tabs').tabs();
	$('.collapsible').collapsible();
	$('.fixed-action-btn').floatingActionButton();
	$('select').formSelect();
	
	$(".dropdown-trigger").dropdown({constrainWidth: false });
	
	$('#btnLoginEmp').click(function(){
		if($('#loginBox').is(':visible')){
			$('#loginBox').slideUp();
			$('#btnLogin').show();			
		};
		$('#loginBoxEmp').slideDown();
		$('#btnLoginEmp').hide();
	});
	
	$('#btnLogin').click(function(){
		if($('#loginBoxEmp').is(':visible')){
			$('#loginBoxEmp').slideUp();
			$('#btnLoginEmp').show();			
		};
		$('#loginBox').slideDown();
		$('#btnLogin').hide();
	});
});