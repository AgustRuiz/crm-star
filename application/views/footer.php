<hr/>
<footer id="footer">
	<p>Tiempo de respuesta: {elapsed_time} segundos</p>
	<p>&copy; <a href="http://www.agustruiz.es" target="_blank">Agustín Ruiz</a> 2014</p>
</footer>
</div><!--/.container-->
    <script>
        window.base_url = "<?=$this->config->base_url();?>";
        // alert(window.base_url);
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->config->base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo $this->config->base_url(); ?>js/bootstrap.min.js"></script>
    <!-- Funciones para el menú lateral -->
    <script src="<?php echo $this->config->base_url(); ?>js/offcanvas.js"></script>
    <!-- Funciones de la aplicación -->
    <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/crm-star.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>js/alertas.js"></script>
</body>
</html>