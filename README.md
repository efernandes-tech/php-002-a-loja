# php-002-a-loja

### Anotações OO:
- No paradigma procedural o estado e o comportamento não vivem juntos, só concentra comportamento.
    - Estrutura > função > variável
- No paradigma orientado a objetos o estado e o comportamento vivem juntos.
    - Classe > método > atributo
- Comparação entre objetos com:
    == compara os atributos, e retorna true se todos tiverem o mesmo valor
    === compara as instancias do objeto, e retorna true se é a mesma instancia
- Cada classe em um arquivo e com os nomes iguais
    Produto.php / class Produto {}
- O PHP 5 possui o autoload (para estrategias de fallback), onde vc cria uma função para carregar as classes, assim não precisa espalhar requere_once() pelo arquivo, basta adicionar no inicio:
    function carregaClasse($nomeDaClasse) {
        require_once("class/".$nomeDaClasse.".php");
    }
    spl_autoload_register("carregaClasse");
- Para encapsular os métodos de acesso ao banco de dados, é comum usar o padrão de projeto (design pattern) data access object (DAO), onde vc cria um classe para isto.
- Quanta ao uso de protected ou private em heranças, o melhor é não afrouxar o encapsulamento por causa da herança, use o método get.

### Anotações Estruturado:
- Não é preciso colocar o "mysqli_close()" pq o PHP sabe se virar sozinho.
- Não fechar blocos PHP (?>) em arquivos só com PHP, evita de o usuário receber espaços em branco inseridos após o fechamento.
- Códigos mais importantes que o servidor devolve para o navegador:
    200 - tá tudo certo;
    404 - não achei (Page Not Found);
    500 - erro no servidor;
    302 - redireciona ae cara;
- Sempre use o "die()" após o redirecionamento com "header()" para evitar envio de dados críticos para o navegador.
- Não é uma boa ideia usar GET para adicionar e remover. Pq?
    - Limitação de caracteres na URI.
    - Plugins que aceleram a navegação, acessam escondido os links no corpo da pagina, para deixar em cache.
        <a href="remove-produto.php?id=12">Excluir</a>
    - GET significa "pegar dados" e não "mudar dados".
    - O GET não pode alterar o banco, senão o robô do Google acessa teu site, ae fu&*@.
- No PHP só duas strings são falsas:
    "0" e ""
    - O "false" é true.
- Quando um cookie é setado com tempo, ele expira somente depois de passado o tempo, mesmo se for fechado o browser.
- É possível criar na mão o escopo de flash que são mensagens exibidas na próxima requisição e deletadas da sessão.
- SQL injection:
    ' or id=1  or 'guilherme'='
- Diferença:
    - O "include" se não acha o arquivo gera uma WARNING.
    - O "require" se não acha o arquivo gera um ERROR.
    - O "require_once" inclui o arquivo uma vez só.
- Factories ajudam na criação de um objeto que seja complexo e que esse trabalho não seja necessario que o programador saiba como implementar.