        $(document).ready(function(){          
             $("#formclientemovil").validate({
               feedbackIcons: {
 
                   valid: 'glyphicon glyphicon-ok',
               
                   invalid: 'glyphicon glyphicon-remove',
               
                   validating: 'glyphicon glyphicon-refresh'
               
                 },
             
                 rules: {
                     nombre: {
                        required: true,
                        minlength: 3,
                        maxlength: 80
                        
                     },
                     dni: {
                        required: true,
                        minlength: 8,
                        maxlength: 8
                     },
                     direccion: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                     },
                     celular: {
                        required: true,
                        minlength: 9,
                        maxlength: 9
                     },
                     telefono: {
                        required: true,
                        minlength: 6,
                        maxlength: 10
                     },
                     correo: {
                        required: true,
                        email: true
                     },
                     contrasena: {
                        required: true,
                        minlength: 3
                     },
                     referencia: {
                         required: true,
                         minlength: 5
                          /*equalTo: "#password"*/
                     }
                 },
                 messages: {
                  nombre: {
                    
                    required: "Ingrese un Nombre",
                    minlength: "Ingrese su nombre correctamente"
                  },
                  dni: {
                    required: "Ingrese un DNI",
                    minlength: "El campo DNI solo tiene 8 numeros",
                    maxlength: "El campo DNI tiene 8 numeros como maximo"
                  },
                  direccion: {
                    required: "Ingrese una Dirección",
                    minlength: "la direccion ingresada es incorrecta",
                    maxlength: "Ingrese 150 caracteres como máximo"
                  },
                  celular: {
                    required: "Ingrese un número de Celular ",
                    minlength: "el numero ingresado es incorrecto",
                    maxlength: "Ingrese un numero correcto"
                  },
                  telefono: {
                    required: "Ingrese un número de Teléfono fijo ",
                    minlength: "el numero ingresado es incorrecto",
                    maxlength: "Ingrese un numero correcto"
                  },
                  correo: {
                    required: "Ingrese un email",
                    email: "Ingrese un email valido"
                  },
                  contrasena: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  referencia: {
                    required: "Ingrese una referencia",
                    minlength: "Ingrese una referencia correcta",
                    /*equalTo: "Por favor ingrese la misma contraseña"*/
                  }
                 }
             });
        });