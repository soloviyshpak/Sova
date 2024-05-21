// add to orders
$('.basket__inner-addToOrder').on('click', function (e) {
  e.preventDefault();

  let userId = localStorage.getItem('userId');

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'add-to-order.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText); // Выводим ответ от сервера
      location.reload(); // Обновляем страницу
    }
  };
  xhr.send('userId=' + userId);
});
