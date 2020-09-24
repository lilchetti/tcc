Create DATABASE tcc;

Use tcc;

Create table funcionarios(
id_fun Int auto_increment primary key,
nome_fun varchar(50) not null,
data_contratacao varchar(10) not null,
nascimento_fun varchar(10) not null,
cargo varchar(25) not null,
salario varchar(10) not null,
cpf_fun varchar(20) not null,
rg_fun varchar(20) not null,
telefone varchar(15) not null,
email_fun Varchar (50) not null, 
senha_fun Varchar (32) not null
);
SELECT * FROM funcionarios;
#drop table funcionarios;

Create table usuario(
Id Int auto_increment primary key,
nome Varchar (50) Not Null, 
cpf Varchar (20) Not Null, 
rg Varchar (20) Not Null,
nascimento varchar(10) Not Null,
sexo char(1) Not Null,
email Varchar (50) Not Null, 
senha Varchar (32) Not Null,
token char(32)
);
SELECT * FROM usuario;
#drop table usuario;

Create table endereco(
Id Int auto_increment primary key,
telefone varchar(15)not null,
cep Varchar(15) Not Null, 
endereco Varchar (50) Not Null, 
bairro Varchar (50) Not Null, 
cidade Varchar (50) Not Null, 
estado Varchar (50) Not Null,
numero varchar(6)not null
);
SELECT * FROM endereco;
#drop table endereco;

Create table triagem(
Id Int auto_increment primary key,
rg Varchar(20) Not Null, 
dataTriagem varchar(10)not null,
peso Varchar(8) Not Null, 
altura Varchar (8) Not Null, 
imc Varchar (50) Not Null, 
TSanguineo char (3) Not Null,
#medicacao Varchar (100) Not Null,
#doenca varchar(100) not null,
img blob
);

SELECT * FROM triagem;
#drop table triagem;

Create table exames(
Id Int auto_increment primary key,
rg Varchar (20) Not Null,
sangue boolean,
urina boolean,
fezes boolean,
pelvico boolean,
transvaginal boolean,
abdominal boolean,
tireoide boolean,
mamas boolean,
ecocardiograma boolean,
joelho boolean,
bacia boolean,
renal boolean,
coluna boolean,
funcional boolean,
angiografia boolean,
cardiaca boolean,
outros varchar(50)
);
SELECT * FROM exames WHERE;
#drop table exames;

Create table perfil(
Id Int auto_increment primary key,
rg Varchar(20) Not Null, 
codigo varchar(10),
data varchar(20),
img longblob
);
SELECT * FROM perfil;
drop table perfil;

#DELETE FROM cadastro WHERE id = 1;

UPDATE perfil # seleciona a tabela
SET codigo = 1 # novo valor
WHERE Id = 1; # velho valor
