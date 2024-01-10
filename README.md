# Ongs

Um aplicativo voltado para democratização do acesso à ongs.

# Tecnicamente

- API feita com laravel
- Gerenciamento de filas para disparo de emails
- Introdução de gerenciamento de logs
- Healthy check

---

# Features

- Users
    - CRUD
    - Auth - ACL (nível de permissionamento por função)
- Ongs
    - CRUD
- Clients
    - CRUD
- Appointments
    - CRUD
- Animals
    - CRUD
- Employee
    - CRUD
- Schedules
    - Montar o calendário de cada funcionário
        - Pesquisar a forma mais atual de fazer isso pra evitar dados desnecessários.

---

# MVP - 19/04

## Poder ver as ongs próximas de mim e os serviços que elas prestam.

- Horário de funcionamento
- Serviços prestados
- Meu histórico

## Pra isso funcionar o que é necessário?

- Ter uma autenticação
- Cadastro de ongs
- Cadastro de usuários
- Cadastro de serviços prestados
- Busca por proximidade da localização
