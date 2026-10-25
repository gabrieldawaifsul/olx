# Estrutura do Projeto
## Estrutura de Arquivos
|-- res - recursos estaticos pro website. fontes, stylesheets  
|-- src - codigo executavel, as paginas, os scripts  
| .env - variáveis globais pro projeto  
| docker-compose.yaml - configuração base dos containers em um escopo geral  
| Dockerfile - configuração mais específica dos containers  
| readme.md - explicação das coisas

## Estrutura do Banco de Dados
Users(**<u>id</u>**, mail, senha, nome, foto)\
Itens(**<u>id</u>**, <u>uid</u>, preco, qtd, nome, desc, fotos, categoria)\
Mensagens(<u>uid1</u>,<u>uid2</u>, texto)\
Carrinhos(<u>uid</u>,<u>iid</u>)

## Estrutura de Páginas
index.php   - página de landing  
sign.php    - signin/signup, autenticação de usuário  
user.php    - meus items, meu carrinho, minha conta  
item.php    - o item para venda e seus detalhes  
sell.php    - cadastrar um item para venda  
search.php  - pesquisar items a venda  
msgs.php    - conversar com outros usuários sobre os items  
about.php   - descrição do projeto e informação de contato  