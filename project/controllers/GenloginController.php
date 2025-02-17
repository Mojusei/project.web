<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Genlogin;
	
	class GenloginController extends Controller
	{
		private string $login;
		private array $chars;
		private int $loginLength;

		public function __construct()
		{
			$this->login = '';
			$this->chars = array_merge(range('a', 'z'), range('A', 'Z'));
			$this->loginLength = $this->validateLoginLength();
		}


		public function show()
		{
			// Устанавливает заголовок, рендерит блок с формой и передает туда готовый логин

			$this->title = 'Генератор логинов';
			
			if (!empty($_POST)) {
				$this->login = $this->createLogin($this->createCharsArray());
			}

            return $this->render('genlogin/show', [
				'login' => $this->login
			]);
		}


		private function createLogin($data) : string
		{
			// Делает строку из готового массива
			shuffle($data);
        	$login = implode($data);

        	return $login;
		}

		private function createCharsArray() : array
		{
			// Создает массив букв в случайном порядке
			// Если количество полученных букв меньше чем длина логина, то перемашивает полученные буквы с буквами из chars
			// В противном случае использует только массив полученных из формы букв

			$selectedChars = $this->validateSelectedChars();
			
			$countSelectedChars = count($selectedChars);

			if ($countSelectedChars < $this->loginLength and $countSelectedChars > 0) {
				$selectedCharsPart = $this->randomCharsArray($selectedChars, $countSelectedChars);
				$restCharsPart = $this->randomCharsArray($this->chars, ($this->loginLength - $countSelectedChars));

				return array_merge($selectedCharsPart, $restCharsPart);
			}
			else {
				$restCharsPart = $this->randomCharsArray($this->chars, ($this->loginLength - $countSelectedChars));

				return $restCharsPart;
			}
		}

		private function randomCharsArray($data, $length) : array
		{
			return array_rand(array_flip($data), $length);
		}

		private function validateSelectedChars() : array
		{
			// Проверяет буквы из формы, создает из них массив или возвращает пустой

			if (isset($_POST['chars'])) {
				$pattern = '#[a-zA-Z]#';
				preg_match_all($pattern, $_POST['chars'], $matches);
				
				return $matches[0];
			}
			else {
				return [];
			}
		}


		private function validateLoginLength() : int
		{
			// Проверяет, что получено число и возвращает его, в противном случае устанавливает значение минимальной длины логина

			if(!empty($_POST['length']) and is_numeric($_POST['length'])) {
				return ((int) $_POST['length']);
			}
			else {
				return 6;
			}
		}

		
	}