<div id="loading" style="display:none;">
    <div id="1379907588516" style="position: fixed; top: 0px; left: 0px; opacity: 0.5; z-index: 9999; background-color: rgb(0, 0, 0); height: 903px; width: 100%;">
        <div style="position: relative;top:250px; left:25%; width:50%;">
            <div class="progress progress-striped active">
              <div class="progress-bar progress" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">50% Complete (sucesso)</span>
              </div>
            </div>
        </div>    
    </div>
</div><!-- /carregando -->
<script>
$(document).on({	
	ajaxStart: function() { 
		$("#loading").css("display","block");    					
	},
	ajaxStop: function() { 
		$("#loading").css("display","none"); 
	}    
});
</script>