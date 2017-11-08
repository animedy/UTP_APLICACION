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
                 
                           message: 'El DNI debe contener al menos 8 caracteres'
                 
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
                            message: 'La contraseña y la confirmación de contraseña no son las mismas.'
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
               .find('[name="fec_nac"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'fec_nac');
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
                            message: 'La contraseña y la confirmación de contraseña no son las mismas.'
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

             $("#formcliente")
               .find('[name="distrito"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
                   })
                   .end()
                .find('[name="sexo"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
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
     
                           regexp: /^[a-zA-ZáéíóúñÁÉÍÓÚÑ ]+$/,
                 
                           message: 'El nombre solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     dni: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El DNI es requerido'
                 
                         },

                         regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El DNI solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 8,
                           max: 8,
                 
                           message: 'El dni debe contener al menos 8 números'
                 
                         }
                 
                       }
                 
                     },

                     sexo: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un sexo'
                           }
                        }
                     },

                     direccion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El dirección es requerido'
                 
                         },
                          regexp: {
     
                           regexp: /^[a-zA-ZáéíóúñÁÉÍÓÚÑ ]+$/,
                 
                           message: 'La dirección solo puede contener letras'
                 
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

                     telefono: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El teléfono es requerido'
                 
                         },

                          regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El teléfono solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 6,
                           max: 6,
                 
                           message: 'El teléfono debe contener al menos 6 números'
                 
                         }
                 
                       }
                 
                     },

                     correo: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El correo es requerido y no puede ser vacio'
                 
                         },

                          regexp: {
     
                           regexp: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                 
                           message: 'El correo electronico no es valido'
                 
                         },
                 
                         
                 
                       }
                 
                     },

                     contrasena: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La contrasena es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'La contrasena debe contener al menos 8 caracteres'
                 
                         },

                         identical: {
                            field: 'confirm',
                            message: 'La contraseña y la confirmación de contraseña no son las mismas.'
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


                     distrito: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un distrito'
                           }
                        }
                     },

                  }
                
             });

             $("#formeditcliente")
               .find('[name="distrito"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
                   })
                   .end()
                .find('[name="sexo"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'account');
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

                     dni: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El DNI es requerido'
                 
                         },

                         regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El DNI solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 8,
                           max: 8,
                 
                           message: 'El dni debe contener al menos 8 números'
                 
                         }
                 
                       }
                 
                     },

                     sexo: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un sexo'
                           }
                        }
                     },

                     direccion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El dirección es requerido'
                 
                         },
                         regexp: {
     
                           regexp: /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/,
                 
                                            
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

                     telefono: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El teléfono es requerido'
                 
                         },

                          regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'El teléfono solo puede contener números'
                 
                         },

                         stringLength: {
     
                           min: 6,
                           max: 6,
                 
                           message: 'El teléfono debe contener 6 números'
                 
                         }
                 
                       }
                 
                     },

                     correo: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El correo es requerido y no puede ser vacio'
                 
                         },

                          regexp: {
     
                           regexp: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                 
                           message: 'El correo electronico no es valido'
                 
                         },
                 
                         
                 
                       }
                 
                     },

                     contrasena: {
     
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La contrasena es requerido y no puede ser vacio'
                 
                         },
                 
                         stringLength: {
                 
                           min: 8,
                 
                           message: 'La contrasena debe contener al menos 8 caracteres'
                 
                         },

                         identical: {
                            field: 'confirm',
                            message: 'La contraseña y la confirmación de contraseña no son las mismas.'
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


                     distrito: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un distrito'
                           }
                        }
                     },

                  }
                
             });

             $("#formmoto")
               .find('[name="empleado"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'empleado');
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

                     placa: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La placa es requerida'
                 
                         },

                         stringLength: {
     
                           min: 5,
                 
                           message: 'La placa debe contener 5 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^([A-Z]{2}-\d{4})$/,
                 
                           message: 'La placa no se ajusta al formato "AB-1234"'
                 
                         }
                 
                       }
                 
                     },

                     marca: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La Marca es requerida'
                 
                         },


                         stringLength: {
     
                           min: 3,
                 
                           message: 'La Marca debe contener al menos 3 letras'
                 
                         },

                         regexp: {
     
                           regexp: /^[A-Z]+$/,
                 
                           message: 'La Marca solo puede contener letras mayusculas'
                 
                         }
                 
                       }
                 
                     },

                     soat: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El SOAT es requerido'
                 
                         },


                         stringLength: {
     
                           min: 13,
                           max: 13,
                 
                           message: 'El SOAT debe contener 13 caracteres'
                 
                         },

                         regexp: {
     
                           regexp: /^(\d{2}-\d{8}-\d{1})$/,
                 
                           message: 'El SOAT debe ajustarse al formato "01-01563361-8"'
                 
                         }
                 
                       }
                 
                     },

                     empleado: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un empleado'
                           }
                        }
                     },

                  }
                
             });

             $("#formeditmoto")
               .find('[name="estado"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'estado');
                   })
                   .end()
               .find('[name="empleado"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'empleado');
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

                     placa: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La placa es requerida'
                 
                         },

                         stringLength: {
     
                           min: 5,
                 
                           message: 'La placa debe contener 5 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^([A-Z]{2}-\d{4})$/,
                 
                           message: 'La placa no se ajusta al formato "AB-1234"'
                 
                         }
                 
                       }
                 
                     },

                     marca: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La Marca es requerida'
                 
                         },


                         stringLength: {
     
                           min: 3,
                 
                           message: 'La Marca debe contener al menos 3 letras'
                 
                         },

                         regexp: {
     
                           regexp: /^[A-Z]+$/,
                 
                           message: 'La Marca solo puede contener letras mayusculas'
                 
                         }
                 
                       }
                 
                     },

                     soat: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El SOAT es requerido'
                 
                         },


                         stringLength: {
     
                           min: 13,
                           max: 13,
                 
                           message: 'El SOAT debe contener 13 caracteres'
                 
                         },

                         regexp: {
     
                           regexp: /^(\d{2}-\d{8}-\d{1})$/,
                 
                           message: 'El SOAT debe ajustarse al formato "01-01563361-8"'
                 
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

                     empleado: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor selecciona un empleado'
                           }
                        }
                     },

                  }
                
             });

             $("#formnuevoplato")
                .find('[name="categoria"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'categoria');
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

                     categoria: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La categoria es requerida'
                 
                         }
                 
                       }
                 
                     },

                     precio: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El precio es requerido'
                 
                         },

                         stringLength: {
     
                           min: 1,
                 
                           message: 'El precio debe contener al menos 1 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[0-9]+(\.[0-9]{2})?$/,
                 
                           message: 'No es un precio valido'
                 
                         }
                 
                       }
                 
                     },

                      estado: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El estado es requerido'
                 
                         }
                 
                       }
                 
                     },

                     imagen: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La imagen es requerida'
                 
                         },
                         file: {
                           extension: 'jpeg,png',
                           type: 'image/jpeg,image/png',
                           maxSize: 1024 * 1024, // 5 MB
                           message: 'El archivo seleccionado no es valido, Este debe ser (png o jpg)'
                 
                        }
                 
                       }
                 
                     },
                     cantidad: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La cantidad es requerida'
                 
                         },

                         stringLength: {
     
                           min: 1,
                 
                           message: 'La cantidad debe contener al menos 1 caracter'
                 
                         },
                         regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'La cantidad solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     descripcion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La descripcion es requerida'
                 
                         },

                         stringLength: {
     
                           min: 10,
                 
                           message: 'La descripcion debe contener al menos 10 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[a-zA-Z ]+$/,
                 
                           message: 'La descripcion solo puede contener letras'
                 
                         }
                 
                       }
                 
                     }

                  }
                
             });

            $("#formeditplato")
                .bootstrapValidator({
                  message: 'Este valor no es valido',

                   feedbackIcons: {
   
                     valid: 'glyphicon glyphicon-ok',
                 
                     invalid: 'glyphicon glyphicon-remove',
                 
                     validating: 'glyphicon glyphicon-refresh'
                 
                   },

                   excluded: ':disabled',

                  fields: {

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

                     categoria: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La categoria es requerida'
                 
                         }
                 
                       }
                 
                     },

                     precio: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El precio es requerido'
                 
                         },

                         stringLength: {
     
                           min: 1,
                 
                           message: 'El precio debe contener al menos 1 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[0-9]+(\.[0-9]{2})?$/,
                 
                           message: 'No es un precio valido'
                 
                         }
                 
                       }
                 
                     },

                      estado: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El estado es requerido'
                 
                         }
                 
                       }
                 
                     },

                     imagen: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La imagen es requerida'
                 
                         },
                         file: {
                           extension: 'png,jepg',
                           type: 'image/jpg,image/png',
                           maxSize: 1024 * 1024, // 5 MB
                           message: 'El archivo seleccionado no es valido, Este debe ser (png, jpg o jpeg)'
                 
                        }
                 
                       }
                 
                     },
                     cantidad: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La cantidad es requerida'
                 
                         },

                         stringLength: {
     
                           min: 1,
                 
                           message: 'La cantidad debe contener al menos 1 caracter'
                 
                         },
                         regexp: {
     
                           regexp: /^[0-9]+$/,
                 
                           message: 'La cantidad solo puede contener letras'
                 
                         }
                 
                       }
                 
                     },

                     descripcion: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'La descripcion es requerida'
                 
                         },

                         stringLength: {
     
                           min: 10,
                 
                           message: 'La descripcion debe contener al menos 10 caracteres'
                 
                         },
                         regexp: {
     
                           regexp: /^[a-zA-ZáéíóúñÁÉÍÓÚÑ,.() ]+$/,
                 
                           message: 'La descripcion solo puede contener letras'
                 
                         }
                 
                       }
                 
                     }

                  }
                
             });

            $("#formasignacion")
                .find('[name="repartidor"]')
                 .selectpicker()
                   .change(function(e) {
                     $('#bootstrapSelectForm').bootstrapValidator('revalidateField', 'repartidor');
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

                     repartidor: {
                 
                       validators: {
                 
                         notEmpty: {
                 
                           message: 'El repartidor es requerido'
                 
                         }
                 
                       }
                 
                     }

                  }
                
             });
        
           

        });