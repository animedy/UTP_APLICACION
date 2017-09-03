        $(document).ready(function(){
             $("#formeditempleado")
               .find('[name="account"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
                   })
                   .end()
               .find('[name="cargo"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'cargo');
                   })
                   .end()
               .find('[name="estado"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'estado');
                   })
                   .end()
               .bootstrapValidator({
                  message: 'Este valor no es valido',

                   feedbackIcons: {
   
                     valid: 'glyphicon glyphicon-ok',
                 
                     invalid: 'glyphicon glyphicon-remove',
                 
                     validating: 'glyphicon glyphicon-refresh'
                 
                   },

                   excluded: ':disabled',

                  fields: {

                     account: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un sexo'
                           }
                        }
                     },

                     cargo: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un cargo'
                           }
                        }
                     },

                     estado: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un estado'
                           }
                        }
                     },
             
                     nombre: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El nombre es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'El nombre debe contener al menos 3 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z ]+$/,
                 
                           message: 'El nombre solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     apellido: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El apellido es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'El apellido debe contener al menos 3 caracteres' 
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z ]+$/,
                 
                           message: 'El teléfono solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     dni: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El DNI es requerido'
                 
                         },

                         stringLength: {
     
                           min: 8,
                           max: 8,
                 
                           message: 'El apellido debe contener al menos 8 caracteres'
                 
                         }
                 
                       }
                 
                     },

                     direccion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El dirección es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'La dirección debe contener al menos 3 caracteres'
                 
                         }
                 
                       }
                 
                     },

                     celular: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El celular es requerido'
                 
                         },

                          regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El teléfono solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 9,
                           max: 9,
                 
                           message: 'El celular debe contener al menos 9 números'
                 
                         }
                 
                       }
                 
                     },

                     fec_nac: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La fecha de nacimiento es requerida y no puede ser vacia'
                 
                         },
                 
                         date: {
                 
                           format: 'DD-MM-YYYY',
                 
                           message: 'La fecha de nacimiento no es valida'
                 
                         }
                 
                       }
                 
                     },

                     usuario: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El usuario es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
     
                           min: 3,
                 
                           message: 'El usuario debe contener al menos 3 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z]+$/,
                 
                           message: 'El usuario solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     email: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El correo es requerido y no puede ser vacio'
                 
                         },

                          regexp: {
     
                           regexp: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                 
                           message: 'El correo ecltronico no es valido'
                 
                         },
                 
                         emailAddress: {
                 
                           message: 'El correo electronico no es valido'
                 
                         }
                 
                       }
                 
                     },

                     password: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El password es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'El password debe contener al menos 8 caracteres'
                 
                         },

                         identical: {
                            field: 'confirm',
                            message: 'La contraseña y la confirmación de co0ntraseña no son las mismas.'
                         }
                 
                       }
                 
                     },

                     confirm: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La confirmación de password es requerida y no puede ser vacio.'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'El password debe contener al menos 8 caracteres.'
                 
                         },

                         identical: {
                            field: 'password',
                            message: 'La confirmación y la contraseña de contraseña no son las mismas.'
                         }
                 
                       }
                 
                     },

                     fec_in: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La fecha de ingreso es requerida y no puede ser vacia'
                 
                         },
                 
                         date: {
                 
                           format: 'DD-MM-YYYY',
                 
                           message: 'La fecha de ingreso no es valida. El formato es dd-mm-yyyy'
                 
                         }
                 
                       }
                 
                     }

                  }

             });
             $("#formempleado")
               .find('[name="account"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
                   })
                   .end()
               .find('[name="cargo"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'cargo');
                   })
                   .end()
               .find('[name="estado"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'estado');
                   })
                   .end()
               .bootstrapValidator({
                  message: 'Este valor no es valido',

                   feedbackIcons: {
   
                     valid: 'glyphicon glyphicon-ok',
                 
                     invalid: 'glyphicon glyphicon-remove',
                 
                     validating: 'glyphicon glyphicon-refresh'
                 
                   },

                   excluded: ':disabled',

                  fields: {

                     account: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un sexo'
                           }
                        }
                     },

                     cargo: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un cargo'
                           }
                        }
                     },

                     estado: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un estado'
                           }
                        }
                     },
             
                     nombre: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El nombre es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'El nombre debe contener al menos 3 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z ]+$/,
                 
                           message: 'El nombre solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     apellido: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El apellido es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'El apellido debe contener al menos 3 caracteres' 
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z ]+$/,
                 
                           message: 'El teléfono solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     dni: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El DNI es requerido'
                 
                         },

                         stringLength: {
     
                           min: 8,
                           max: 8,
                 
                           message: 'El apellido debe contener al menos 8 caracteres'
                 
                         }
                 
                       }
                 
                     },

                     direccion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El dirección es requerido'
                 
                         },

                         stringLength: {
     
                           min: 3,
                 
                           message: 'La dirección debe contener al menos 3 caracteres'
                 
                         }
                 
                       }
                 
                     },

                     celular: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El celular es requerido'
                 
                         },

                          regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El teléfono solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 9,
                           max: 9,
                 
                           message: 'El celular debe contener al menos 9 números'
                 
                         }
                 
                       }
                 
                     },

                     fec_nac: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La fecha de nacimiento es requerida y no puede ser vacia'
                 
                         },
                 
                         date: {
                 
                           format: 'DD-MM-YYYY',
                 
                           message: 'La fecha de nacimiento no es valida'
                 
                         }
                 
                       }
                 
                     },

                     usuario: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El usuario es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
     
                           min: 3,
                 
                           message: 'El usuario debe contener al menos 3 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[A-Za-z]+$/,
                 
                           message: 'El usuario solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     email: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El correo es requerido y no puede ser vacio'
                 
                         },

                          regexp: {
     
                           regexp: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                 
                           message: 'El correo ecltronico no es valido'
                 
                         },
                 
                         emailAddress: {
                 
                           message: 'El correo electronico no es valido'
                 
                         }
                 
                       }
                 
                     },

                     password: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El password es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'El password debe contener al menos 8 caracteres'
                 
                         },

                         identical: {
                            field: 'confirm',
                            message: 'La contraseña y la confirmación de co0ntraseña no son las mismas.'
                         }
                 
                       }
                 
                     },

                     confirm: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La confirmación de password es requerida y no puede ser vacio.'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'El password debe contener al menos 8 caracteres.'
                 
                         },

                         identical: {
                            field: 'password',
                            message: 'La confirmación y la contraseña de contraseña no son las mismas.'
                         }
                 
                       }
                 
                     },

                     fec_in: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La fecha de ingreso es requerida y no puede ser vacia'
                 
                         },
                 
                         date: {
                 
                           format: 'DD-MM-YYYY',
                 
                           message: 'La fecha de ingreso no es valida. El formato es dd-mm-yyyy'
                 
                         }
                 
                       }
                 
                     }

                  }

                
             });
             /*$("#formempleado").validate({
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
             });*/
        });