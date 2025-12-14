<?php 
namespace Mateu\Curso;

class Bibliotecario {
	/**
	 * O livro tem que estar disponível
	 * O usuário tem que poder pegar mais livros emprestados
	 * O livro tem que estár na estante
	 */
	public static function emprestarLivro(Usuario $usuario, Livro $livro, Estante $estante): bool {
		if(!$livro->estaDisponivel()) {
			throw new \Exception("<br/>O livro '{$livro->getTitulo()}' não está disponível para empréstimo.<br/>");
			return false;
		}

		if(!$usuario->podePegarEmprestado()) {
			throw new \Exception("<br/>O usuário {$usuario->getNome()} não pode pegar livros emprestados ou já atingiu o limite de empréstimos.<br/>");
			return false;
		}

		if(!in_array($livro, $estante->listarLivrosDisponiveis())) {
			throw new \Exception("<br/>O livro '{$livro->getTitulo()}' não está na estante.<br/>");
			return false;
		}

		$usuario->adicionarLivroEmprestado($livro);
		$livro->marcarComoEmprestado();
		$estante->removerLivro($livro);

		return true;
	}

	/**
	 * O livro tem que estar emprestado para o usuário
	 * O livro tem que ser colocado de volta na estante
	 * O livro tem que passar a estar disponível
	 */
	public static function devolverLivro(Usuario $usuario, Livro $livro, Estante $estante): bool {
		if($livro->estaDisponivel()) {
			throw new \Exception("<br/>O livro '{$livro->getTitulo()}' não está emprestado.<br/>");
			return false;
		}

		if($estante->verificarLivro($livro)) {
			throw new \Exception("<br/>O livro '{$livro->getTitulo()}' já está na estante.<br/>");
			return false;
		}

		if(in_array($livro, $usuario->listarLivrosEmprestados()) === false) {
			throw new \Exception("<br/>O livro '{$livro->getTitulo()}' não está emprestado para o usuário {$usuario->getNome()}.<br/>");
			return false;
		}

		$usuario->removerLivroEmprestado($livro);
		$estante->adicionarLivro($livro);
		$livro->marcarComoDisponivel();

		return true;
	}
}


