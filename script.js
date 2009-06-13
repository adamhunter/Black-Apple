jQuery(function($){
  var open_widget = function(el) {
		$(el).parent('h3').toggleClass('rounded')
    $(el).parent('h3').next().slideDown('dev')
    $(el).toggleClass('closed');
  }
  
  var close_widget = function(el) {
    $(el).parent('h3').next().slideUp('dev', function(){ $(el).parent('h3').toggleClass('rounded'); });
    $(el).toggleClass('closed');
  }

  var widget_action = function(){ 
    if ($(this).attr('class') == 'closed') {
      open_widget(this, 'ul')
    } else {
      close_widget(this, 'ul')
    }
	}

  $('.widget-title span').click(widget_action); 

	/* re-round tags */
	$('.widget_tag_cloud a').each(function(i){
		var size = $(this).css('font-size').replace('pt', '')
		var css_size = Math.round(size - (size / 5))
		$(this).css('-webkit-border-radius', css_size);
		$(this).css('-moz-border-radius', css_size);
	  $(this).css('-khtml-border-radius', css_size);
	  $(this).css('border-radius', css_size);
	})

	/* comments */
	var setup_commentor = function() {
		var name    = 'Name';
		var name_e  = $('#author');
		var email   = 'Email';
		var email_e = $('#email');
		var url     = 'Website';
		var url_e   = $('#url');
		var search  = 'search';
		var search_e= $('#nav input[name="q"]');
		
		textbox_value(name, name_e);
		textbox_value(email, email_e);
		textbox_value(url, url_e);
		textbox_value(search, search_e)
		
		name_e.focus(function() {
			textbox_value(name, name_e)
		})
		email_e.focus(function() {
			textbox_value(email, email_e)
		})
		url_e.focus(function(){
			textbox_value(url, url_e)
		})
		search_e.focus(function(){
			textbox_value(search, search_e)
		})
		name_e.blur(function() {
			textbox_value(name, name_e)
		})
		email_e.blur(function() {
			textbox_value(email, email_e)
		})
		url_e.blur(function(){
			textbox_value(url, url_e)
		})
		search_e.blur(function(){
			textbox_value(search, search_e)
		})
	}
	
	var textbox_value = function(val, el) {
		if (el.val() == '') {
			el.val(val);
			el.addClass('dim');
		} else if (el.val() == val) {
			el.val('');
			el.removeClass('dim');
		}
	}
	
	/* adds the browser name and js to the homepage */
  if($.browser.mozilla) {
      $("html").addClass("js mozilla");
  } else if($.browser.safari) {
      $("html").addClass("js safari");
  } else if($.browser.msie) {
      $("html").addClass("js msie");
  } else {
      $("html").addClass("js");
  }
	
	$('input[type="search"]').attr('results', 0)
	
	/* boot js */
	setup_commentor();
});
