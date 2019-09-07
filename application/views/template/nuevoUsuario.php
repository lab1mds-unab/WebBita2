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
                                                <select id = "perfiles" name="perfil" class="form-control">
                                                    <?php echo $select_perfiles; ?>
                                                </select>
                                            </div>
                                        </div>
										
										
                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Completo</label>
                                            <div class="col-md-9">
                                                <input name="nombreCompleto" type="text" maxlength=50 id="nombre" class="form-control" placeholder="Nombre completo (Pedro Soto González)" required onkeypress="return soloLetras(event)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="control-label col-md-3">Edad</label>
                                            <div class="col-md-9">
                                                <input name="edad" id = "edad" type="number" class="form-control" onKeyUp="return limitar(event,this.value,2)" onKeyDown="return limitar(event,this.value,2)" placeholder="Ingresar entre 0 y 99 años" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Correo</label>
                                            <div class="col-md-9">
                                                <input name="correo" id = "correo" type="text" class="form-control" placeholder="example@example.com" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Nombre Usuario</label>
                                            <div class="col-md-9">
                                                <input name="nom_usuario" id = "nom_usuario" type="text" class="form-control" placeholder="Alias (Peterlanguilla)" required>
                                            </div>
                                        </div>
										
										<div class="form-group row">
                                            <label class="control-label col-md-3">Contraseña</label>
                                            <div class="col-md-9">
                                                <input name="contraseña" id = "contraseña" type="text" class="form-control" placeholder="*************" required>
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
			<script src="<?php echo base_url('assets/js/lib/jquery/jquery.min.js');?>"></script>	
			<script type="text/javascript">
			
				$('.form-actions').on('click','#registrarUsuario',function(){
                    
					// inicio AJAX
		            $.ajax({
		                url: "<?php echo base_url('index.php/Dashboard/C_ingresarUsuario/'); ?>",
		                type: "post",
		                data: { 
								id_perfil: $("#perfiles").val(),
								nombre:$("#nombre").val(),
                                edad: $("#edad").val(),
								correo: $("#correo").val(),
								nom_usuario: $("#nom_usuario").val(),
								contraseña: $("#contraseña").val()
                                },
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
		                    /*$("#cuerpo").html("Usuario Creado con Exito");
		                    $("#cuerpo").append($(data));*/
							alert("ok");

		                  }
		             });
		            // fin ajax 
				});
				
				$(document).ready(function(){
		        	
		        });
				
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
				
			function Valida_Rut(rut){
					var tmpstr = "";
					var intlargo = rut.value;
					if (intlargo.length> 0)

					{
						crut = rut.value;
						largo = crut.length;
						if ( largo <2 )
						{
							alert('rut invÃ¡lido');
							 $('#rut').val('');
							return false;
						}
						for ( i=0; i <crut.length ; i++ )
    						if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
    						{
    							tmpstr = tmpstr + crut.charAt(i);
    						}
    						rut = tmpstr;
    						crut=tmpstr;
    						largo = crut.length;

						if ( largo> 2 )
							rut = crut.substring(0, largo - 1);
						else
							rut = crut.charAt(0);
						dv = crut.charAt(largo-1);

						if ( rut == null || dv == null )
						return 0;
						var dvr = '0';
						suma = 0;
						mul  = 2;

						for (i= rut.length-1 ; i>= 0; i--)
						{
							suma = suma + rut.charAt(i) * mul;
							if (mul == 7)
								mul = 2;
							else
								mul++;
						}

						res = suma % 11;
						if (res==1)
							dvr = 'k';
						else if (res==0)
							dvr = '0';
						else
						{
							dvi = 11-res;
							dvr = dvi + "";
						}

						if ( dvr != dv.toLowerCase() )
						{
							alert('El Rut Ingreso es Invalido!\nPor favor, ingresar numeros y digito verificador en la forma sugerida');
							$('#rut').val('');
							return false;
						}
						alert('El Rut Ingresado es Correcto!');
						$('#rut').focus();
						return true;
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
          