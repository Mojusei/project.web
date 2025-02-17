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
            'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'];
            
            $this->word = $this->selectRandomWord();
        }

        public function getRandomWord() : string 
        {
            return $this->word;
        }

        public function show()
        {
            $this->title = 'Случаное слово';
            
            $randomPOS = $this->partsOfSpeech[rand(0, 2)];
            $randomChar = $this->charsRus[rand(0, 32)];

            if (!empty($_POST)) {
                $partOfSpeech = isset($_POST['pos']) ?  $this->translatePartOfSpeech($_POST['smth']) : $randomPOS;
                $charRus = isset($_POST['char']) ? $_POST['char'] : $randomChar;

                $this->word = $this->selectRandomWord($partOfSpeech, $charRus);
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



        private function selectRandomWord() : string 
        {
            // Эт тестовая
            $pathFile = $this->createPathFile($this->partsOfSpeech[rand(0, 2)], $this->charsRus[rand(0, 32)]);
            $jsonArray = $this->createJsonArray($pathFile);
            $key = $this->createRandomKey(count($jsonArray));

            $word = $jsonArray[$key];

            return $word;
        }

        private function createPathFile($partOfSpeech, $char) : string
        {
            // Формирует путь к файлу принимая на вход значения папки и названия файла

            $pathFile = '..' . DIRECTORY_SEPARATOR . 'project' . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'words' . DIRECTORY_SEPARATOR . $partOfSpeech .  DIRECTORY_SEPARATOR . $char . '.json';
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

        private function translatePartOfSpeech($partOfSpeech) : string 
        {
            // Потом напишу 
            
            if ($partOfSpeech === 'прилагательное') {
                return 'adject';
            }
            else if ($partOfSpeech === 'существительное') {
                return 'nouns';
            }
            else if ($partOfSpeech === 'глагол') {
                return 'verbs';
            }
            else {
                return '';
            }
        }
    }