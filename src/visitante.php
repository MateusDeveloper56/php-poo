<?php 
namespace Mateu\Curso;

class Visitante extends Usuario {
	public function podePegarEmprestado(): bool {
		return false;
	}
}


