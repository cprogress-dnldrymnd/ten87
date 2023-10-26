jQuery(document).ready(function () {
  if (window.innerWidth > 992) {

    var listitem = document.getElementsByClassName('list-item');
    for (var i = 0; i < listitem.length; i++) {
      var list_index = listitem[i];
      $offset = list_index.offsetTop;
      list_index.style.cssText = 'top: ' + $offset + 'px; --offset: -' + $offset + 'px';
    }
    var listparent = document.querySelectorAll('.list-item-content > ul');

    listparent.forEach(function (item, index) {
      var listitem = listparent[index].children
      for (var i = 0; i < listitem.length; i++) {
        var list_index = listitem[i];
        $offset = list_index.offsetTop;
        list_index.style.cssText = '--offset: -' + $offset + 'px; --transition-delay: ' + (i * 50) + 'ms; --transition-delay-hover: ' + ((listitem.length * 50) + (i * 50)) + 'ms';
      }
    });

    var listparent = document.querySelectorAll('.list-item-content > ul > li > ul');
    listparent.forEach(function (item, index) {
      var listitem = listparent[index].children
      for (var i = 0; i < listitem.length; i++) {
        var list_index = listitem[i];
        $offset = list_index.offsetTop;
        list_index.style.cssText = '--transition-delay: ' + (i * 50) + 'ms; --transition-delay-hover: ' + ((listitem.length * 50) + (i * 50)) + 'ms';
      }
    });
  }

  if (window.innerWidth > 992) {
    jQuery('.list-item-box').each(function (index, element) {
      $height = jQuery(this).outerHeight();
      jQuery(this).css('height', $height + 'px');
      jQuery(this).addClass('fixed-positioning');
    });
  } else {
    jQuery('.list-item-content').each(function (index, element) {
      $height = jQuery(this).outerHeight();
      jQuery(this).parent().css('--height', $height + 'px');
    });

    jQuery('.list-item-title').click(function (e) { 
      jQuery('.list-item-content').parent().removeClass('active');
      jQuery(this).parent().toggleClass('active');
    });

    jQuery('.list-item-content').parent().addClass('height-zero');

  }
});