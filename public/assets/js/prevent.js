(function(){
    $('.form-disabled-button').on('submit', function() {
        $('.spinner-prevent').show();
        $('.disabled-button-prevent').hide();
        setTimeout(function() {
            $('.disabled-button-prevent').show();
            $('.spinner-prevent').hide();
      }, 5000);
    })
})(); 