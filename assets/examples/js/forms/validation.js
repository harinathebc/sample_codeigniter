/*!
 * MyBenefitslab (http://getbootstrapadmin.com/MyBenefitslab)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
(function(document, window, $) {
  'use strict';

  var Site = window.Site;

  $(document).ready(function($) {
    Site.run();
  });

  
  (function() {
    $('.summary-errors').hide();

    $('#registerForm').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#validateButton4',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
		 FullName: {
          validators: {
            notEmpty: {
              message: 'The FullName is required and cannot be empty'
            }
          }
        },
         Email: {
          validators: {
            notEmpty: {
              message: 'The E-mail is required'
            },
            emailAddress: {
              message: 'The Email address is not valid'
            }
          }
        },
		 passwordreg: {
          validators: {
            notEmpty: {
              message: 'The Password is required and cannot be empty'
            }
          }
        },
		cpassword: {
          validators: {
            notEmpty: {
              message: 'The confirm password is required and cannot be empty'
            }
          }
        },
	 },
	  
      err: {
        clazz: 'text-help'
      },
      row: {
        invalid: 'has-danger'
      }
    })

    .on('success.form.fv', function(e) {
      // Reset the message element when the form is valid
      $('.summary-errors').html('');
    })

    .on('err.field.fv', function(e, data) {
      // data.fv     --> The FormValidation instance
      // data.field  --> The field name
      // data.element --> The field element
      $('.summary-errors').show();

      // Get the messages of field
      var messages = data.fv.getMessages(data.element);

      // Remove the field messages if they're already available
      $('.summary-errors').find('li[data-field="' + data.field + '"]').remove();

      // Loop over the messages
      for (var i in messages) {
        // Create new 'li' element to show the message
        $('<li/>')
          .attr('data-field', data.field)
          .wrapInner(
            $('<a/>')
            .attr('href', 'javascript: void(0);')
            // .addClass('alert alert-danger alert-dismissible')
            .html(messages[i])
            .on('click', function(e) {
              // Focus on the invalid field
              data.element.focus();
            })
          ).appendTo('.summary-errors > ul');
      }

      // Hide the default message
      // $field.data('fv.messages') returns the default element containing the messages
      data.element
        .data('fv.messages')
        .find('.text-help[data-fv-for="' + data.field + '"]')
        .hide();
    })

    .on('success.field.fv', function(e, data) {
      // Remove the field messages
      $('.summary-errors > ul').find('li[data-field="' + data.field + '"]').remove();
      if ($('#register').data('formValidation').isValid()) {
        $('.summary-errors').hide();
      }
    });
  })();
  (function() {
    $('.summary-errors').hide();

    $('#userlogin').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#validateButton4',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
         email: {
          validators: {
            notEmpty: {
              message: 'The E-mail is required'
            }
          }
        },
		 password: {
          validators: {
            notEmpty: {
              message: 'The Password is required and cannot be empty'
            }
          }
        },
	 },
	  
      err: {
        clazz: 'text-help'
      },
      row: {
        invalid: 'has-danger'
      }
    })

    .on('success.form.fv', function(e) {
      // Reset the message element when the form is valid
      $('.summary-errors').html('');
    })

    .on('err.field.fv', function(e, data) {
      // data.fv     --> The FormValidation instance
      // data.field  --> The field name
      // data.element --> The field element
      $('.summary-errors').show();

      // Get the messages of field
      var messages = data.fv.getMessages(data.element);

      // Remove the field messages if they're already available
      $('.summary-errors').find('li[data-field="' + data.field + '"]').remove();

      // Loop over the messages
      for (var i in messages) {
        // Create new 'li' element to show the message
        $('<li/>')
          .attr('data-field', data.field)
          .wrapInner(
            $('<a/>')
            .attr('href', 'javascript: void(0);')
            // .addClass('alert alert-danger alert-dismissible')
            .html(messages[i])
            .on('click', function(e) {
              // Focus on the invalid field
              data.element.focus();
            })
          ).appendTo('.summary-errors > ul');
      }

      // Hide the default message
      // $field.data('fv.messages') returns the default element containing the messages
      data.element
        .data('fv.messages')
        .find('.text-help[data-fv-for="' + data.field + '"]')
        .hide();
    })

    .on('success.field.fv', function(e, data) {
      // Remove the field messages
      $('.summary-errors > ul').find('li[data-field="' + data.field + '"]').remove();
      if ($('#userlogin').data('formValidation').isValid()) {
        $('.summary-errors').hide();
      }
    });
  })();

  // Example Validataion Summary Mode
  // -------------------------------
 
})(document, window, jQuery);
