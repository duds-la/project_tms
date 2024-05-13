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


## [:smile: Autores](#smile-autores)

| [<img src="https://github.com/duds-la.png?size=115" width=115><br><sub>@duds-la</sub>](https://github.com/duds-la) 
| :---: |
  





