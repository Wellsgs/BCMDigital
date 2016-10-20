<script type='text/javascript' src='../public/js/jqueryui-1.10.3.min.js'></script>
<script type='text/javascript' src='../public/js/bootstrap.min.js'></script>
<script type='text/javascript' src='../public/js/enquire.js'></script>
<script type='text/javascript' src='../public/js/jquery.cookie.js'></script>
<script type='text/javascript' src='../public/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='../public/plugins/codeprettifier/prettify.js'></script>
<script type='text/javascript' src='../public/plugins/easypiechart/jquery.easypiechart.min.js'></script>
<script type='text/javascript' src='../public/plugins/sparklines/jquery.sparklines.min.js'></script>
<script type='text/javascript' src='../public/plugins/form-toggle/toggle.min.js'></script> 
<script type='text/javascript' src='../public/js/placeholdr.js'></script>
<script type='text/javascript' src='../public/js/application.js'></script>
<script type='text/javascript' src='../public/js/application.js'></script>
<script>
	function resizeMain(){
		var altura = $(window).height();
		altura = altura - 210;
		$(".main").css("min-height", altura+"px");
	}
	$(document).ready(function(){
		resizeMain();
	});
	$(window).resize(function(){
		resizeMain();
	});
</script>