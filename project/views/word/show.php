<div class="container">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-center mb-3">Случайное слово на русском языке</h1>
        <h2 class="text-center pt-5"><?= $word ?></h2>
      </div>

      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="" method="POST">
          <div class="mb-3">
            <h3>Выберите часть речи</h3>
            <select class="form-select" name="pos">
                <option selected value="random">Любая</option>
                <option value="nouns">Существительное</option>
                <option value="verbs">Глагол</option>
                <option value="adject">Прилагательное</option>
            </select>
          </div>

          <div class="mb-3">
            <h3>Выберите первую букву слова</h3>
            <select class="form-select" name="char">
                <option selected value="random">Любая</option>
                <option value="А">А</option>
                <option value="Б">Б</option>
                <option value="В">В</option>
                <option value="Г">Г</option>
                <option value="Д">Д</option>
                <option value="Е">Е</option>
                <option value="Ё">Ё</option>
                <option value="Ж">Ж</option>
                <option value="З">З</option>
                <option value="И">И</option>
                <option value="Й">Й</option>
                <option value="К">К</option>
                <option value="Л">Л</option>
                <option value="М">М</option>
                <option value="Н">Н</option>
                <option value="О">О</option>
                <option value="П">П</option>
                <option value="Р">Р</option>
                <option value="С">С</option>
                <option value="Т">Т</option>
                <option value="У">У</option>
                <option value="Ф">Ф</option>
                <option value="Х">Х</option>
                <option value="Ц">Ц</option>
                <option value="Ч">Ч</option>
                <option value="Ш">Ш</option>
                <option value="Щ">Щ</option>
                <option value="Э">Э</option>
                <option value="Ю">Ю</option>
                <option value="Я">Я</option>
            </select>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Генерация</button>
          <hr class="my-4">
          <small class="text-body-secondary">Слово появится снизу заголовка</small>
        </form>
      </div>
    </div>
</div>