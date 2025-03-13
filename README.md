# Bikes By Fazenda - Website

## Sobre o Projeto

O Bikes By Fazenda é uma plataforma de e-commerce especializada em motociclos e produtos relacionados, desenvolvida para oferecer uma experiência de compra completa para entusiastas de motos em Portugal. O site permite aos utilizadores navegar por um catálogo detalhado de motociclos e produtos, adicionar itens ao carrinho, realizar pagamentos e acompanhar as suas encomendas.

## Funcionalidades Principais

### Para Clientes
- **Catálogo de Motociclos**: Navegação e filtragem por diversas categorias e especificações técnicas
- **Catálogo de Produtos**: Acessórios e peças para motociclos
- **Carrinho de Compras**: Adição de produtos e motociclos, atualização de quantidades
- **Sistema de Pagamento**: Integração com Stripe para processamento seguro de pagamentos
- **Perfil de Utilizador**: Gestão de informações pessoais e histórico de encomendas
- **Autenticação**: Registo, início de sessão e verificação de email

### Para Administradores
- **Painel Administrativo**: Visão geral das vendas, utilizadores e produtos
- **Gestão de Produtos**: Adição, edição e remoção de produtos
- **Gestão de Motociclos**: Cadastro detalhado com especificações técnicas
- **Gestão de Categorias**: Organização de produtos e motociclos
- **Gestão de Marcas**: Cadastro e gestão de marcas
- **Gestão de Encomendas**: Acompanhamento e atualização do estado das encomendas
- **Relatórios**: Geração de relatórios em PDF

## Especificações Técnicas

### Motociclos
O sistema permite o cadastro detalhado de motociclos com informações como:
- Especificações do motor (tipo, cilindrada, potência)
- Sistema de transmissão
- Sistema de lubrificação
- Sistema de ignição
- Sistema de arranque
- Suspensão dianteira e traseira
- Dimensões e peso
- Tipo de carta necessária
- E muito mais

### Tecnologias Utilizadas
- **Backend**: Laravel 11
- **Frontend**: Blade, TailwindCSS
- **Base de Dados**: MySQL
- **Processamento de Pagamentos**: Stripe
- **Notificações**: Flasher, Email
- **Relatórios**: DomPDF

## Instalação e Configuração

### Requisitos
- PHP 8.2 ou superior
- Composer
- Node.js e NPM
- MySQL

### Passos para Instalação

1. Clone o repositório:
```
git clone https://github.com/seu-utilizador/Bikes-By-Fazenda---Website.git
cd Bikes-By-Fazenda---Website
```

2. Instale as dependências do PHP:
```
composer install
```

3. Instale as dependências do JavaScript:
```
npm install
```

4. Copie o ficheiro de ambiente e configure as suas variáveis:
```
cp .env.example .env
```

5. Configure o ficheiro .env com as suas credenciais de base de dados e Stripe

6. Gere a chave da aplicação:
```
php artisan key:generate
```

7. Execute as migrações da base de dados:
```
php artisan migrate
```

8. Compile os assets:
```
npm run dev
```

9. Inicie o servidor:
```
php artisan serve
```

## Estrutura do Projeto

### Modelos Principais
- **User**: Gestão de utilizadores e autenticação
- **Motorcycle**: Cadastro detalhado de motociclos
- **Product**: Produtos e acessórios
- **Cart**: Carrinho de compras
- **Order**: Encomendas e estado de entrega
- **Brand**: Marcas de motociclos
- **Category**: Categorias de produtos

### Controladores Principais
- **HomeController**: Gere as funcionalidades do cliente
- **AdminController**: Gere as funcionalidades administrativas
- **ProfileController**: Gere o perfil do utilizador

## Contribuição

Para contribuir com o projeto, siga os passos abaixo:

1. Faça um fork do projeto
2. Crie uma branch para a sua funcionalidade (`git checkout -b funcionalidade/nova-funcionalidade`)
3. Faça commit das suas alterações (`git commit -m 'Adiciona nova funcionalidade'`)
4. Faça push para a branch (`git push origin funcionalidade/nova-funcionalidade`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a licença MIT - veja o ficheiro LICENSE para mais detalhes.

## Contacto

Bikes By Fazenda - [website@bikesbyfazenda.pt](mailto:website@bikesbyfazenda.pt)

Projeto: [https://github.com/seu-utilizador/Bikes-By-Fazenda---Website](https://github.com/seu-utilizador/Bikes-By-Fazenda---Website)
