    function showDesktopNotification(n_title, n_message, n_url) {
      /*var s_message = message.replace(/<(?:.|\n)*?>/gm, '').replace(/&amp;/g, "&").replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&quot;/g, '"');
      if (s_message != '') {
        if(window.Notification && !window_focus && c_desktop_notify == 1) {
          var time = new Date().getTime();
          var notification = new window.Notification(lang[144] + renderHTMLString(uc_name[id]), { icon: uc_avatar[id], body: s_message, tag: message_id });
          notification.ondisplay = function(event) {setTimeout(function() { event.currentTarget.cancel(); }, 5000);};
        }
      }*/
      var notificationEvents = ['onclick', 'onshow', 'onerror', 'onclose'];

      var title;
      var options;

      //event.preventDefault();

      title = n_title;
      options = {
        body: n_message,
        tag: 'new',
        icon: 'http://localhost/onurfingertips/images/logo.jpg'
      };

      Notification.requestPermission(function() {
        var notification = new Notification(title, options);
          notification.onclick = function(){
            window.focus();
            window.open(n_url,'').focus()
            this.close();
        };

      });

    }