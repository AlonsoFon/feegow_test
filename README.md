Projeto de teste para vaga de arquiteto de software senior na feegow

## COMO RODAR O PROJETO

1- Faça o clone do projeto

2- Rodar o comando "composer install"

3- Rodar o comando "php artisan migrate"

4- Rodar o comando "php artisan db:seed"

5- Rodar o comando "php artisan serve"


## FERRAMENTAS UTILIZADAS NO SISTEMA

Nesse projeto não implementei o docker, pois meus containers estava com o vite e dependendo da maquina pode causar alguns problemas e como não iria acompanhar a instalação e testes poderia ser considerado um sistema falho ou quebrado.

Foi utilizado banco MYSQL 8.0 para guardar os agendamentos. Laravel 9. PHP 8.1. Para o frontend foi utilizado bootstrap + css + jquery + javascript e no caso de implementação do docker eu teria optado por trocar o bootstrap pelo vite pois considero ele mais embelezado. No backend fiz um service para as comunicações com a api "ApiService" e como o teste era bem simples apenas um controller "ScheduleController".

## FUNCIONALIDADES

Para acessar o agendamento basta ir em "http://localhost:8000/", nessa tela será apresentado e realizado todo o fluxo de solicitar um horário.

Foi desenvolvido também uma área de admin customizavel com o voyager, para acessa-lo basta ir em "http://localhost:8000/admin". No login colocar as credencias:

usuario: admin@feegow.com
senha: feegow

Essas credenciais são inseridas ao banco de dados ao rodar o seeder.

Nessa área de admin foi desenvolvido uma tela para visualização das solicitações de horários. Por ele ser altamente customizavel da para setar literalmente tudo nesse administrador, porém fiz apenas a configuração basica para exibição dos horários agendados, porque algumas configurações não são persistentes a mudanças de ambientes locais sem a utilização de um servidor de armazenamento (ex: aws S3).

Para a persistencia das alterações do voyager foi utilizado o plugin iseed, basta rodar o command VoyagerSeeds com o seguinte comando "php artisan generate:voyager-seed", mas como relatado na trend acima, algumas configurações de media não serão persistentes pela ausencia de um servidor de armazenamento.
