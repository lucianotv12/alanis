
var frmvalidator  = new Validator("login_formulario");
/*---------- USER-----------*/
frmvalidator.addValidation("usuario","req","Ingrese su nombre de usuario");
frmvalidator.addValidation("usuario","maxlen=15", "User, no debe superar los 15 caracteres");
/*----------PASSWORD-----------*/
frmvalidator.addValidation("contrasena","req","Ingrese el password");
frmvalidator.addValidation("contrasena","maxlen=15", "Password, no debe superar los 15 caracteres");
frmvalidator.addValidation("contrasena","minlen=4", "Password, debe superar los 4 caracteres");
frmvalidator.addValidation("contrasena","alnum", "Password, debe contener letras y numeros unicamente");
