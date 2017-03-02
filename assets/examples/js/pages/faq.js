/*!
 * MyBenefitslab (http://getbootstrapadmin.com/MyBenefitslab)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
  'use strict';

  $(document).ready(function() {
    Site.run();

    if ($('.faq-list').length) {
      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $(e.target).addClass('active').siblings().removeClass('active');
      });
    }
  });
})(document, window, jQuery);
