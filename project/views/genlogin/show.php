<div class="container">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="text-center display-4 fw-bold lh-1 text-body-emphasis mb-5">Генератор логинов</h1>
        <h2 class="text-center pt-5"><?= $login ?></h2>
      </div>

      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="" method="POST">
          <div class="form-floating mb-5">
            <p class="col-lg-10 fs-4">Длина логина: <span id="rangeValue">9</span> символов</p>
            <input name="length" type="range" class="form-range" min="6" max="12" id="slider" onchange="document.getElementById('rangeValue').innerHTML = this.value;"> 
          </div>

          <div class="form-floating mb-3 ">
            <input name="chars" type="text" class="form-control" id="selectedChars" placeholder="abcd">
            <label for="selectedChars">Выбранные буквы в формате 'abcd'</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Генерация</button>
          <hr class="my-4">
          <small class="text-body-secondary">Оставьте поле пустым, если не выбрали конкретных букв</small>
        </form>
      </div>
    </div>
</div>