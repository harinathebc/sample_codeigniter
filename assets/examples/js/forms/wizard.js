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

  // Example Wizard Form
  // -------------------
  (function() {
    // set up formvalidation
    $('#groupcreation').formValidation({
      framework: 'bootstrap',
      fields: {
        organizationid:  {
				validators: {
					notEmpty: {
						message: 'Organization ID is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Organization ID can only consist of alphanumaric, space and dot'
					}
				}
		    },
			corpname:  {
				validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumaric, space and dot'
					}
				}
		    },
			displayname: {
				validators: {
					notEmpty: {
						message: 'Display Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Display Name can only consist of alphanumaric, space and dot'
					}
				}
		    },
			accountnumber: {
				validators: {
					notEmpty: {
						message: 'Account Number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Account Number can only consist of alphanumaric, space and dot'
					}
				
				}
			},
			language: {
				validators: {
					notEmpty: {
						message: 'Language is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Language can only consist of alphanumaric, space and dot'
					}
				
				}
			},
			description: {
				validators: {
					notEmpty: {
						message: 'Description is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Description wont allow <> [] = % '
					}
				
				}
			},
			notes: {
				validators: {
					notEmpty: {
						message: 'Notes is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'Notes wont allow <> [] = % '
					}
				
				}
			},
			supportemail: {
				validators: {
					notEmpty: {
						message: 'Support Contact Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
			},
			technicalemail: {
				validators: {
					notEmpty: {
						message: 'Technical Contact Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
			},
		
		gender: {
				validators: {
					notEmpty: {
						message: 'Please select a value'
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
    });
	$('#groupstep2').formValidation({
      framework: 'bootstrap',
      fields: {
        email:  {
				validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
			},
			firstname: {
				validators: {
					notEmpty: {
						message: 'First Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'First Name can only consist of alphanumaric, space and dot'
					}
				}
		    },
			lastname: {
				validators: {
					notEmpty: {
						message: 'Last Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Last Name can only consist of alphanumaric, space and dot'
					}
				
				}
			},
			username: {
				validators: {
					notEmpty: {
						message: 'User Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message: 'User Name wont allow <>[]'
					}
				
				}
			},
		password: {
          validators: {
            notEmpty: {
              message: 'The password is required'
            },
            different: {
              field: 'username',
              message: 'The password cannot be the same as username'
            }
          }
        },
		gender: {
				validators: {
					notEmpty: {
						message: 'Please select a value'
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
    });
	$('#spnsership').formValidation({
      framework: 'bootstrap',
      fields: {
        sponsershipyesno:  {
				validators: {
				notEmpty: {
					message: 'Please select a value'
				}
            }
		  },
			sponseramount: {
				validators: {
					notEmpty: {
						message: 'Sponsorship is required'
					},
					regexp: {
					regexp: /^[0-9]+$/,
					message: 'Sponsorship can only consist of digits'
					}
				}
		    },
			activatedate: {
				validators: {
				notEmpty: {
					message: 'Please select a value'
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
    });
	$('#exampleUploadForm').formValidation({
      framework: 'bootstrap',
      fields: {
		  inputUpload: {
				validators: {
				notEmpty: {
					message: 'Please select a value'
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
    });
	$('#groupconformation').formValidation({
      framework: 'bootstrap',
      fields: {
        
		},
      err: {
        clazz: 'text-help'
      },
      row: {
        invalid: 'has-danger'
      }
    });
	
	$("#exampleBillingForm").formValidation({
      framework: 'bootstrap',
      fields: {
        number: {
          validators: {
            notEmpty: {
              message: 'The credit card number is required'
            }
            // creditCard: {
            //   message: 'The credit card number is not valid'
            // }
          }
        },
        cvv: {
          validators: {
            notEmpty: {
              message: 'The CVV number is required'
            }
            // cvv: {
            //   creditCardField: 'number',
            //   message: 'The CVV number is not valid'
            // }
          }
        }
      },
      err: {
        clazz: 'text-help'
      },
      row: {
        invalid: 'has-danger'
      }
    });

    // init the wizard
    var defaults = Plugin.getDefaults("wizard");
    var options = $.extend(true, {}, defaults, {
      buttonsAppendTo: '.panel-body'
    });

    var wizard = $("#exampleWizardForm").wizard(options).data('wizard');

    // setup validator
    // http://formvalidation.io/api/#is-valid
    wizard.get("#corporateinfo").setValidator(function() {
      var fv = $("#groupcreation").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }

	var url = $('#groupcreation').attr('action');
	$.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            async: false,
            data: $('#groupcreation').serialize(),
            success: function( data, textStatus, jQxhr ){
				if(data.error == 0)
				{
					alert('Error in processing');return false; 
				}
				window.location.href = '#exampleWizardForm';
                //alert('Group creatation - Success');
                return true;
            },
            error: function( jqXhr, textStatus, errorThrown ){
                // alert('Error in Group Information');
                  return false;
            }
        });
		return true;
    }); 
	
	
	wizard.get("#newAccount").setValidator(function() {
      var fv = $("#groupstep2").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }
	  if($('#emailcheck').val()==1){
		  return false;
	  }
	  if($('#unamecheck').val()==1){
		  return false;
	  }

	var url = $('#groupstep2').attr('action');
	$.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            async: false,
            data: $('#groupstep2').serialize(),
            success: function( data, textStatus, jQxhr ){
				if(data.error == 0)
				{
					alert('Error in processing');return false; 
				}
				window.location.href = '#exampleWizardForm';
                alert('customer creation - Success');
                return true;
            },
            error: function( jqXhr, textStatus, errorThrown ){
                 alert('Error in customer creation Information');
                  return false;
            }
        });
		return true;
    });
	
	
	wizard.get("#corporateActivation").setValidator(function() {
      var fv = $("#spnsership").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }
	 

	var url = $('#spnsership').attr('action');
	$.ajax({
            url: url,
            dataType: 'json',
            type: 'POST',
            async: false,
            data: $('#spnsership').serialize(),
            success: function( data, textStatus, jQxhr ){
				if(data.error == 0)
				{
					alert('Error in processing');return false; 
				}
				window.location.href = '#exampleWizardForm';
                alert('customer creation - Success');
                return true;
            },
            error: function( jqXhr, textStatus, errorThrown ){
                 alert('Error in customer creation Information');
                  return false;
            }
        });
		return true;
    });
	  wizard.get("#exampleUploadForm").setValidator(function() {
      var fv = $("#uploademp").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }

		return true;
    });
	wizard.get("#Confirmation").setValidator(function() {
      var fv = $("#groupconformation").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }

		return true;
    }); 

    wizard.get("#exampleBilling").setValidator(function() {
      var fv = $("#exampleBillingForm").data('formValidation');
      fv.validate();

      if (!fv.isValid()) {
        return false;
      }

      return true;
    });
  })();

  // Example Wizard Form Container
  // -----------------------------
  // http://formvalidation.io/api/#is-valid-container
  (function() {
    var defaults = Plugin.getDefaults("wizard");
    var options = $.extend(true, {}, defaults, {
      onInit: function() {
        $('#exampleFormContainer').formValidation({
          framework: 'bootstrap',
          fields: {
            username: {
              validators: {
                notEmpty: {
                  message: 'The username is required'
                }
              }
            },
            password: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                }
              }
            },
            number: {
              validators: {
                notEmpty: {
                  message: 'The credit card number is not valid'
                }
              }
            },
            cvv: {
              validators: {
                notEmpty: {
                  message: 'The CVV number is required'
                }
              }
            }
          },
          err: {
            clazz: 'text-help'
          },
          row: {
            invalid: 'has-danger'
          }
        });
      },
      validator: function() {
        var fv = $('#exampleFormContainer').data('formValidation');

        var $this = $(this);

        // Validate the container
        fv.validateContainer($this);

        var isValidStep = fv.isValidContainer($this);
        if (isValidStep === false || isValidStep === null) {
          return false;
        }

        return true;
      },
      onFinish: function() {
        // $('#exampleFormContainer').submit();
      },
      buttonsAppendTo: '.panel-body'
    });

    $("#exampleWizardFormContainer").wizard(options);
  })();

  // Example Wizard Pager
  // --------------------------
  (function() {
    var defaults = Plugin.getDefaults("wizard");

    var options = $.extend(true, {}, defaults, {
      step: '.wizard-pane',
      templates: {
        buttons: function() {
          var options = this.options;
          var html = '<div class="btn-group btn-group-sm">' +
            '<a class="btn btn-default btn-outline" href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' +
            '<a class="btn btn-success btn-outline pull-xs-right" href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' +
            '<a class="btn btn-default btn-outline pull-xs-right" href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' +
            '</div>';
          return html;
        }
      },
      buttonLabels: {
        next: '<i class="icon wb-chevron-right" aria-hidden="true"></i>',
        back: '<i class="icon wb-chevron-left" aria-hidden="true"></i>',
        finish: '<i class="icon wb-check" aria-hidden="true"></i>'
      },

      buttonsAppendTo: '.panel-actions'
    });

    $("#exampleWizardPager").wizard(options);
  })();

  // Example Wizard Progressbar
  // --------------------------
  (function() {
    var defaults = Plugin.getDefaults("wizard");

    var options = $.extend(true, {}, defaults, {
      step: '.wizard-pane',
      onInit: function() {
        this.$progressbar = this.$element.find('.progress-bar').addClass('progress-bar-striped');
      },
      onBeforeShow: function(step) {
        step.$element.tab('show');
      },
      onFinish: function() {
        this.$progressbar.removeClass('progress-bar-striped').addClass('progress-bar-success');
      },
      onAfterChange: function(prev, step) {
        var total = this.length();
        var current = step.index + 1;
        var percent = (current / total) * 100;

        this.$progressbar.css({
          width: percent + '%'
        }).find('.sr-only').text(current + '/' + total);
      },
      buttonsAppendTo: '.panel-body'
    });

    $("#exampleWizardProgressbar").wizard(options);
  })();

  // Example Wizard Tabs
  // -------------------
  (function() {
    var defaults = Plugin.getDefaults("wizard");
    var options = $.extend(true, {}, defaults, {
      step: '> .nav > li > a',
      onBeforeShow: function(step) {
        step.$element.tab('show');
      },
      classes: {
        step: {
          //done: 'color-done',
          error: 'color-error'
        }
      },
      onFinish: function() {
        alert('finish');
      },
      buttonsAppendTo: '.tab-content'
    });

    $("#exampleWizardTabs").wizard(options);
  })();

  // Example Wizard Accordion
  // ------------------------
  (function() {
    var defaults = Plugin.getDefaults("wizard");
    var options = $.extend(true, {}, defaults, {
      step: '.panel-title[data-toggle="collapse"]',
      classes: {
        step: {
          //done: 'color-done',
          error: 'color-error'
        }
      },
      templates: {
        buttons: function() {
          return '<div class="panel-footer">' + defaults.templates.buttons.call(this) + '</div>';
        }
      },
      onBeforeShow: function(step) {
        step.$pane.collapse('show');
      },

      onBeforeHide: function(step) {
        step.$pane.collapse('hide');
      },

      onFinish: function() {
        alert('finish');
      },

      buttonsAppendTo: '.panel-collapse'
    });

    $("#exampleWizardAccordion").wizard(options);
  })();
})(document, window, jQuery);
