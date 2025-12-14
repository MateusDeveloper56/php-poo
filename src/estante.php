<?php 
namespace Mateu\Curso;

class Estante {
	private array $livros;

	/**
	 * @method Adiciona um livro à estante
	 * @param Livro $livro Instância do livro a ser adicionado
	 * @return void
	 */
	public function adicionarLivro(Livro $livro): void {
		$this->livros[] = $livro;
	}

	/**
	 * @method Remove um livro da estante
	 * @param Livro $livro Instância do livro a ser removido
	 * @return void
	 */
	public function removerLivro(Livro $livro): void {
		$this->livros = array_filter($this->livros, fn($livroExistente) => $livroExistente !== $livro);
	}

	/**
	 * @method Verifica se o livro está na estante
	 * @param Livro $livro Instância do livro a ser verificado
	 * @return bool Retorna true se o livro estiver na estante, false caso contrário
	 */
	public function verificarLivro(Livro $livro): bool {
		return in_array($livro, $this->listarLivrosDisponiveis());
	}

	/**
	 * @method Busca um livro pelo título
	 * @param string $titulo Título do livro a ser buscado
	 * @return Livro|null Retorna a instância do livro ou null se não encontrado
	 */
	public function buscarLivroPorTitulo(string $titulo): ?Livro {
		foreach ($this->livros as $livro) {
			/**
			 * Busca parcial pelo título do livro na estante.
			 */
			if($this->str_contains_legacy(trim(strtolower($livro->getTitulo())), trim(strtolower($titulo)))) {
				return $livro;
			}
		}

		return null;
	}

	/**
	 * Busca parcial por um texto dentro de uma string. Compatível com PHP 7.x
	 */
	private function str_contains_legacy($haystack, $needle) {
		return $needle !== '' && strpos($haystack, $needle) !== false;
	}

	/**
	 * @method Lista todos os livros disponíveis na estante
	 * @return array
	 */
	public function listarLivrosDisponiveis(): array {
		return array_filter($this->livros, fn($livro) => $livro->estaDisponivel()? $livro: null);
	}

	/**
	 * @method Retorna todos os livros na estante
	 * @return array
	 */
	public function getLivros(): array {
		return $this->livros;
	}
}


