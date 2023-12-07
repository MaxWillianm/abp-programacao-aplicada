# abp-programacao-aplicada
Repositório da ABP de Programação Aplicada

### colaboradores
- Bruno Rosso
- Felipe Saturno
- Max Willian Trajano
- Vitor W


## Diagrama de classes

### Classe produtos: ProdutoController 
Métodos:

- Método para mostrar todos os produtos existentes no banco \n
Public function index() {
}

- Método para visualizar um produto em específico filtrando pelo id \n
Public function view_produto($id) {
}

- Método para mostrar para o usuario administrador todos os produtos \n
Public function admin_index() {
}

- Método para criar um produto no banco para ser exibido em tela \n
Public function create_produto() {
}

- Método para deletar produto especifico passado por parametro \n
Public function admin_delete($id) {
}

- Método para acidionar produto na lista de produtos \n
Public function admin_add() {
}

- Método para editar produto na lista de produtos \n
Public function admin_edit($id) {
}

- Método para capturar o valor da sessão e mostrar para o usuario \n
Public function carrinho() {
}

- Método para adiconar o produto selecionado ao carrinho \n
Public function add_carrinho() {
}

- Método para finalizar a sessão apos a comprar e voltar pagina de produtos \n
Public function finalizar() {
}

### Classe Usuários: UsuariosController \n
Métodos:

- Método para mostrar todos os usuários existentes no banco \n
Public function index() {
}

- Método para mostrar todos os usuarios cadastradis para o usuario administrador \n
Public function admin_index() { 
}

- Método utilizado pelo usuario administrador para deletar um usuário passado por parametro  \n
Public function admin_delete(%id) {
}

- Método  utilizado pelo usuario administrador para adicionar um usuário no banco \n
Public function admin_add() {
}

- Método  utilizado pelo usuario administrador para editar um usuário no banco \n
Public function admin_edit(%id) {
}

- Método para pegar o que o usuário digitou e verifica se existe no banco e faz login \n
public function login() {
}

- Método para apagar o usuário da sessão \n
Public function logout() {
}


### Classe: PasswordController

- Método que recebe um email e envia um link de redefinição de senha \n
Public function index()

- Método que abre o link enviado pelo método anterior, e verifica se é válido e permite o usuário redefinir a senha \n
Public function verify_recover_key
Objetos \n


Nosso trabalho consta apenas três classes para objetos, seriam produtos, usuarios e passwordreset. \n

### Objeto usuário: Cada usuário irá conter:

- id para identificá-lo no banco de dados com autoincremento \n

- nome que seria o nome de cada usuário varchar (100) \n

- email para guardar o email do usuário varchar(50) \n

- senha campo para guardar a senha do varchar(50) \n

- nascimento data de nascimento do usuário date(15) \n

- sexo identificar o sexo do usuário varchar(10) \n

### Objeto produto: Cada produto irá conter:

- id para identificação dentro do banco de dados autoincremento \n

- nome para descrever o nome do produto em especifico e filtra-lo varchar(100) \n

- valor campo destinado para cada produto inserir seu preço FLOAT \n

- descrição do produto mais detalhada varchar(200) \n


