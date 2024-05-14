# :mag: [Desafio TMS - Search Deliveries] :computer:

![TMS](https://joanini.com.br/wp-content/uploads/bfi_thumb/blog05_11-qe0fjed0ypf35ar3rlhlottwiwbmv676a68n4j0f54.png) 

Olá! Seja bem-vindo ao seu novo sistema TMS!
 
Você já teve a sensação de estar em uma corrida maluca, tentando equilibrar caixas de quebra-cabeças enquanto foge de obstáculos fiscais como se fossem bananas no caminho? Bem-vindo ao mundo do transporte de cargas! Mas não se preocupe, estamos aqui para transformar essa aventura em uma festa!

Imagine um sistema tão incrível que transforma o caos em harmonia, como um DJ mixando beats na pista de dança. Sim, você está prestes a conhecer o TMS da nossa turma! Com ele, não apenas simplificamos cada etapa do transporte de carga, mas transformamos todo o processo em uma experiência digna de parque de diversões.

Esqueça os problemas financeiros, porque com o nosso TMS, até mesmo o Tio Patinhas ficaria impressionado com a economia que conseguimos fazer. E integrações tecnológicas? É como juntar peças de um quebra-cabeça, só que muito mais divertido e sem perder nenhuma peça!

Então, se você é daqueles que ama uma boa aventura, tecnologia de ponta e diversão, junte-se a nós! Aqui, cada dia é uma nova página de um livro de histórias incríveis, e você é o herói dessa jornada.

Prepare-se para uma viagem cheia de emoções, risadas e sucesso! Junte-se a nós e vamos transformar o mundo da logística.

## [:point_right: Sumário](#point_right-sumário)

- [:computer: Vamos lá? :computer:](#computer-desafio-tms-computer)
  - [:point\_right: Sumário](#point_right-sumário)
  - [:rotating\_light: Como Executar?](#rotating_light-como-executar)
  - [:question: Uso Básico](#question-uso-basico)
  - [:sparkles: Tecnologias](#smile-autores)
  - [:smile: Autores](#smile-autores)

## [:rotating_light: Como executar?](#rotating_light-como-executar)
> :rotating_light: Ter o docker previamente configurado (caso não o tenha, verifique esse link: [video](https://www.youtube.com/watch?v=tm4WpxBai0w&t=312s))
### Clone o repositório:

- Via terminal vá a um diretório de sua escolha e use o seguinte comando:
  ```
  git clone https://github.com/duds-la/project_tms.git
  ```
- Caso queira clonar apenas o conteúdo do repositório dentro do diretório selecionando sem a pasta **project_tms** use o seguinte comando:
  ```
  git clone https://github.com/duds-la/project_tms.git .
  ```
### Após clonar, inicie o projeto:
> :rotating_light: Caso queira se aprofundar um pouco mais: [documentação oficial](https://laravel.com/docs/master/sail#main-content)
 - Entre no diretório do projeto e execute o seguinte comando: 
  ```
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
  ```
- Ajuste o .env.exemple para .env ou crie um [.env](https://laravel.com/docs/11.x/configuration)
> O docker do projeto utiliza **MySql** caso queira utilizar outro banco de dados é necessário a modificação no arquivo **docker-compose.yml**
- Após ajustar a parte do .env referente a conexão com seu banco de dados rode o seguinte comando
> Caso o comando **sail** não seja reconhecido use **./vendor/bin/sail**
  ```
  sail up --build
  ```
- Pressione CTRL + C para parar, rode:
```
sail up -d
```
```
sail artisan migrate
```
- Se apresentar algum erro, rode:
```
docker-compose down --volumes
```
```
sail up --build
```
- Pressione CTRL + C para parar, rode:
```
sail up -d
```
```
sail artisan migrate
```
- Após rodar as migrations, rode:
```
sail npm install
```
```
sail artisan key:generate
```
```
sail npm run dev
```
## [:question: Uso Básico da Ferramenta](#question-uso-basico)

### Primeiro Acesso:
- Quando realizar o seu primeiro acesso a ferramenta, cairá nesa tela:
![image](https://github.com/duds-la/project_tms/assets/110792669/e6ad0d19-ab15-4384-8c56-40fa90dd0d27)
### Afinal o que seria um CPF válido??
- No caminho abaixo exite dois arquivos, caso a API disponibilizada para consulta esteja fora do ar a aplicação fará a consulta nesses arquivos os retornando como o response da API, entrando no arquivo destacado terá uma lista de entregas com N valores pegue qualquer valor da chave **_cpf** e realize a busca
![image](https://github.com/duds-la/project_tms/assets/110792669/350f99f1-10f8-4524-9884-884b8481ea60)
### Após a primeira busca:
- Após a sua primeira busca válida será exibido essa tela, nela você tem 4 ações possíveis: Ver todas as entregas, listar as entregas daquele CPF, filtrar por entregas já sinconizadas com a API buscando pelo nome da transportadora e vizualizar + dados sobre aquela entrega.
![Captura de tela 2024-05-13 200441](https://github.com/duds-la/project_tms/assets/110792669/003d7546-b769-4f2d-82ab-687a0db8974e)
### Vizualizando + detalhes:
- Quando selecionado para ver + detalhes irá abrir uma tela com todas as informações daquela entrega, e será aberto um mini-mapa que utiliza da latitude e longitutde disponibilizadas na lista mencionada anteriormente para melhor ilustrar a localização
![giphy](https://github.com/duds-la/project_tms/assets/110792669/3da6c40d-c34b-4721-9426-b9e00030772e)
- Ainda nessa tela você tem a opção de ver o status da entrega, clicando nesse botão é aberto um modal que exibe as etapas:
![Captura de tela 2024-05-13 200657](https://github.com/duds-la/project_tms/assets/110792669/7c5e7f35-8028-480e-9768-dfef98748eb4)
![Captura de tela 2024-05-13 200701](https://github.com/duds-la/project_tms/assets/110792669/f2ddd863-5891-465a-8620-0397cb6a64bb)

## [:sparkles: Tecnologias Usadas](#sparkles-tecnologias)

### <img src="https://www.docker.com/wp-content/uploads/2023/05/symbol_blue-docker-logo.png?size=50" width=50>
> Docker
- Para gantir uma padronização em diferentes ambientes e manter a versão de todas os recursos utilizados iguais para qualquer um que queira fazer parte do desenvolvimento
    [documentação-docker](https://www.docker.com/)
  
### <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/800px-Laravel.svg.png?size=50" width=50>
> Laravel
- O laravel foi minha opção de escolha por conta dos recursos robustos que entrega em um tipo de arquitetura que gosto muito que é a MVC, junto também da ativa comunidade e de suas ultimas realeses.
[documentação-laravel](https://laravel.com/)
### <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png?size=50" width=50>
> VUE
- Um framework javascript para componentização e construção de recursos SPA, que tem uma enorme integrabilidade com o laravel.
[documentação-vue](https://vuejs.org/)
### <img src="https://avatars.githubusercontent.com/u/47703742?s=200&v=4?size=50" width=50>
> InertiaJs
- Uma biblioteca javascript que permite a integração de um framework SPA com o laravel sem a construção de API's seguindo o MVC que o laravel tem por padrão
[documentação-inertia-js](https://inertiajs.com/)
### <img src="https://i0.wp.com/futuresolutionsonline.co.uk/wp-content/uploads/2023/04/mySQL-logo.png?fit=300%2C300&ssl=1?size=50" width=50>
> Mysql
- Um dos bancos de dados mais usados e difundidos attualmente, sem dizer na grande integração que possuí junto do laravel.
[documentação-mysql](https://www.mysql.com/)
## [:smile: Autores](#smile-autores)

| [<img src="https://github.com/duds-la.png?size=115" width=115><br><sub>@duds-la</sub>](https://github.com/duds-la) 
| :---: |
  





