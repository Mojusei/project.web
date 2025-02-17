<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Word;
	
	class WordController extends Controller
    {
        private array $partsOfSpeech;
        private array $charsRus;
        private string $word;

        public function __construct()
        {
            $this->partsOfSpeech = ['adject', 'nouns', 'verbs'];
            $this->charsRus = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т',
            'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Э', 'Ю', 'Я'];
            
            $this->word = '';
        }

        public function getRandomWord() : string 
        {
            return $this->word;
        }

        public function show()
        {
            // Возвращает готовую форму с значением

            $this->title = 'Случайное слово';
            
            if (!empty($_POST)) {
                $partOfSpeech = $this->validatePartOfSpeech();
                $charRus = $this->validateChar();
                
                $this->word = $this->selectWord($partOfSpeech, $charRus);
            }

            return $this->render('word/show', [
                'word' => $this->word,
            ]);
        }

        private function selectWord($partOfSpeech, $charRus) : string
        {
            // Выбирает слово из подготовенного массива

            $pathFile = $this->createPathFile($partOfSpeech, $charRus);
            $jsonArray = $this->createJsonArray($pathFile);
            $key = $this->createRandomKey(count($jsonArray));

            $word = $jsonArray[$key];

            return $word;
        }

        private function createPathFile($partOfSpeech, $char) : string
        {
            // Формирует путь к файлу принимая на вход значения папки и названия файла

            $pathFile = '.' . DIRECTORY_SEPARATOR . 'project' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'words' . DIRECTORY_SEPARATOR . $partOfSpeech .  DIRECTORY_SEPARATOR . $char . '.json';
            return $pathFile;
        }

        private function createRandomKey($arrayLength) : int
        {
            // Создает случайный ключ для массива русских букв 

            $min = 0;
            $max = $arrayLength - 1;

            $key = rand($min, $max);

            return $key;
        }

        private function createJsonArray($pathFile) : array
        {
            // Создает массив слов из json файла 

            $jsonArray = json_decode(file_get_contents($pathFile));
            return $jsonArray;
        }    

        private function validatePartOfSpeech() : string
        {
            // Возвращает нужную часть речи

            $partOfSpeech = $_POST['pos'] === 'random' ?  $this->partsOfSpeech[rand(0, 2)] : $_POST['pos'];

            return $partOfSpeech;
        }

        private function validateChar() : string 
        {
            // Возвращает нужную букву

            $charRus = $_POST['char'] === 'random' ? $this->charsRus[rand(0, 29)] : $_POST['char']; 
            
            return $charRus;
        }
    }