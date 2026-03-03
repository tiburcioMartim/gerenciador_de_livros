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










--------------------------------------------------------------------------
--------------------------------[ Querys ]--------------------------------
--------------------------------------------------------------------------

-- Registrar livros     [C] IMPLEMENTADO
-- insert into registrar_livro (nome, ano_publicação, genero) values (?, ?, ?)

-- Pesquisar livros     [R] IMPLEMENTADO
-- select * from registrar_livro order by id desc;

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









------------------------------------------------------------------------------------------------------
--------------------------------[ Querys para Base de dados | Livros ]--------------------------------
------------------------------------------------------------------------------------------------------
INSERT INTO registrar_livro (nome, ano_publicação, genero) VALUES
('Dom Casmurro', 1899, 'Romance'),
('O Pequeno Príncipe', 1943, 'Fábula'),
('1984', 1949, 'Distopia'),
('A Revolução dos Bichos', 1945, 'Satira'),
('O Hobbit', 1937, 'Fantasia'),
('Harry Potter e a Pedra Filosofal', 1997, 'Fantasia'),
('Senhor dos Aneis', 1954, 'Fantasia'),
('O Codigo Da Vinci', 2003, 'Suspense'),
('Crepusculo', 2005, 'Romance'),
('Jogos Vorazes', 2008, 'Distopia'),

('It - A Coisa', 1986, 'Terror'),
('Dracula', 1897, 'Terror'),
('Frankenstein', 1818, 'Terror'),
('A Culpa é das Estrelas', 2012, 'Romance'),
('Extraordinario', 2012, 'Drama'),
('O Alquimista', 1988, 'Ficcao'),
('Capitaes da Areia', 1937, 'Drama'),
('Memorias Postumas de Bras Cubas', 1881, 'Romance'),
('A Cabana', 2007, 'Drama'),
('O Diario de Anne Frank', 1947, 'Biografia'),

('Percy Jackson', 2005, 'Fantasia'),
('Maze Runner', 2009, 'Distopia'),
('Duna', 1965, 'Ficcao Cientifica'),
('O Iluminado', 1977, 'Terror'),
('Sherlock Holmes', 1892, 'Misterio'),
('A Menina que Roubava Livros', 2005, 'Drama'),
('As Cronicas de Narnia', 1950, 'Fantasia'),
('O Senhor das Moscas', 1954, 'Drama'),
('Orgulho e Preconceito', 1813, 'Romance'),
('A Metamorfose', 1915, 'Ficcao'),

('O Poder do Habito', 2012, 'Autoajuda'),
('Pai Rico Pai Pobre', 1997, 'Financas'),
('Mindset', 2006, 'Desenvolvimento Pessoal'),
('O Milagre da Manha', 2012, 'Autoajuda'),
('Sapiens', 2011, 'Historia'),
('A Arte da Guerra', 500, 'Estrategia'),
('O Nome do Vento', 2007, 'Fantasia'),
('A Garota no Trem', 2015, 'Suspense'),
('O Codigo Limpo', 2008, 'Tecnologia'),
('Use a Cabeca Java', 2003, 'Tecnologia'),

('Introducao ao MySQL', 2015, 'Tecnologia'),
('PHP para Iniciantes', 2018, 'Tecnologia'),
('Banco de Dados Avancado', 2020, 'Tecnologia'),
('Aprendendo JavaScript', 2019, 'Tecnologia'),
('Estruturas de Dados', 2017, 'Tecnologia'),
('Algoritmos Descomplicados', 2016, 'Tecnologia'),
('Redes de Computadores', 2014, 'Tecnologia'),
('Engenharia de Software', 2013, 'Tecnologia'),
('Inteligencia Artificial', 2021, 'Tecnologia'),
('Cyberseguranca Moderna', 2022, 'Tecnologia');