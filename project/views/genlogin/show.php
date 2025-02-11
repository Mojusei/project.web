<div class="container">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Генератор логинов</h1>
        <p class="col-lg-10 fs-4"></p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" >
          <div class="form-floating mb-3">
            <p class="col-lg-10 fs-4">Длина логина: <span id="rangeValue">9</span> символов</p>
            <input type="range" class="form-range" min="6" max="12" id="slider" onchange="document.getElementById('rangeValue').innerHTML = this.value;">
            
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password (пока что)</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Генерация</button>
          <hr class="my-4">
          <small class="text-body-secondary">Логин появится снизу заголовка</small>
        </form>
      </div>
    </div>
</div>