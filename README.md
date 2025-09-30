# 🍳 MyAI Recipes - Gerador de Receitas com IA

Este projeto é uma aplicação web completa desenvolvida como trabalho de curso, que consiste em um back-end robusto em Laravel e um front-end reativo e minimalista. A aplicação permite ao usuário gerenciar uma lista de ingredientes e utilizar a inteligência artificial da Hugging Face para gerar receitas criativas com base nos itens selecionados.

## ✨ Funcionalidades
- **CRUD Completo de Ingredientes**: Crie, Leia, Atualize e Delete ingredientes de forma fácil e rápida.
- **Integração com IA**: Conexão direta com a API da Hugging Face para geração de texto.
- **Gerador de Receitas**: Selecione os ingredientes que você tem em casa e a IA criará uma receita detalhada para você.
- **Interface Moderna**: Front-end simples, bonito e reativo construído com Vue.js e Tailwind CSS.
- **Modo Escuro**: Alterne entre os temas claro e escuro para uma melhor experiência visual.
- **Edição em Modal**: Edite ingredientes de forma intuitiva sem sair da página.
- **Simplicidade**: O front-end é um único arquivo index.html, sem necessidade de npm ou processos de build.

## 🛠️ Tecnologias Utilizadas

### Back-end
- **Framework**: Laravel 12
- **Comunicação com API**: Cliente HTTP do Laravel
- **Serviço de IA**: Hugging Face (API de Chat Completions)
- **Modelo de IA**: meta-llama/Meta-Llama-3-8B-Instruct (ou outro compatível)

### Front-end
- **Estrutura**: HTML5
- **Estilo**: Tailwind CSS (via CDN)
- **Reatividade e Lógica**: Vue.js 3 (via CDN)
- **Requisições HTTP**: Axios (via CDN)
- **Fontes**: Google Fonts (Inter)

## 🚀 Configuração e Instalação

Siga os passos abaixo para rodar o projeto em sua máquina local.

### Pré-requisitos
- PHP >= 8.2
- Composer
- Um banco de dados (ex: MySQL, MariaDB)

### 1. Configurando o Back-end (Laravel)

```bash
# 1. Clone este repositório (ou use a sua pasta de projeto)
git clone https://github.com/naicolas-br/api-receitas.git
cd seu-repositorio

# 2. Instale as dependências do PHP
composer install

# 3. Crie o arquivo de ambiente
cp .env.example .env

# 4. Gere a chave da aplicação
php artisan key:generate

# 5. Configure o arquivo .env com suas credenciais:
#    - Conexão com o banco de dados (DB_HOST, DB_PORT, DB_DATABASE, etc.)
#    - Sua chave de API da Hugging Face:
HUGGINGFACE_API_KEY=hf_sua_chave_aqui

# 6. Execute as migrações para criar as tabelas no banco de dados
php artisan migrate

# 7. Inicie o servidor do Laravel
php artisan serve
```

O back-end estará rodando em `http://127.0.0.1:8000`.

### 2. Configurando o Front-end
O front-end foi projetado para ser o mais simples possível.

**Configurar CORS**: No projeto Laravel, certifique-se de que o arquivo `config/cors.php` existe e que a configuração `allowed_origins` permite o acesso. Para desenvolvimento local, a forma mais fácil é:

```php
// Em config/cors.php
'allowed_origins' => ['*'],
```

Se o arquivo não existir, siga os passos que fizemos para criá-lo manualmente.

**Abrir o Front-end**:
Simplesmente abra o arquivo `index.html` em qualquer navegador moderno (Chrome, Firefox, Edge). Não é necessário nenhum servidor ou instalação.

## 📖 Como Usar
1. **Adicione Ingredientes**: Na seção "Meus Ingredientes", digite o nome e a descrição de um alimento e clique em "Adicionar".
2. **Gerencie a Lista**: Você pode editar ou excluir ingredientes a qualquer momento.
3. **Selecione para a Receita**: Na seção "Gerador de Receitas", marque os checkboxes dos ingredientes que você deseja usar.
4. **Gere a Receita**: Clique no botão "Gerar Receita Agora!". O sistema enviará os ingredientes para a IA e exibirá a receita sugerida logo abaixo.
5. **Alterne o Tema**: Use o botão de sol/lua no topo da página para alternar entre os modos claro e escuro.
