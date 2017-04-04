var socket = io.connect('http://103.7.43.233:9999');
  $(document).ready(function() {
    socket.on('chat_example',function(obj){
      console.log(obj);
      var userlogin = $('#usserlogin').val();
      if(obj.uid == userlogin && !$('#'+obj.uid).length ){
        register_popup(obj.meid,obj.name);
      }
      $('#chatonline').find('#'+obj.meid).find('.mCSB_container').append('<div class="message new"><figure class="avatar"><img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80_4.jpg" /></figure>' + obj.umsg + '</div>');
      //$('#chatonline').find('#'+obj.meid).find('.mCSB_container').append('<div class="message">'+  obj.umsg +'</div>');

    });
    socket.on('access',function(msg){
      console.log(msg)
    });
});
  function emit_notification(obj){
    if(socket){
      socket.emit('chat_example',obj);
    }else{
      console.log('Kết nối socket thất bại !');
    }
  }


var $messages = $('.messages-content'),
    d, h, m, i = 0;

function loadscroll(id) {

   $('#'+id).find('.messages-content').mCustomScrollbar("scrollTo", "bottom");
    setTimeout(function() {
        //fakeMessage();
    }, 100);
}

function updateScrollbar(id) {
    $('#'+id).find('.messages-content').mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
    });
}

function setDate() {
    d = new Date()
    if (m != d.getMinutes()) {
        m = d.getMinutes();
        $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
    }
}
function register_popup(id, name) {
        for (var iii = 0; iii < popups.length; iii++) {
            //already registered. Bring it to front.
            if (id == popups[iii]) {
                Array.remove(popups, iii);
                popups.push(id);
                calculate_popups();

                return;
            }
        }

        var element = '<div class="chat" data-name="'+name+'" data-iduser="' + id + '" id="' + id + '" >' + '<div class="chat-title">' + '<div class="name">' + '<h1>' + name + '</h1>' + '</div>' + '<div class="close_chat"><a href="javascript:close_popup(\'' + id + '\');">&#10005;</a></div>' + '</div>' + '<div class="messages">' + '<div class="messages-content"></div>' + '</div>' + '<div class="message-box" >' + '<textarea type="text" class="message-input "  placeholder="Type message..."></textarea>' + '</div>' + '</div>';
        $("#chatonline")[0].innerHTML = $("#chatonline")[0].innerHTML + element;

        popups.push(id);
        calculate_popups();
        //ssfakeMessage();
  
          $('#'+id).find('.messages-content').mCustomScrollbar();
          loadscroll(id);

        $('.chat-title .name h1 ').click(function() {
            //$('.messages').toggle();
            //$("#"+id).toggle();
            //$('.messages').fadeToggle(300, 'swing');
        });
    }
    $(document).on('keydown','.message-input', function(e) {
    if (e.which == 13) {
        var id = $(this).parents(".chat").attr("data-iduser");
      //var name=$(this).parents(".chat").attr("data-name");
      var name=$("#fullnamelogin").val();

        insertMessage(id,name);
      
        return false;
    }
});
    jQuery(document).ready(function($) {
      $(document).on('click','.message-input',function(){
        $('.message-input').removeClass('message-input-active');
        $(this).addClass('message-input-active');
      });
    });
function insertMessage(id,name) {
   // alert(id);
    msg = $('.message-input-active').val();
    if ($.trim(msg) == '') {
        return false;
    }
   
    var sends = {meid:$('#usserlogin').val(),uid:id, umsg:msg,name:name};
   // $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
   emit_notification(sends);
 
    $('<div class="message message-personal">' + msg + '</div>').appendTo($('#'+id).find('.mCSB_container')).addClass('new');

    setDate();
    $('#'+id).find('.message-input').val(null);
    updateScrollbar(id);
    setTimeout(function() {
        //fakeMessage();
    }, 1000 + (Math.random() * 20) * 100);
}

//var Fake = ['Hi there, I\'m Fabio and you?', 'Nice to meet you', 'How are you?', 'Not too bad, thanks', 'What do you do?', 'That\'s awesome', 'Codepen is a nice place to stay', 'I think you\'re a nice person', 'Why do you think that?', 'Can you explain?', 'Anyway I\'ve gotta go now', 'It was a pleasure chat with you', 'Time to make a new codepen', 'Bye', ':)']

// function fakeMessage() {
//         if ($('.message-input').val() != '') {
//             return false;
//         }
//         $('<div class="message loading new"><figure class="avatar"><img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80_4.jpg" /></figure><span></span></div>').appendTo($('.mCSB_container'));
//         updateScrollbar();
//         setTimeout(function() {
//             $('.message.loading').remove();
//             $('<div class="message new"><figure class="avatar"><img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/156381/profile/profile-80_4.jpg" /></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
//             setDate();
//             updateScrollbar();
//             i++;
//         }, 1000 + (Math.random() * 20) * 100);
//     }
    // this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};
//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;
//arrays of popups ids
var popups = [];
//this is used to close a popup
function close_popup(id) {
        for (var iii = 0; iii < popups.length; iii++) {
            if (id == popups[iii]) {
                Array.remove(popups, iii);
                //document.getElementById(id).style.display = "none";
                document.getElementById(id).remove()
                display_popups();
                calculate_popups();
                return;
            }
        }
    }
    //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups() {
        var right = -110;
        var iii = 0;
        for (iii; iii < total_popups; iii++) {
            if (popups[iii] != undefined) {
                var element = document.getElementById(popups[iii]);
                element.style.right = right + "px";
                right = right + 270;
                //element.style.display = "block";
            }
        }
        for (var jjj = iii; jjj < popups.length; jjj++) {
            var element = document.getElementById(popups[jjj]);
            element.style.display = "none";
        }
    }
    //creates markup for a new popup. Adds the id to popups array.

    //calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups() {
        var width = window.innerWidth;
        if (width < 540) {
            total_popups = 0;
        } else {
            width = width - 200;
            //320 is width of a single popup box
            total_popups = parseInt(width / 320);
        }
        display_popups();
    }
    //recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);