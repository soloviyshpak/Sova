$(document).ready(function () {
  $('.favourites__list-del_link').on('click', function (e) {
    e.preventDefault();

    let itemId = Number($(this).attr('name'));
    let userId = localStorage.getItem('userId');

    $.ajax({
      type: 'POST',
      url: 'del-from-fav.php', // Файл для обработки запроса удаления
      data: { itemId: itemId, userId: userId },
      success: function (response) {
        location.reload();
      },
      error: function () {
        alert('Произошла ошибка при удалении товара из избранного.');
      },
    });
  });
});
