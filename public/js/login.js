//アコーディオンメニュー
$(function () {
  $('.menu-btn').click(function () {
    $(this).toggleClass('is-open');
    $('.menu').toggleClass('is-open');
  });
})
