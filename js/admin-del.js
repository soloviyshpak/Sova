$(document).ready(function () {
  $('.admin__goods-del_link').on('click', function (e) {
    e.preventDefault();

    let itemId = Number($(this).attr('name'));

    $.ajax({
      type: 'POST',
      url: 'del_good.php', // Файл для обработки запроса удаления
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
