****Pequena aplicação para gerenciar algumas funções do Active Directory.  Utiliza PHP + Yii2 + Docker.****

Definir os seguintes parametros em config\web.php:

    'account_suffix' => '@dominio.local.com',
    'base_dn' => 'DC=dominio,DC=local,DC=com',
    'domain_controllers' => [
        'x.x.x.x',
    ],
    'admin_username' => 'admin',
    'admin_password' => 'adminpassword',

Extrair certificado do AD e colar em:

    docker\cert.pem

Iniciar aplicação com o comando:

    docker-compose up -d 

Acessar aplicação:

    http://localhost:8080/
 