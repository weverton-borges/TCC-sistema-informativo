create table usuario(
id          int auto_increment primary key,
nome        varchar(220) not null,
sobrenome   varchar(200) not null,
email       varchar(220) not null,
senha       varchar(50)  not null,
    constraint usuario_email_uindex unique (email)
)
    engine = InnoDB
    charset = latin1;