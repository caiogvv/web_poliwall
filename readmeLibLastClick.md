# Library Last Click Manager Tester

Script puppeteer para ajudar a testar implementações da Library Last Click (GTM) em sites de clientes. O script possui 17 cenários de carregamentos diferentes, divididas entre navegações diretas, por referência e em iframes.

## Pré-requisitos

Você precisa ter o `npm` e o `node` instalados. Não detalharei o processo porque também não sei instalar direito. O que funcionou para mim foi:

```
sudo apt-get update
sudo apt-get install npm
sudo npm cache clean -f
sudo npm install -g npm
sudo npm install -g n
sudo n latest
sudo apt-get purge npm
```

Basicamente o que isso faz (em Ubuntu-likes) é instalar a versão antiga do npm via gerenciador de pacotes do linux, e depois utiliza o `npm` para se auto-atualizar. O pacote `n` instala o `node`.

Uma vez instalados, sempre que quiser atualizar o `node` e o `npm`, basta fazer:
```
sudo npm install -g npm
sudo n latest
```

Caso os comandos de instalação/update não funcionem para você, tente seguir algum tutorial na internet.

Para verificar as versões instaladas:
```
npm -v
node -v
```

## Instalação

Clone o reposiório:

```
git clone https://gitlab.com/devraccoon/tags-team/library-last-click-manager-tester.git
cd library-last-click-manager-tester
```

Instale as dependências listadas em *package.json* (basicamente puppetter):

```
npm install
```

## Uso

* Altere o arquivo de configuração *config.js* preenchendo-o com os dados do cliente que se deseja testar
* execute *index.js*. Para tanto, entre no diretório *src* e execute `node index.js`. Alternativamente, ao invés de entrar no diretório, você pode especificar o caminho relativo do *index.js*. Outra alternativa seria via o script *test* em *package.json*: comando `npm test` .

Por padrão, 17 testes serão executados (você pode criar mais). Cada teste imprimirá algumas informações no console, e a última delas é a lista de erros encontrados no teste. Caso não apareça nenhum erro, significa que o teste passou com sucesso.
