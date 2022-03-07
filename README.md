
![Logo](https://www.opovo.com.br/reboot/includes/assets/img/opovo%20logo.svg)


# Noticias-API

API desenvolvido para realizar operações de CRUD de noticias, com base nos seus tipos e com baso no
jornalista logado





## Tecnologias Utilizadas

**Ambiente de Desenvolvimento:** Docker

**Linguagem:** PHP

**Framework:** Laravel

**Banco de dados:** Mysql

**Plataforma para teste da api:** Postman

**Observação**: \
Nesse projeto foi utilizado o **Laravel Sail**. \
O **Laravel Sail** é uma interface de linha de comando leve para interagir com o ambiente de desenvolvimento Docker padrão do Laravel.  
O `sail` script fornece uma CLI com métodos convenientes para interagir com os contêineres do Docker definidos pelo docker-compose.yml.




## Instalação

**1º Passo**: Iniciar os containers Docker

Após clonar o projeto, deve-se entrar na pasta raiz do projeto, onde se encontra o arquivo "docker-compose.yml" :

```bash
cd noticias-api/
```

Estando na pasta raiz do projeto, deve-se rodar o comando para instalar as dependências:

```bash
docker run --rm \
  -u "$(id -u):$(id -g)" \
  -v $(pwd):/var/www/html \
  -w /var/www/html \
  laravelsail/php81-composer:latest \
  composer install --ignore-platform-reqs
```

**2º Passo:**  Gerar o alias para o comando original do sail

```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

**3º Passo:**  Gerar o arquivo .env

```bash
cp .env.example .env
```

**4º Passo:** Agora devemos subir os containers e criar os volumes, rodar o comando:

```bash
sail up -d
```

**5º Passo:**  Setar APP_KEY no .env

```bash
sail artisan key:generate
```

**6º Passo:** Criar as tabelas

```bash
sail artisan migrate
```

**7º Passo:** Gerar as seeders

```bash
sail artisan db:seed
```

#### PRONTO! A API está funcionando! :grinning:


**Obs**: Caso deseje encerrar os containers:

```bash
./vendor/bin/sail down
```

## Documentação da API

[Documentação](https://documenter.getpostman.com/view/5876341/UVsEUoc8)

