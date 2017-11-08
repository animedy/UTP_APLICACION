        $(document).ready(function(){
             $("#FormLogin")
               .bootstrapValidator({
                  message: 'Este valor no es valido',

                   feedbackIcons: {
   
                     valid: 'glyphicon glyphicon-ok',
                 
                     invalid: 'glyphicon glyphicon-remove',
                 
                     validating: 'glyphicon glyphicon-refresh'
                 
                   },
                  fields: {

                     login: {
                        validators: {
                           notEmpty: { 
                              message: 'ingresa tu correo electronico registrado'
                           },

                           regexp: {
     
                          regexp: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                 
                          message: 'no es un correo electronico valido'
                 
                           }
                        }
                        
                     },
                     password: {
                        validators: {
                           notEmpty: { 
                              message: 'ingresa tu contraseña registrada'
                            }
                        },

                        stringLength: {
     
                           min: 8,
                 
                           message: 'la contraseña es incorrecta '
                 
                         }
                     }
                 }
             });
        });
