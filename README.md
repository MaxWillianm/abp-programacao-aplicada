# abp-programacao-aplicada
Repositório da ABP de Programação Aplicada

### colaboradores
- Bruno Rosso
- Felipe Saturno
- Max Willian Trajano
- Vitor W


Documentação 

Diagrama de classes

Classe produtos: ProdutoController 
Métodos:
*Método para mostrar todos os produtos existentes no banco 
Public function index() {
}

*Método para visualizar um produto em específico filtrando pelo id
Public function view_produto($id) {
}

*Método para deletar um produto dentro do banco e por consequência em tela
Public function delete_produto($id) {
}

*Método para criar um produto no banco para ser exibido em tela
Public function create_produto() {
}

*Método para editar um produto no banco para ser exibido em tela
Public function edit_produto($id) {
}

Classe Usuários: UsuariosController 
Métodos:
*Método para mostrar todos os usuários existentes no banco
Public function index() {
}

*Método para deletar um usuário dentro do banco pelo id e por consequência em tela
Public function delete_user($id) { 
}

*Método para criar um usuário no banco para ser exibido em tela
Public function create_user() {
}

*Método para editar um usuário no banco pelo seu id para ser exibido em tela
Public function edit_user($id) {
}

*Método para pegar o que o usuário digitou e verifica se existe no banco e faz login 
public function login() {
}

*Método para apagar o usuário da sessão
Public function logout() {
}

Objetos

Nosso trabalho consta apenas duas classes para objetos, portanto seriam os usuários e os produtos. A quantidade deles aí varia de acordo com a aplicação.

Objeto usuário: Cada usuário irá conter:

•	id para identificá-lo no banco de dados com autoincremento

•	nome que seria o nome de cada usuário varchar (100)

•	email para guardar o email do usuário varchar(50)

•	senha campo para guardar a senha do varchar(50)

•	nascimento data de nascimento do usuário date(15)

•	sexo identificar o sexo do usuário varchar(10)

Objeto produto: Cada produto irá conter:

•	id para identificação dentro do banco de dados autoincremento

•	nome para descrever o nome do produto em especifico e filtra-lo varchar(100)

•	valor campo destinado para cada produto inserir seu preço FLOAT

•	descrição do produto mais detalhada varchar(200)


