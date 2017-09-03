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
                              message: 'Por favor el nombre de usuario es requerido y no puede ser vacio'
                           },

                           regexp: {
     
                           regexp: /^[A-Za-z ]+$/,
                 
                           message: 'El usuario solo puede contener letras'
                 
                           }
                        }
                        
                     },

                       login1: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor el correo es requerido y no puede ser vacio'
                           }

                         
                        }
                        
                     },

                     password: {
                        validators: {
                           notEmpty: { 
                              message: 'Por favor la contraseña es requerida y no puede ser vacio'
                           }
                        },

                        stringLength: {
     
                           min: 8,
                 
                           message: 'El usuario debe contener al menos 8 caracteres'
                 
                         }
                     }
                 }
             });
  
        });
    
          

        