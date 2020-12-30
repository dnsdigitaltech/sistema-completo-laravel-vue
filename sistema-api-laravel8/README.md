## Rede Social completa em API Laravel 8 e FrontEnd VueJS

Banco de Dados
- users
- conteudos
- comentarios

Tabela conteudo
- id
- user_id
- texto 
- imagem
- link
- data

Tabela comentario
- id
- conteudo_id
- user_id
- texto 
- data

Relacionamentos
- Amigos: user_id - amigo_id
- Curtidas: user_id - conteudo_id

Criando Modelos e Migrações
php artisan make:model Conteudo -m
php artisan make:model Comentario -m
php artisan make:migration create_amigos_table --create=amigos
php artisan make:migration create_curtidas_table --create=curtidas