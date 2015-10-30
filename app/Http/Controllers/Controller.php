<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

/*


git commit -m 'add model e migration da tabela: tabela (table)'

php artisan make:model Model -m


CREATE TABLE tb_emprestimo (
  cod_emp INTEGER  NOT NULL IDENTITY,
  id_user INTEGER  NOT NULL,
  data_emp DATE  DEFAULT Getdate(),
  data_prevista DATE,
  CONSTRAINT co_pk_cod_emp PRIMARY KEY(cod_emp),
  CONSTRAINT co_fk_cod_cli FOREIGN KEY (id_user) REFERENCES tb_usuario(cod_usuario)
 );


 CREATE TABLE tb_itens_emprestimo (
  id_exemplar INTEGER NOT NULL,
  id_emp INTEGER NOT NULL,
  CONSTRAINT co_fk_id_emp   FOREIGN KEY (id_emp)  REFERENCES tb_emprestimo(cod_emp),
  CONSTRAINT co_fk_id_exemplar FOREIGN KEY (id_exemplar)REFERENCES tb_exemplar(cod_exemplar));


CREATE TABLE tb_devolucao (
  cod_dev INTEGER NOT NULL IDENTITY,
  id_emp  INTEGER NOT NULL,
  multa FLOAT DEFAULT 0,
  data_dev DATE NOT NULL DEFAULT GetDate(),
  CONSTRAINT co_pk_cod_dev PRIMARY KEY(cod_dev),
  CONSTRAINT co_fk_cod_emp FOREIGN KEY(id_emp) REFERENCES tb_emprestimo(cod_emp));



CREATE TABLE tb_itens_devolucao (
	id_dev   INTEGER  NOT NULL,
	id_exemplar INTEGER  NOT NULL,
	CONSTRAINT co_fk_id_dev   FOREIGN KEY (id_dev)   REFERENCES tb_devolucao(cod_dev),
	CONSTRAINT co_fk_id_exemp FOREIGN KEY (id_exemplar) REFERENCES tb_exemplar(cod_exemplar)
 );






 */