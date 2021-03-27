#Instalar o Wampserver
> C:\wamp64
#Instalar o MySql Workbench
> Instação padrão
#Descompactar a pasta 'portalNoticias.zip'
> Caminho                                                  
> C:\wamp64\www\
#Abrir o projeto no sublime
> Instalar o nodeJs windows
> Abrir o cmd (prompt de comando) dentro da pasta C:\wamp64\www\portal-de-noticias
> Executar o seguinte comando:
> npm install    
#Inicia o Wampserver
> Apenas executar
#Acessar wampserver no navegador (brownser)
>http://localhost/porta-de-noticias

#Criar o banco de dados
> Via workbench ou phpmyadmin (http://localhost/phpmyadmin/index.php) \
> Caso seja via phpmyAdmin ir na aba SQL \
> CREATE DATABASE snt;

#Cria tabela 'Usuario'
 > Abrir a pasta C:\wamp64\www\portal-de-noticias\scriptsSql
 > Copiar o conteudo do aquirvo criar_tabela_usuario.sql e executar.
#Criar tabela 'Notitica'
 > Abrir a pasta C:\wamp64\www\portal-de-noticias\scriptsSql
 > Copiar o conteudo do aquirvo criar_tabela_noticia.sql e executar.
#Criar primeiro Usuario
> Abrir a pasta C:\wamp64\www\portal-de-noticias\scriptsSql
> Copiar o conteudo do aquirvo insert_usuario.sql e executar.
> Seguir orientações contidas no arquivo. 
#Iniciar Sistema
> http://localhost/portal-de-noticias/