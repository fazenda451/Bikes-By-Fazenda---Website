# Bikes By Fazenda - Website

## Sobre o Projecto

O Bikes By Fazenda é uma plataforma de comércio electrónico especializada em Motas e produtos relacionados, desenvolvida para oferecer uma experiência de compra completa para entusiastas de motos em Portugal. O website permite aos utilizadores navegar por um catálogo detalhado de Motas e produtos, adicionar artigos ao carrinho, efectuar pagamentos seguros e acompanhar as suas encomendas.

## Funcionalidades Principais

### Para Clientes
- **Catálogo de Motas**: Navegação e filtragem por diversas categorias e especificações técnicas
- **Catálogo de Produtos**: Acessórios e peças para Motas
- **Carrinho de Compras**: Adição de produtos e Motas, actualização de quantidades
- **Sistema de Pagamento**: Integração com Stripe para processamento seguro de pagamentos
- **Lista de Desejos**: Guardar produtos favoritos para compra futura
- **Sistema de Pontos**: Programa de fidelização com pontos por compras
- **Perfil de Utilizador**: Gestão de informações pessoais e histórico de encomendas
- **Autenticação**: Registo, início de sessão e verificação de email

### Para Administradores
- **Painel Administrativo**: Visão geral das vendas, utilizadores e produtos
- **Gestão de Produtos**: Adição, edição e remoção de produtos com sistema de avaliações
- **Gestão de Motas**: Registo detalhado com especificações técnicas completas
- **Gestão de Categorias**: Organização de produtos e Motas
- **Gestão de Marcas**: Registo e gestão de marcas
- **Gestão de Encomendas**: Acompanhamento e actualização do estado das encomendas
- **Relatórios e Facturas**: Geração de relatórios e facturas em PDF
- **Sistema de Notificações**: Alertas automáticos por email

## Especificações Técnicas

### Motas
O sistema permite o registo detalhado de Motas com informações técnicas como:
- **Motor**: Tipo, cilindrada, potência, número de cilindros
- **Transmissão**: Sistema de transmissão e embraiagem
- **Sistemas**: Lubrificação, ignição e arranque
- **Suspensão**: Dianteira e traseira com especificações
- **Características**: Dimensões, peso, capacidade do depósito
- **Requisitos**: Tipo de carta de condução necessária
- **Galeria**: Múltiplas fotografias para Motas

### Tecnologias Utilizadas
- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Templates, TailwindCSS, JavaScript
- **Base de Dados**: MySQL
- **Processamento de Pagamentos**: Stripe
- **Notificações**: Flasher (Toastr), Sistema de Email
- **Relatórios**: DomPDF
- **Autenticação**: Laravel Breeze
- **Upload de Ficheiros**: Sistema de gestão de imagens

## Instalação e Configuração

### Requisitos Mínimos
- **PHP**: 8.2 ou superior
- **Composer**: Para gestão de dependências PHP
- **Node.js**: 18+ e NPM
- **MySQL**: 8.0 ou superior
- **Extensões PHP**: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo, GD

### Passos para Instalação

1. **Clonar o repositório:**
```bash
git clone https://github.com/fazenda451/Bikes-By-Fazenda---Website.git
cd Bikes-By-Fazenda---Website
```

2. **Instalar dependências PHP:**
```bash
composer install
```

3. **Instalar dependências JavaScript:**
```bash
npm install
```

4. **Configurar ambiente:**
```bash
cp .env.example .env
```

5. **Configurar o ficheiro .env com as suas credenciais:**
   - Base de dados (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
   - Chaves Stripe (STRIPE_KEY, STRIPE_SECRET)
   - Configurações de email (MAIL_*)

6. **Gerar chave da aplicação:**
```bash
php artisan key:generate
```

7. **Executar migrações:**
```bash
php artisan migrate
```

8. **Compilar assets (opcional):**
```bash
# Para desenvolvimento
npm run dev

# Para produção
npm run build
```
**Nota**: Os assets já estão compilados no repositório para funcionamento imediato.

9. **Iniciar servidor:**
```bash
php artisan serve
```

O website estará disponível em `http://localhost:8000`

### Configuração de Produção

Para ambientes de produção, recomenda-se:
- Configurar um servidor web (Apache/Nginx)
- Usar `npm run build` para assets optimizados
- Configurar SSL/HTTPS
- Configurar backups automáticos da base de dados
- Usar filas para processamento de emails (`php artisan queue:work`)

## Estrutura do Projecto

### Modelos Principais
- **User**: Gestão de utilizadores, autenticação e pontos de fidelização
- **Motorcycle**: Registo detalhado de Motas com especificações técnicas
- **Product**: Produtos, acessórios e sistema de avaliações
- **Cart**: Carrinho de compras com suporte a produtos e Motas
- **Order**: Encomendas, estado de entrega e facturação
- **Wishlist**: Lista de desejos dos utilizadores
- **Brand**: Marcas de Motas e produtos
- **Category**: Categorias hierárquicas de produtos

### Controladores Principais
- **HomeController**: Funcionalidades do frontend (catálogos, carrinho, perfil)
- **AdminController**: Painel administrativo completo
- **ContactController**: Sistema de contactos
- **ProfileController**: Gestão de perfis de utilizador

## Segurança e Boas Práticas

### Ficheiros Excluídos (.gitignore)
Por motivos de segurança e performance, os seguintes ficheiros **não** estão incluídos no repositório:
- **`.env`**: Configurações sensíveis (senhas, chaves API)
- **`vendor/`**: Dependências PHP (geradas com `composer install`)
- **`node_modules/`**: Dependências JavaScript (geradas com `npm install`)
- **Ficheiros de cache e logs**: Gerados automaticamente pelo Laravel
- **Ficheiros de base de dados**: `.frm`, `.ibd` (específicos de cada instalação)

### Medidas de Segurança Implementadas
- ✅ Protecção CSRF em todos os formulários
- ✅ Validação e sanitização de dados de entrada
- ✅ Autenticação segura com hash de senhas
- ✅ Protecção contra injecção SQL (Eloquent ORM)
- ✅ Upload seguro de ficheiros com validação
- ✅ Middleware de autenticação e autorização

## Funcionalidades Especiais

### Sistema de Pontos de Fidelização
- Acumulação de pontos por compras
- Utilização de pontos como desconto
- Histórico detalhado de pontos

### Sistema de Avaliações
- Avaliação de produtos por estrelas
- Comentários de utilizadores
- Cálculo automático de média de avaliações

### Gestão de Encomendas
- Estados personalizados de encomenda
- Notificações automáticas por email
- Geração de facturas em PDF
- Métodos de entrega configuráveis

## Contribuição

Para contribuir com o projecto:

1. Faça um fork do projecto
2. Crie uma branch para a sua funcionalidade:
   ```bash
   git checkout -b funcionalidade/nova-funcionalidade
   ```
3. Faça commit das suas alterações:
   ```bash
   git commit -m 'Adiciona nova funcionalidade'
   ```
4. Faça push para a branch:
   ```bash
   git push origin funcionalidade/nova-funcionalidade
   ```
5. Abra um Pull Request

### Padrões de Código
- Siga as convenções do Laravel
- Use nomes descritivos para variáveis e funções
- Comente código complexo
- Teste as funcionalidades antes de submeter

## Resolução de Problemas

### Problemas Comuns

**Erro de permissões:**
```bash
sudo chown -R www-data:www-data storage/
sudo chmod -R 775 storage/
```

**Erro de chave da aplicação:**
```bash
php artisan key:generate
```

**Assets não carregam:**
```bash
npm run build
php artisan config:clear
```

**Problemas de base de dados:**
```bash
php artisan migrate:fresh
php artisan config:clear
```

## Licença

Este projecto está licenciado sob a licença MIT - consulte o ficheiro LICENSE para mais detalhes.

## Contacto e Suporte

**Bikes By Fazenda**
- 📧 Email: [website@bikesbyfazenda.pt](mailto:website@bikesbyfazenda.pt)
- 🌐 Website: [www.bikesbyfazenda.pt](https://www.bikesbyfazenda.pt)
- 📱 GitHub: [https://github.com/fazenda451/Bikes-By-Fazenda---Website](https://github.com/fazenda451/Bikes-By-Fazenda---Website)

---

### Estatísticas do Projecto
- **32 Migrações** de base de dados
- **296 Imagens** de Motas
- **241 Imagens** de produtos
- **Múltiplos Modelos** com relações complexas
- **Sistema Completo** de e-commerce

