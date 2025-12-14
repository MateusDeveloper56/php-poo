<?php 
require_once 'vendor/autoload.php';

use Mateu\Curso\Livro;
use Mateu\Curso\Estante;
use Mateu\Curso\Aluno;
use Mateu\Curso\Professor;
use Mateu\Curso\Visitante;
use Mateu\Curso\Bibliotecario;

$livros = [
	['titulo' => '1984', 'autor' => 'George Orwell'],
	['titulo' => 'O Senhor dos Anéis', 'autor' => 'J.R.R. Tolkien'],
	['titulo' => 'Dom Casmurro', 'autor' => 'Machado de Assis'] 
];

$estante = new Estante();
$livro   = new Livro($livros[0]['titulo'], $livros[0]['autor']);

$livro->marcarComoDisponivel();
$estante->adicionarLivro($livro);

/**
 * Fluxo para testar métodos.
 */


/**
 * Forma correta de tratar as mensagens de erro lançadas pelas exceções.
 */
try {
	// $estante->removerLivro($estante->getLivros()[1]);

	// echo "<pre>";
	// print_r($estante->getLivros());
	// echo "<br><br>";


	// print_r($estante->listarLivrosDisponiveis());

	// print_r($estante->buscarLivroPorTitulo('dom'));

	/**
	 * Classe de serviço com métodos estáticos para gerenciar empréstimos e devoluções.
	 */
	// $bibliotecario = new Bibliotecario();

	$aluno = new Aluno('Mateus');

	Bibliotecario::emprestarLivro($aluno, $livro, $estante);
	echo '<br/>Livro ' . $livro->getTitulo() . ' emprestado para ' . $aluno->getNome() . ' com sucesso!<br/>';
	// $aluno->removerLivroEmprestado($estante->listarLivrosDisponiveis()[1]);

	// var_dump($aluno->podePegarEmprestado());

	print_r($aluno->listarLivrosEmprestados());

	// Bibliotecario::devolverLivro($aluno, $livro, $estante);

	echo '<hr/>';

	$aluno2 = new Aluno('Mateus 2');

	Bibliotecario::devolverLivro($aluno2, $livro, $estante);

	Bibliotecario::emprestarLivro($aluno2, $livro, $estante);
	// $aluno2->removerLivroEmprestado($estante->listarLivrosDisponiveis()[1]);

	// var_dump($aluno2->podePegarEmprestado());

	print_r($aluno2->listarLivrosEmprestados());

	echo '<hr/>';

	$livro2   = new Livro($livros[1]['titulo'], $livros[1]['autor']);

	$livro2->marcarComoDisponivel();
	$estante->adicionarLivro($livro2);

	$professor = new Professor('Kobs');

	Bibliotecario::emprestarLivro($professor, $livro2, $estante);
	// $professor->removerLivroEmprestado($estante->listarLivrosDisponiveis()[0]);

	// var_dump($professor->podePegarEmprestado());

	print_r($professor->listarLivrosEmprestados());


	echo '<hr/>';

	$livro3   = new Livro($livros[2]['titulo'], $livros[2]['autor']);

	$livro3->marcarComoDisponivel();
	$estante->adicionarLivro($livro3);

	$visitante = new Visitante('Sara');

	Bibliotecario::emprestarLivro($visitante, $livro3, $estante);
	// $visitante->removerLivroEmprestado($estante->listarLivrosDisponiveis()[0]);

	// var_dump($visitante->podePegarEmprestado());

	print_r($visitante->listarLivrosEmprestados());


} catch (\Exception $e) {
	echo $e->getMessage();
}



