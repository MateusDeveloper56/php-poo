<?php 
namespace Mateu\Curso;

abstract class Usuario {
	protected array $livrosEmprestados = [];
	protected string $nome;

	public function __construct(string $nome) {
		$this->nome = $nome;
	}

	abstract function podePegarEmprestado(): bool;

	public function getNome(): string {
		return $this->nome;
	}

	public function adicionarLivroEmprestado(Livro $livro): void {
		if ($this->podePegarEmprestado()) {
			$this->livrosEmprestados[] = $livro;
		}
	}

	public function removerLivroEmprestado(Livro $livro): void {
		$this->livrosEmprestados = array_filter($this->livrosEmprestados, fn($livroExistante) => $livro !== $livroExistante);
	}

	public function listarLivrosEmprestados(): array
	{
		return $this->livrosEmprestados;
	}
}


