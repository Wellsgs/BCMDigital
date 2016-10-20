
function alertaSucesso(mensagem, titulo, pagina){	
	bootbox.dialog({
	  message: mensagem,
	  title: titulo,
	  buttons: {
	    success: {
	      label: "Ok",
	      className: "btn-primary",
	      callback: function() {
	        document.location.href=pagina;
	      }
	    }
	  }
	});
}

function alertaSucessoReload(mensagem, titulo){	
	bootbox.dialog({
	  message: mensagem,
	  title: titulo,
	  buttons: {
	    success: {
	      label: "Ok",
	      className: "btn-primary",
	      callback: function() {
	        location.reload();
	      }
	    }
	  }
	});
}

function alertaErro(mensagem, titulo){	
	bootbox.dialog({
	  message: mensagem,
	  title: titulo,
	  buttons: {		    
	    danger: {
	      label: "Cancelar",
	      className: "btn-danger",
	      callback: function() {
	        
	      }
	    }
	  }
	});
}