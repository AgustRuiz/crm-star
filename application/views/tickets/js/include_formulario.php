<!-- Funciones de contacto -->
<script>
	function clearContacto(){
		var campoIdContacto = parent.document.getElementById("txtIdContacto");
		var campoNombreContacto = parent.document.getElementById("txtNombreContacto");
		campoIdContacto.value = "";
		campoNombreContacto.value = "";
	}


	function cerrarModalContacto(){
		$("#modalContacto").modal("hide");
	}

	function abrirModalContacto(){
		$("#modalContacto").modal("show");
		var iframeModal = document.getElementById("iframeModalContacto");
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/contactos/include_busqueda_contacto";
		}
	}
</script>
<!-- Fin funciones de contacto -->

<!-- Funciones de usuario asignado -->
<script>
	function clearUsuario(){
		var campoIdUsuario = parent.document.getElementById("txtIdUsuario");
		var campoNombreUsuario = parent.document.getElementById("txtNombreUsuario");
		campoIdUsuario.value = "";
		campoNombreUsuario.value = "";
	}


	function cerrarModalUsuarioResponsable(){
		$("#modalUsuarioResponsable").modal("hide");
	}

	function abrirModalUsuarioResponsable(){
		$("#modalUsuarioResponsable").modal("show");
		var iframeModal = document.getElementById("iframeModalUsuarioResponsable");
		// alert(iframeModal.src);
		if(iframeModal.src == ""){
			iframeModal.src = "<?=$this->config->base_url()?>index.php/usuarios/include_busqueda_usuario";
		}
		// alert(iframeModal.src);
	}
</script>
