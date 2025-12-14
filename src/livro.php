<?php 
namespace Mateu\Curso;

/**
 * @method Classe Livro para gerenciar livros em uma biblioteca
 * @author Mateus R. - <contato@mateusdev.com>
 * @package Mateu\Curso
 * @version 1.0
 */
class Livro {
	/**
	* Atributos
	*/
	private string $titulo;
	private string $autor;
	private bool $disponivel = false;

	public function __construct(string $titulo, string $autor)
	{
		$this->titulo 	  = $titulo;
		$this->autor 	  = $autor;
	}

	/**
	* @method Verifica se o livro está disponível
	* @return bool
	*/
	public function estaDisponivel(): bool {
		return $this->disponivel;
	}

	/**
	 * @method Marca o livro como emprestado
	 */
	public function marcarComoEmprestado() {
		$this->disponivel = false;
	}

	/**
	 * @method Marca o livro como disponível
	 */
	public function marcarComoDisponivel() {
		$this->disponivel = true;
	}

	/**
	 * Getters
	 * 
	 * @method Retorna o título do livro
	 * @return string
	 */
	public function getTitulo(): string {
		return $this->titulo;
	}

	/**
	 * @method Retorna o autor do livro
	 * @return string
	 */
	public function getAutor(): string {
		return $this->autor;
	}
}


