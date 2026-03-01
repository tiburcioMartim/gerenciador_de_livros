CREATE TABLE usuarios (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	cpf CHAR(11) NOT NULL,
	nome VARCHAR(200) NOT NULL,
	sexo ENUM('M','F') NOT NULL,
	nascimento DATE NOT NULL,
	telefone VARCHAR(20) NOT NULL,
	email VARCHAR(150) NOT NULL,
	
	PRIMARY KEY (id),
	UNIQUE (cpf),
	UNIQUE (email)
);

create table registrar_livro (
    id int auto_increment not null,
    nome varchar(200) not null,
    ano_publicação date not null,
    genero enum(
        'fantasia',
        'comedia',
        'drama',
        'infantil',
        'romance',
        'aventura',
        'ficcao',
        'luta',
        'terror'
    ),

    primary key (id)
);











----------------------- Querys

-- Registrar livros     [C]
insert into registrar_livro (nome, ano_publicação, genero) values (?, ?, ?)

-- Pesquisar livros     [R]
select * from registrar_livro order by id desc;

-- Atualizar livro      [U]
update registrar_livro set nome = 'nome novo' where id = 1;
update registrar_livro set ano_publicao = 'ano_publicao novo' where id = 1;
update registrar_livro set genero = 'genero novo' where id = 1;

-- Deletar livro        [D]
delete from registrar_livro where id = 1;

-- Cadastrar usuário    [C]
INSERT INTO usuarios (cpf, nome, sexo, nascimento, telefone, email) VALUES 
('11376554746', 'Martim Tiburcio de Medeiros Júnior', 'M', '1992-12-02', '021988860136', 'tiburcio.contato@gmail.com');

-- Alterar dados do usuário     [U]
update usuarios set nome = 'João Carlos de Almeida' where id = 1;

-- Deletar conta do usuário     [D]
delete from usuarios where id = 1;