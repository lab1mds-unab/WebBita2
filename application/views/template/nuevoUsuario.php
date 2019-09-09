<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 style="color:#ffffff;">Ingresar Nuevo Usuario</h3> </div>
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
                            	<legend>Nuevo Usuario</legend>
                                <form action="#" class="form-horizontal form-bordered">
                                    <div class="form-body">                                      
                                        
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Seleccionar perfil usuario</label>
                                            <div class="col-md-9">
                                                <select name = "perfiles" class="form-control"> 
                                                <option value="1">Administrador</option>
												<option value="2">Viajero</option>
                                                </select>
                                            </div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Completo</label>
                                            <div class="col-md-9">
                                                <input name="nombrecompleto" type="text" maxlength=50 id="nombrecompleto" class="form-control" placeholder="Nombre completo (Pedro Soto González)" required onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Edad</label>
                                            <div class="col-md-9">
                                                <input name="edad" type="number" class="form-control" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2)" placeholder="Ingresar entre 0 y 99 años" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Correo</label>
                                            <div class="col-md-9">
                                                <input name="correo" id = "correo" type="email" class="form-control" placeholder="example@example.com" onchange="return validaEmail(this)" tabindex="0" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Usuario</label>
                                            <div class="col-md-9">
                                                <input name="nom_usuario" maxlength=20 id = "nom_usuario" type="text" class="form-control" placeholder="Alias (Psgonzalez)" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Contraseña</label>
                                            <div class="col-md-9">
                                                <input name="contrasena" maxlength=20 id = "contrasena" type="password" class="form-control" placeholder="*************" required>
                                            </div>
                                        </div>
										
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-2 col-md-9">
                                                        <button type="button" id="registrarUsuario" class="btn btn-primary"> <i class="fa fa-check"></i> Crear Usuario</button>
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
                            	<legend>Lista de Usuarios</legend>
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderer table-condensed">
                                    	<thead>
                                    		<tr>
                                    			<th>#</th>
                                    			<th>Nombre completo</th>
                                    			<th>Edad</th>
                                    			<th>Correo</th>
                                    			<th>Usuario</th>
                                    			<th colspan="2">Opciones</th>
                                    		</tr>
                                    	</thead>
                                    	<tbody id="cuerpo">
                                    		<?php 
                                    		if(isset($tabla_Usuario)){
                                    			echo $tabla_Usuario;
                                    		}?>
                                    	</tbody>
                                    	
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				<script>
				    function limitar(e, contenido, caracteres){
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
				
		    	// funcion que valida formato ingresado de mail en base a regexp
			   function validaEmail(correo) {
			   var formato = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			
			
			   if(correo.value.match(formato)){
				  return true;
			   }else{
					
				document.getElementById("correo").focus();
				alert("Has ingresado un email incorrecto!\nPor favor, ingresa un email valido");
				//document.form1.correo.focus();
				return false;
				  }
			   }
				
			function soloLetras(e) {
				key = e.keyCode || e.which;
				tecla = String.fromCharCode(key).toLowerCase();
				letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
				especiales = [8, 37, 39, 46];

				tecla_especial = false
				for(var i in especiales) {
					if(key == especiales[i]) {
						tecla_especial = true;
						break; 
					}
				}

				if(letras.indexOf(tecla) == -1 && !tecla_especial)
					return false;
			}
			
		function soloRUT(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            numeros = "0123456789-K";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for(var i in especiales) {
                if(key == especiales[i]) {
                    tecla_especial = true;
                    break; 
                }
            }

            if(numeros.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }
		
		</script>
		
			<script src="<?php echo base_url('assets/js/lib/jquery/jquery.min.js');?>"></script>	
			<script type="text/javascript">
			
				$('#registrarUsuario').on('click',function(){
					
					var Perfil   = $("select[name='perfiles']").val();
					var Nombre   = $("input[name='nombrecompleto']").val();
					var Edad     = $("input[name='edad']").val();
					var Correo   = $("input[name='correo']").val();
				    var usuario = $("input[name='nom_usuario']").val();
					var contrasena = $("input[name='contrasena']").val();
								
					// inicio AJAX
		            $.ajax({
		                url: "<?php echo base_url('index.php/Dashboard/C_ingresarUsuario/'); ?>",
		                type: "post",
		                data: { id_perfil:Perfil,
								nombre:Nombre,
                                edad:Edad,
								correo:Correo,
								nom_usuario:usuario,
								contrasena:contrasena},
								
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
							 $("select[name='perfiles']").val('--Seleccione un tipo de usuario--');
		                     $("input[name='nombrecompleto']").val("");
							 $("input[name='edad']").val("");
							 $("input[name='correo']").val("");
							 $("input[name='nom_usuario']").val("");
							 $("input[name='contrasena']").val("");
		                  }
		             });
		            // fin ajax 
				});
				
				$('#cuerpo').on('click','.b_borrar',function(){
					// inicio AJAX
		            $.ajax({
		                url: "<?php echo base_url('index.php/Dashboard/C_borrarUsuario/'); ?>",
		                type: "post",
		                data: { id_usuario:$(this).val()},
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
				
			
				
			</script>
			
			