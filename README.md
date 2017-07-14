# php-002-a-loja

### Anotações OO:
- No paradigma procedural o estado e o comportamento não vivem juntos, só concentra comportamento.
    - Estrutura > função > variavel
- No paradigma orientado a objetos o estado e o comportamento vivem juntos.
    - Classe > método > atributo
- Comparação entre objetos com:
    == compara os atributos, e retorna true se todos tiverem o mesmo valor
    === compara as instancias do objeto, e retorna true se é a mesma instancia

VER VIDEO 1 AULA 1

### Anotações Estruturado:
- Não é preciso colocar o "mysqli_close()" pq o PHP sabe se virar sozinho.
- Não fechar blocos PHP (?>) em arquivos só com PHP, evita de o usuário receber espaços em branco inseridos após o fechamento.
- Códigos mais importantes que o servidor devolve para o navegador:
    200 - tá tudo certo;
    404 - não achei (Page Not Found);
    500 - erro no servidor;
    302 - redireciona ae;
- Sempre use o "die()" após o redirecionamento com "header()" para evitar envio de dados criticos para o navegador.
- Não é uma boa ideia usar GET para adicionar e remover. Pq?
    - Limitação de caracteres na URI.
    - Plugins que aceleram a navegação, acessam escondido os links no corpo da pagina, para deixar em cache.
        <a href="remove-produto.php?id=12">Excluir</a>
    - GET significa "pegar dados" e não "mudar dados".
    - O GET não pode alterar o banco, senão o robo do Google acessa teu site, ae fu&*@.
- No PHP só duas strings são falsas:
    "0" e ""
    - O "false" é true.
- Quando um cookie é setado com tempo, ele expira somente depois de passado o tempo, mesmo se for fechado o browser.
- É possivel criar na mão o escopo de flash que são mensagens exibidas na proxima requisicao e deletadas da sessao.
- SQL injection:
    ' or id=1  or 'guilherme'='
- Diferença:
    - O "include" se não acha o arquivo gera uma WARNING.
    - O "require" se não acha o arquivo gera um ERROR.
    - O "require_once" inclui o arquivo uma vez so.