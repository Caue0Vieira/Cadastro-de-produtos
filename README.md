# Cadastro de Produtos

Esse é um sistema de gereciamento de produtos, que permite cada produto pertencer a uma categoria. É possivel fazer o cadastramento dos seus produtos e das sua categorias

---

## Funcionalidades 

1. **Cadastro de Produtos**
2. **Cadastro de Categorias**
3. **Visualizar Produtos**
4. **Visualizar Categorias**
5. **Edição de Produtos**
6. **Edição de Categorias**
7. **Deletar Produtos**
8. **Deletar Categorias**

## Configuração do Ambiente

Foi utilizado o docker para facilitar a configuração e execução do projeto.

### Requisitos
- Docker
- Docker Compose

## Subindo o Ambiente 
1. Clone o repositório.
   ```bash
   git clone https://github.com/Caue0Vieira/Cadastro-de-produtos.git
    cd Cadastro-de-produtos
   ```
2. Execute o comando para subir os contêineres.
   ```bash
   docker-compose up -d --build
   ```
3. Acesse o contêiner da aplicação:
   ```bash
   docker exec -it laravel_app bash
   ```
4. Instale o Node:
 ```bash
   npm install && npm run build && npm install husky
   ```
5.Instale o Compose
 ```bash
   compose install
   ```

## Tecnologias Utilizadas

- **Laravel**: Framework PHP utilizado para criar a API.
- **Postgres**: Banco de dados utilizado para armazenar as informações dos Produtos e das Categorias.
- **Docker**: Facilita a configuração do ambiente de desenvolvimento.
- **VSCODE**: Ferramenta de edição de texto.

---

## Docker Compose

O arquivo `docker-compose.yml` está configurado para iniciar:

1. **App**: A aplicação Laravel.
2. **Postgres**: Banco de dados para armazenar os Produtos e as Categorias.


---

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
