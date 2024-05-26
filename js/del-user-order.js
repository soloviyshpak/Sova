$(document).ready(function () {
  $('.orders-controls_dismiss').click(function (e) {
    e.preventDefault();
    var orderId = $(this).data('id');

    $.ajax({
      type: 'POST',
      url: 'del-user-order.php', // Файл, который будет удалять заказ из базы данных
      data: { id: orderId },
      success: function (response) {
        location.reload();
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });
});
