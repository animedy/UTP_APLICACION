        $(document).ready(function(){
             $("#formeditempleado").validate({
                 feedbackIcons: {
 
                   valid: 'glyphicon glyphicon-ok',
               
                   invalid: 'glyphicon glyphicon-remove',
               
                   validating: 'glyphicon glyphicon-refresh'
               
                 },

                 rules: {
                     nombre: {
                        required: true,
                        minlength: 3
                     },
                     apellido: {
                        required: true,
                        minlength: 3
                     },
                     fec_nac: {
                        required: true
                     },
                     dni: {
                        required: true,
                        minlength: 8,
                        maxlength:8
                     },
                     direccion: {
                        required: true,
                        minlength: 3,
                        maxlength: 150
                     },
                     telefono: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                     },
                     usuario: {
                        required: true,
                        minlength: 4,
                        maxlength: 10
                     },
                     email: {
                        required: true,
                        email: true
                     },
                     password: {
                        required: true,
                        minlength: 3
                     },
                     confirm: {
                         required: true,
                         minlength: 3,
                          equalTo: "#password"
                     },
                     fec_in: {
                        required: true
                     }
                 },
                 messages: {
                  nombre: {
                    required: "Ingrese un Nombre",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  apellido: {
                    required: "Ingrese un Apellido",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  dni: {
                    required: "Ingrese un DNI",
                    minlength: "Ingrese 8 caracteres como minimo",
                    maxlength: "Ingrese 8 caracteres como máximo"
                  },
                  fec_nac: {
                    required: "Ingrese Fecha de Nacimiento"
                  },
                  direccion: {
                    required: "Ingrese una Dirección",
                    minlength: "Ingrese 3 caracteres como minimo",
                    maxlength: "Ingrese 150 caracteres como máximo"
                  },
                  telefono: {
                    required: "Ingrese un número de Teléfono fijo ",
                    minlength: "Ingrese 13 caracteres como minimo",
                    maxlength: "Ingrese 13 caracteres como máximo"
                  },
                  usuario: {
                    required: "Ingrese un usuario",
                    minlength: "Ingrese 4 caracteres como minimo",
                    maxlength: "Ingrese 10 caracteres como máximo"
                  },
                  email: {
                    required: "Ingrese un email",
                    email: "Ingrese un email valido"
                  },
                  password: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  confirm: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo",
                    equalTo: "Por favor ingrese la misma contraseña"
                  },
                  fec_in: {
                    required: "Ingrese Fecha de Ingreso"
                  }
                 }
             });
             $("#formempleado").validate({
                 rules: {
                     nombre: {
                        required: true,
                        minlength: 3
                     },
                     apellido: {
                        required: true,
                        minlength: 3
                     },
                     fec_nac: {
                        required: true
                     },
                     dni: {
                        required: true,
                        number: true,
                        minlength: 8,
                        maxlength:8
                     },
                     direccion: {
                        required: true,
                        minlength: 3,
                        maxlength: 150
                     },
                     telefono: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                     },
                     celular: {
                        required: true,
                        minlength: 9,
                        maxlength: 9
                     },
                     usuario: {
                        required: true,
                        minlength: 4,
                        maxlength: 10
                     },
                     email: {
                        required: true,
                        email: true
                     },
                     password: {
                        required: true,
                        minlength: 3
                     },
                     confirm: {
                         required: true,
                         minlength: 3,
                          equalTo: "#password"
                     },
                     fec_in: {
                        required: true
                     }
                 },
                 messages: {
                  nombre: {
                    required: "Ingrese un Nombre",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  apellido: {
                    required: "Ingrese un Apellido",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  fec_nac: {
                    required: "Ingrese Fecha de Nacimiento"
                  },
                  dni: {
                    required: "Ingrese un DNI",
                    number: "Ingrese numeros",
                    minlength: "Ingrese 8 caracteres como minimo",
                    maxlength: "Ingrese 8 caracteres como máximo"
                  },
                  direccion: {
                    required: "Ingrese una Dirección",
                    minlength: "Ingrese 3 caracteres como minimo",
                    maxlength: "Ingrese 150 caracteres como máximo"
                  },
                  telefono: {
                    required: "Ingrese un número de Teléfono fijo ",
                    minlength: "Ingrese 13 caracteres como minimo",
                    maxlength: "Ingrese 13 caracteres como máximo"
                  },
                  celular: {
                    required: "Ingrese un número de celular",
                    minlength: "Ingrese 9 caracteres como minimo",
                    maxlength: "Ingrese 9 caracteres como máximo"
                  },
                  usuario: {
                    required: "Ingrese un usuario",
                    minlength: "Ingrese 4 caracteres como minimo",
                    maxlength: "Ingrese 10 caracteres como máximo"
                  },
                  email: {
                    required: "Ingrese un email",
                    email: "Ingrese un email valido"
                  },
                  password: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  confirm: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo",
                    equalTo: "Por favor ingrese la misma contraseña"
                  },
                  fec_in: {
                    required: "Ingrese Fecha de Ingreso"
                  }
                 }
             });
             $("#formcliente").validate({
                 rules: {
                     nombre: {
                        required: true,
                        minlength: 3
                     },
                     dni: {
                        required: true,
                        minlength: 8,
                        maxlength: 8
                     },
                     direccion: {
                        required: true,
                        minlength: 3,
                        maxlength: 150
                     },
                     telefono: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                     },
                     email: {
                        required: true,
                        email: true
                     },
                     password: {
                        required: true,
                        minlength: 3
                     },
                     confirm: {
                         required: true,
                         minlength: 3,
                          equalTo: "#password"
                     }
                 },
                 messages: {
                  nombre: {
                    required: "Ingrese un Nombre",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  dni: {
                    required: "Ingrese un DNI",
                    minlength: "Ingrese 8 caracteres como minimo",
                    maxlength: "Ingrese 8 caracteres como máximo"
                  },
                  direccion: {
                    required: "Ingrese una Dirección",
                    minlength: "Ingrese 3 caracteres como minimo",
                    maxlength: "Ingrese 150 caracteres como máximo"
                  },
                  telefono: {
                    required: "Ingrese un número de Teléfono fijo ",
                    minlength: "Ingrese 13 caracteres como minimo",
                    maxlength: "Ingrese 13 caracteres como máximo"
                  },
                  email: {
                    required: "Ingrese un email",
                    email: "Ingrese un email valido"
                  },
                  password: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  confirm: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo",
                    equalTo: "Por favor ingrese la misma contraseña"
                  }
                 }
             });
             $("#formeditcliente").validate({
                 rules: {
                     nombre: {
                        required: true,
                        minlength: 3
                     },
                     dni: {
                        required: true,
                        minlength: 8,
                        maxlength: 8
                     },
                     direccion: {
                        required: true,
                        minlength: 3,
                        maxlength: 150
                     },
                     telefono: {
                        required: true,
                        minlength: 9,
                        maxlength: 13
                     },
                     contrasena: {
                        required: true,
                        minlength: 3
                     },
                     confirm: {
                         required: true,
                         minlength: 3,
                          equalTo: "#contrasena"
                     }
                 },
                 messages: {
                  nombre: {
                    required: "Ingrese un Nombre",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  dni: {
                    required: "Ingrese un DNI",
                    minlength: "Ingrese 8 caracteres como minimo",
                    maxlength: "Ingrese 8 caracteres como máximo"
                  },
                  direccion: {
                    required: "Ingrese una Dirección",
                    minlength: "Ingrese 3 caracteres como minimo",
                    maxlength: "Ingrese 150 caracteres como máximo"
                  },
                  telefono: {
                    required: "Ingrese un número de Teléfono fijo ",
                    minlength: "Ingrese 9 caracteres como minimo",
                    maxlength: "Ingrese 13 caracteres como máximo"
                  },
                  contrasena: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  confirm: {
                    required: "Ingrese una Contraseña",
                    minlength: "Ingrese 3 caracteres como minimo",
                    equalTo: "Por favor ingrese la misma contraseña"
                  }
                 }
             });
             $("#formmoto").validate({
                 rules: {
                     placa: {
                        required: true,
                        minlength: 7
                     },
                     marca: {
                        required: true,
                        minlength: 3
                     },
                     soat: {
                        required: true,
                        minlength: 11,
                        maxlength: 11
                     }
                 },
                 messages: {
                  placa: {
                    required: "Ingrese una Placa",
                    minlength: "Ingrese 7 caracteres como minimo"
                  },
                  marca: {
                    required: "Ingrese la Marca de la moto",
                    minlength: "Ingrese 3 caracteres como minimo"
                  },
                  soat: {
                    required: "Ingrese el número de SOAT",
                    minlength: "Ingrese 11 caracteres como minimo",
                    maxlength: "Ingrese 11 caracteres como máximo"
                  }
                 }
             });
        });

