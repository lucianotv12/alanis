/*----------------------------------------------------------------------------*/
/*               Validaciones para el Formulario de Usuarios
/*----------------------------------------------------------------------------*/
//You should create the validator only after the definition of the HTML form

var frmvalidator  = new Validator("cliente");

/*---------- RAZON SOCIAL -----------*/
frmvalidator.addValidation("nombre","req","Ingrese Razon social del cliente");

/*---------- Nombre -----------*/

