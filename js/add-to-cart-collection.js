// add to basket
$('.addToCart').on('click', function () {
  let goodsId = $(this).attr('name'); // Получите ID товара из URL страницы товара
  let userId = localStorage.getItem('userId'); // Получите ID пользователя из сессии или cookies

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'add-to-cart.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText); // Выводим ответ от сервера
    }
  };
  xhr.send('goodsId=' + goodsId + '&userId=' + userId);
});
