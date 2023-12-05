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

*Método para mostrar para o usuario administrador todos os produtos
Public function admin_index() {
}

*Método para criar um produto no banco para ser exibido em tela
Public function create_produto() {
}

*Método para deletar produto especifico passado por parametro
Public function admin_delete($id) {
}

*Método para acidionar produto na lista de produtos
Public function admin_add() {
}

*Método para editar produto na lista de produtos
Public function admin_edit($id) {
}

*Método para capturar o valor da sessão e mostrar para o usuario
Public function carrinho() {
}

*Método para adiconar o produto selecionado ao carrinho
Public function add_carrinho() {
}

*Método para finalizar a sessão apos a comprar e voltar pagina de produtos
Public function finalizar() {
}

Classe Usuários: UsuariosController 
Métodos:

*Método para mostrar todos os usuários existentes no banco
Public function index() {
}

*Método para mostrar todos os usuarios cadastradis para o usuario administrador
Public function admin_index() { 
}

*Método utilizado pelo usuario administrador para deletar um usuário passado por parametro 
Public function admin_delete(%id) {
}

*Método  utilizado pelo usuario administrador para adicionar um usuário no banco 
Public function admin_add() {
}

*Método  utilizado pelo usuario administrador para editar um usuário no banco 
Public function admin_edit(%id) {
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


