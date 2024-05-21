$(document).ready(function () {
  $('.basket__inner-del').on('click', function (e) {
    e.preventDefault();

    let itemId = Number($(this).attr('name'));
    let userId = localStorage.getItem('userId');
    let size = $(this).attr('size');

    $.ajax({
      type: 'POST',
      url: 'del-from-cart.php', // Файл для обработки запроса удаления
      data: { itemId: itemId, userId: userId, size: size },
      success: function (response) {
        location.reload();
      },
      error: function () {
        alert('Произошла ошибка при удалении товара из корзины.');
      },
    });
  });
});
