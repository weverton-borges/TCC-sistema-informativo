create table noticia(
    idnoticia  int auto_increment primary key,
    titulo     varchar(500)         not null,
    subtitulo  varchar(1000)        null,
    nomeImagem varchar(45)          not null,
    conteudo   varchar(10000)       not null,
    isdestaque tinyint(1) default 1 null,
    isnoticiaA tinyint(1) default 0 null,
    isnoticiaB tinyint(1) default 0 null
)
    engine = InnoDB
    charset = latin1;