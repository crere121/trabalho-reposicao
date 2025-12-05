# trabalho-reposicao
Trabalho de reposição de carga horaria
#  Projeto EEPD-BH: Sistema de Recomposição Escolar em PHP Puro

O Projeto EEPD-BH (Escola Estadual Presidente Dutra - Belo Horizonte) é um sistema web desenvolvido em **PHP Puro** e **MySQL** para a Recomposição de Aprendizagem. Seu objetivo é fornecer uma plataforma informativa e interativa para alunos, professores e comunidade, abordando a história da escola, cursos, notícias (Blog) e funcionalidades de gestão.

---

##  Tecnologias e Ferramentas

| Categoria | Tecnologia | Detalhes |
| :--- | :--- | :--- |
| **Linguagem de Backend** | PHP (Puro) | O desenvolvimento é feito sem o uso de frameworks. |
| **Banco de Dados** | MySQL | Conexão e manipulação de dados. |
| **Frontend** | HTML5, CSS3 | Estrutura e estilização em folhas de estilo dedicadas. |
| **Framework CSS** | Bootstrap | Utilizado para responsividade e design. |
| **Ambiente Local** | XAMPP | Servidor Apache e MySQL. |
| **Versionamento** | Git, GitHub | Controle de versão. |
| **IDE** | Visual Studio Code | Ambiente de desenvolvimento. |

---

## ⚙️ Pré-requisitos

Para executar este projeto, você precisará ter instalado:

* **Servidor Local:** XAMPP, WAMP ou similar (contendo Apache e MySQL).
* **Linguagem:** PHP (versão compatível com o XAMPP).
* **Gerenciador de Banco de Dados:** Acesso ao MySQL.
* **Versionamento:** Git (para clonagem).

---

## Instalação

Siga os passos para configurar o ambiente de desenvolvimento:

1.  **Clonar o Repositório:**
    ```bash
    git clone [URL_DO_REPOSITORIO]
    ```
2.  **Mover para o Diretório do Servidor:**
    * Copie a pasta clonada para o diretório `htdocs` (XAMPP) ou `www` (WAMP).
3.  **Configuração do Banco de Dados:**
    * Crie um banco de dados no phpMyAdmin (Ex: `eepd_bh_db`).
    * Importe o arquivo SQL de estrutura e dados (geralmente encontrado em `docs/schema.sql`).
4.  **Configuração da Conexão:**
    * Edite o arquivo de conexão (Ex: `conexao.php`) e ajuste as credenciais do seu ambiente local (`host`, `user`, `password`, `database`).
5.  **Acessar o Sistema:**
    * Inicie os serviços Apache e MySQL.
    * Acesse o sistema pelo navegador: `http://localhost/nome_da_pasta_do_projeto/index.php`

---

##  Roteiro do Projeto e Páginas (index.php)

O sistema é centrado em um único ponto de entrada (`index.php`) com as seguintes seções principais:

* **Página Inicial (index.php):**
    * **Escola:** História e origem da instituição.
    * **Carrossel:** Rotação de 8 imagens randômicas (implementação em PHP).
* **Cursos:** Exibição dos cursos:
    * Desenvolvimento de Sistemas
    * Informática
    * Logística
    * Fabricação Mecânica
    * Energia Renováveis
    * Segurança do Trabalho
    * Propedêutica
    * Eletrônica
* **Blog:** Área de notícias da escola.
* **Contato:** Formulário para comunicação.
* **Acesso e Gestão:**
    * Login
    * Cadastro
    * Área de Professores
    * Área de Alunos

---

##  Informações Institucionais

As seguintes informações compõem o rodapé padrão de todas as páginas:

> **Escola Presidente Dutra - BH**
> **CNPJ: 18.715.599/0001-05
> **SRE-METROPOLITANA-A**
> **Endereço:** Rua Carlos tomoyose Bairro Horto Florestal - Belo Horizonte/MG CEP: 31.035-536
> Belo Horizonte - Minas Gerais - Brasil

---

##  Direitos Autorais

Desenvolvido pelo time de **Desenvolvimento de Sistemas** da EEPD.

* **@ Todos os direitos reservados à EEPD.**
