# Resumo do Projeto

Olá esse aqurivo será como um post-it das coisas referentes ao projeto. Conforme ele for sendo
desenvolvido irei tomando notas aqui afim de quando for montar de fato a documentação ter um resumo
(e lembrar também kkkkkk) do por quê eu fiz cada coisa. Espero que não julgue meus erros de português :).

## Docker
Para deixar mais facíl a utilização da ferramenta, como manter a hemoginização em diferentes ambientes. Decidi usar
docker com uma imagem do php e mysql. Assim qualquer outro desenvolvedor vai ter 
acesso ao mesmo ambiente que tenho. Seja para desenvolver ou debugar. Para fazer as instalções dos pacotes entrei
no container do docker;


## Inertia
Escolhi o InertiaJs pela rapidez que ele traz em construir um front com SPA, sem todo
aquele tempo extra precisando contruir APIS em JS vou poder pensar e elaborar melhor a 
minha lógica usando o PHP. Alguns dos bonús é que não preciso me proecupar com alteração da estrutura
do laravel o que me garante que não vou ter dor de cabeça com algo funcionando errado, ou seja
continuarei usando o bom MVC do laravel sem problemas.

## VUE
Desenvolvimento rápido e simples com baix complexidade e alta dinamicicidade. Alta integração com laravel assim
busca de exemplos e ajuda se torna mais simples

## TAILWIND 
Rapidez no desenvolvimento;


## FACADE
Criei uma facade pois assim consigo usar ela no meu sistema como um todo o que evita que precise repetir código

## SERVICE-PROVIDER E FACEDES DISTINTOS?
Criei arquivos distintos para manter a responsabilidade única para cada serviço, pois se mudar a uri da api
é só alter em um único arquivo

## INSTANCIAR A SERVICE NO CONTRUCT:
Injeção de Dependência: Ao injetar o serviço no construtor do controlador, você está seguindo o princípio da injeção de dependência, o que promove o desacoplamento de classes. Isso significa que o controlador não precisa saber como instanciar o serviço, apenas precisa receber uma instância já existente. Isso simplifica o código e facilita a manutenção.
Facilidade de Testes: Injetar o serviço torna mais fácil testar o controlador. Durante os testes, você pode facilmente substituir o serviço real por um serviço de simulação ou um objeto de dublê (mock) para controlar o comportamento do serviço e isolar o teste do controlador.
Reutilização de Código: Ao usar um serviço separado, você promove a reutilização de código. Se houver lógica relacionada a entregas em outros controladores ou partes do aplicativo, você pode reutilizar o mesmo serviço em vez de duplicar o código.
Manutenção e Escalabilidade: Separar a lógica de negócios em serviços torna o código mais organizado e fácil de entender. Isso facilita a manutenção e escalabilidade do aplicativo, pois você pode modificar ou adicionar funcionalidades em um único local (o serviço) sem precisar alterar vários controladores.




