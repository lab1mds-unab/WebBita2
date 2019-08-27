<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color:#ffffff;">Lista de asistentes</h3> </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <!-- Row -->
            
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card card-outline-info">
                            
                            <div class="card-body m-t-15">
                            	<legend>Asistentes</legend>
                                <form action="#" class="form-horizontal form-bordered">
                                    <div class="form-body">                                      
                                        
                                        
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Completo</label>
                                            <div class="col-md-9">
                                                <input type="text" name="nombreCompleto" class="form-control" placeholder="Nombre completo" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">RUT</label>
                                            <div class="col-md-9">
                                                <input type="text" name="rut" class="form-control" placeholder="11111111-1" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Edad</label>
                                            <div class="col-md-9">
                                                <input name="edad" type="number" class="form-control" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2)" placeholder="Ingresar entre 0 y 99 años" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Club</label>
                                            <div class="col-md-9">
                                                <input type="text" name="club" class="form-control" placeholder="Nombre del club" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Teléfono</label>
                                            <div class="col-md-9">
                                                <input name="fono" type="number" class="form-control" onKeyUp="return limitar(event,this.value,11)" onKeyDown="return limitar(event,this.value,11)" placeholder="56966454801" required>
											</div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-2 col-md-9">
                                                        <button type="button" id="registrarAsistente" class="btn btn-primary"> <i class="fa fa-check"></i> Registrar Asistente</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card card-outline-info">
                            
                            <div class="card-body m-t-15">
                            	<legend>Lista de Asistentes</legend>
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderer table-condensed">
                                    	<thead>
                                    		<tr>
                                    			<th>#</th>
                                    			<th>Nombre completo</th>
                                    			<th>Rut</th>
                                    			<th>Edad</th>
                                    			<th>Teléfono</th>
                                    			<th colspan="2">Opciones</th>
                                    		</tr>
                                    	</thead>
                                    	<tbody id="cuerpo">
                                    		<?php 
                                    		if(isset($tabla_Asistentes)){
                                    			echo $tabla_Asistentes;
                                    		}?>
                                    	</tbody>
                                    	
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				
			<script>
				// Funcion para limitar el numero de caracteres de un textarea o input
				// Tiene que recibir el evento, valor y número máximo de caracteres
				function limitar(e, contenido, caracteres)
				{
					// obtenemos la tecla pulsada
					var unicode=e.keyCode? e.keyCode : e.charCode;
 
					// Permitimos las siguientes teclas:
					// 8 backspace
					// 46 suprimir
					// 13 enter
					// 9 tabulador
					// 37 izquierda
					// 39 derecha
					// 38 subir
					// 40 bajar
					if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
						return true;
 
					// Si ha superado el limite de caracteres devolvemos false
					if(contenido.length>=caracteres)
						return false;
 
					return true;
				}
			</script>	

			<script src="<?php echo base_url('assets/js/lib/jquery/jquery.min.js');?>"></script>
            <script type="text/javascript">


				$('#registrarAsistente').on('click',function(){

					var Nombre   = $("input[name='nombreCompleto']").val();
					var Rut      = $("input[name='rut']").val();
					var Edad     = $("input[name='edad']").val();
					var Club     = $("input[name='club']").val();
					var Telefono = $("input[name='fono']").val();


					// inicio AJAX
		            $.ajax({
		                url: "<?php echo base_url('index.php/Dashboard/C_guardarAsistente/'); ?>",
		                type: "post",
		                data: { nombre:Nombre
		                	   ,rut:Rut
		                	   ,edad:Edad
		                	   ,club:Club
		                	   ,telefono:Telefono},
		                beforeSend:function(){
		                    $("#cuerpo").html('<div class="row">\
											    <div class="col-lg-1"></div>\
											    <div class="col-lg-10">\
											        <div class="card card-outline-info"><div class="card-body m-t-15">\
											                <center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i></center>\
											            </div>\
											        </div>\
											    </div>\
											</div>');
		                    
		                },success:function(data){
		                     $("#cuerpo").html(data);
		                     $("input[name='nombreCompleto']").val("");
							 $("input[name='rut']").val("");
							 $("input[name='edad']").val("");
							 $("input[name='club']").val("");
							 $("input[name='fono']").val("");

		                  }
		             });
		            // fin ajax 
					
					
				});

				$('#cuerpo').on('click','.b_borrar',function(){
					// inicio AJAX
		            $.ajax({
		                url: "<?php echo base_url('index.php/Dashboard/C_borrarAsistente/'); ?>",
		                type: "post",
		                data: { id_asistente:$(this).val()},
		                beforeSend:function(){
		                    $("#cuerpo").html('<div class="row">\
											    <div class="col-lg-1"></div>\
											    <div class="col-lg-10">\
											        <div class="card card-outline-info"><div class="card-body m-t-15">\
											                <center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i></center>\
											            </div>\
											        </div>\
											    </div>\
											</div>');
		                    
		                },success:function(data){
		                    $("#cuerpo").html("");
		                    $("#cuerpo").append($(data));

		                  }
		             });
		            // fin ajax 
				});


		      
		        $(document).ready(function(){
		        	
		        });
		        // Obtención de coordenadas
		     
				
				
    </script>
          