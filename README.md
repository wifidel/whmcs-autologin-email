# whmcs-autologin-email

Esto es una adaptación del código facilitado por WHMCS en https://docs.whmcs.com/AutoAuth

Debes subir el archivo mail-auto-login.php en la ruta /includes/hooks/ de tu WHMCS.

Debes incluir $autoauthkey = "aquíunaclavesegura"; en el archivo configuration.php de WHMCS

Una vez hecho esto podrás mostrar el link añadiendo {$linkauto} en cualquiera de las plantillas de email especificadas en el archivo mail-auto-login.php

IMPORTANTE: Este enlace da acceso completo al área de cliente. ÚSALO BAJO TU RESPONSABILIDAD.

NOTA: Según WHMCS el enlace sólo es válido durante 15 minutos una vez que es generado.

Un saludo.
