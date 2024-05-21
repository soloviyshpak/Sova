$(document).ready(function () {
  $('.admin__orders-controls_btn--accept').on('click', function (e) {
    e.preventDefault();

    let itemId = Number($(this).attr('name'));

    $.ajax({
      type: 'POST',
      url: 'accept_order.php', // Файл для обработки запроса удаления
      data: { itemId: itemId },
      success: function (response) {
        location.reload();
      },
      error: function () {
        alert('Произошла ошибка при удалении товара из базы.');
      },
    });
  });
});

// del from orders
$(document).ready(function () {
  $('.admin__orders-controls_btn--dismiss').on('click', function (e) {
    e.preventDefault();

    let itemId = Number($(this).attr('name'));

    $.ajax({
      type: 'POST',
      url: 'del_order.php', // Файл для обработки запроса удаления
      data: { itemId: itemId },
      success: function (response) {
        location.reload();
      },
      error: function () {
        alert('Произошла ошибка при удалении товара из базы.');
      },
    });
  });
});
