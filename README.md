# php-aws-sns
Libreria para integración básica de mensajes mediante PHP y SNS

## Requerimientos
<ul>
<li>PHP</li>
<li>Aws Sdk ~3.0</li>
<li>Keys de acceso de usuario para SNS con el fin de configurar las variables env('SNS_KEY') y env('SNS_KEY_SECRET').</li>
</ul>

Nota: Probado en versioón 7.1 de PHP

## Uso
SnsService::SendSms('+52', $phone, $message);
