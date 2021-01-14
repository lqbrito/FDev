# FDev - Fast Development in PHP and Laravel

Este aplicativo é um criador de código CRUD para PHP e Laravel para melhorar a produtividade dos desenvolvedores PHP. Em sua primeira versão, ele acessa apenas bancos de 
dados MySql via PDO, o que pode ser alterado por qualquer desenvolvedor para acessar outros SGBDs. O FDev funciona da seguinte forma:

1) Página Projetos

Esta página permite que você crie e exclua todos os projetos que esteja trabalhando ou venha a trabalhar, sem limite de quantidades de projetos. Basta selecionar e abrir o projeto 
você deseja trabalhar no momento e em seguida acessar sequencialmente cada uma das opções de menu do FDev.

2) Página Conexão

Uma vez selecionado o projeto você deseja trabalhar, esta página permite conectar o FDev ao banco de dados Mysql que você criou para esse projeto. A conexão é feita via PDO, o que 
permite a adaptação do FDev para conectar com outros SGBDs.

3) Página Layouts

Uma vez conectado ao banco de dados do seu projeto, esta página permite realizar o upload dos seus scripts de layout para que o FDev os leia e gere os scripts PHP/Laravel de CRUD das 
tabelas do banco de dados para você. Os scripts de layout devem conter tags tais como mostrado no canto inferior direito desta página. As tags representam as namespaces, os 
controllers, as models e os arquivos de visão do projeto que você está trabalhando. Caso tenha dúvidas em como montar os seus scripts de layout, abra o projeto "Template-Php" que 
acompanha o FDev e você verá que ele possui alguns scripts de layout de exemplo. Abra esses scripts no seu editor de código preferido e gaste um tempo estudando a utilização das tags. Importante ressaltar: Os seus scripts de layout devem conter os mesmos nomes que os scripts de exemplo (scripts de Controller e Model começam com maiúscula), pois o FDev utiliza esses nomes na hora de gerar os códigos fontes pra você.

4) Página Namespaces

Uma vez que você tenha feito upload dos seus scripts de layout, crie as namespaces para o seu projeto. Caso você não tenha o hábito de trabalhar com namespaces, crie pelo menos uma 
namespace para que o FDev organize os códigos fonte que serão gerados. O FDev só criará os códigos fonte se houver pelo menos uma namespace para ele poder trabalhar. Observe que esta
página permite a você criar e excluir namespaces à vontade. Agora você deve selecionar as tabelas que serão associadas a cada namespace para que o FDev gere os CRUDs correspondentes a cada uma das tabelas dentro da namespace correta. Se você trabalhar com apenas uma namespace, selecione todas as tabelas que você quer gerar código de CRUD e associe a essa namespace.

5) Página Scripts

Uma vez que você criou pelo menos uma namespace e associou as tabelas que você deseja criar o código fonte, chegamos ao ponto onde tudo acontece. Selecione a opção PHP ou Laravel para que o FDev saiba qual tipo de código fonte você deseja gerar e mande criar seus scripts de código. O FDev fará uma varredura no banco de dados pegando as tabelas que você associou a cada namespace e irá criar os scripts de controller, model e view, cada um contendo o mesmo código do seu respectivo script de layout, substituindo as tags dos scripts de layout pelos nomes das tabelas e seus respectivos campos no código gerado.

6) Página Ferramentas

Esta página cria o código fonte do arquivo de rotas do Laravel web.php contendo as rotas de crud para cada scritp Laravel gerado pelo FDev. Assim você pode copiar esse código (ou parte dele) e colar no arquivo web.php que acompanha o projeto que você está trabalhando no Laravel sem a necessidade de criar manualmente cada uma dessas rotas. 
