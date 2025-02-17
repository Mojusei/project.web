<div class="container">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Случайное слово</h1>
        <p class="col-lg-10 fs-4"></p>
      </div>
      
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST">
          <div class="mb-3">
            <select class="form-select">
              <option selected>Выберите часть речи</option>
              <option value="nouns">Существительное</option>
              <option value="verbs">Прилагательное</option>
              <option value="adject">Глагол</option>
              <option value="random">Любая</option>
            </select>
          </div>

          <div class="mb-3">
            <select class="form-select">
              <option selected>Выберите букву</option>
              <option value="random">Любая</option>
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
            </select>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Генерация</button>
          <hr class="my-4">
          <small class="text-body-secondary">Слово появится снизу заголовка</small>
        </form>
      </div>
    </div>
</div>