(function(){
  $('input[name=view]').change(function() {
    let className = $('input[name=view]:checked').val();
    $("#main-window").attr('class', className);
    $('input[name=view]').parent().removeClass('active');
    $(this).parent().addClass('active');
  });

  $('input[value=cancel]').click(function(){
    $('.views-overlay').toggleClass('active');
  })
  $('.views-mobile').click(function(){
    $('.views-overlay').toggleClass('active');
  })
})();
