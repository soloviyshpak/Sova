$('.add__title').on('click', function (e) {
  e.preventDefault();

  let input = $(
    `<input class="add__title-input" type="text" name="name" required>`
  );
  $(this).replaceWith(input);
});

$('.add__price').on('click', function (e) {
  e.preventDefault();

  let input = $(
    `<input class="add__price-input" type="text" name="price" required>`
  );
  $(this).replaceWith(input);
});

$('.add__specs-link').on('click', function (e) {
  e.preventDefault();

  if ($(this).hasClass('add__specs-link--material')) {
    let input = $(
      `<input class="add__specs-input" type="text" name="material" required>`
    );
    $(this).replaceWith(input);
  }
  if ($(this).hasClass('add__specs-link--weight')) {
    let input = $(
      `<input class="add__specs-input" type="text" name="weight" required>`
    );
    $(this).replaceWith(input);
  }
  if ($(this).hasClass('add__specs-link--inserts')) {
    let input = $(
      `<input class="add__specs-input" type="text" name="inserts" required>`
    );
    $(this).replaceWith(input);
  }
  if ($(this).hasClass('add__specs-link--gender')) {
    let input = $(`<select class="add__specs-input" name="gender" required>
                      <option value="Для мужчин">Для мужчин</option>
                      <option value="Для женщин">Для женщин</option>
                    </select>`);
    $(this).replaceWith(input);
  }
  if ($(this).hasClass('add__specs-link--brand')) {
    let input = $(
      `<input class="add__specs-input" type="text" name="brand" required>`
    );
    $(this).replaceWith(input);
  }
});
