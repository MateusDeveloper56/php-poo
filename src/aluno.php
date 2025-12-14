<?php 
namespace Mateu\Curso;

class Aluno extends Usuario {
	private const MAX_LIVROS_EMPRESTADOS = 1;

	public function podePegarEmprestado(): bool {
		return count($this->livrosEmprestados) < self::MAX_LIVROS_EMPRESTADOS;
	}
}


