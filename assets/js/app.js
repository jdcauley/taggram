$(document).ready(function() {
      var $this = this;

      $('#more').click(function() {
        var tag   = $(this).data('tag');
        var maxid = $(this).data('maxid');
        var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];

        $.ajax({
          type: 'GET',
          url: 'ajax.php',
          data: {
            tag: tag,
            max_id: maxid
          },
          dataType: 'json',
          cache: false,
          success: function(data) {
            // Output data
            $.each(data.dt, function(i, Val) {

              var date = new Date(parseInt(Val.created_time) * 1000);
              var postedDate = months[date.getMonth()]+' '+date.getDate()+', '+date.getFullYear()+' '+date.getHours()+':'+date.getMinutes();

//likes proccess
                $this.likesHTML = " ";
                if(Val.likes.count==0)
                    $this.likesHTML += ' ';
                else{
                    for(var j = 0; j < Val.likes.data.length; j++){

                        $this.likesHTML += '<a alt="'+Val.likes.data[j].username+' Liked a Photo" href="http://instagram.com/'+Val.likes.data[j].username+'" target="_blank"><img class="like-profile-img" alt="'+Val.likes.data[j].username+'" src="'+Val.likes.data[j].profile_picture+'"></a>';
                    }
                }


//Comments process  
                $this.commentsHTML = " ";
                if(Val.comments.count==0)
                    $this.commentsHTML += ' ';
                else{

                    for(var j = 0; j < Val.comments.data.length; j++){
                        var commentDate = new Date(parseInt(Val.comments.data[j].created_time) * 1000);
                        var commentPostedDate = months[commentDate.getMonth()]+' '+commentDate.getDate()+', '+commentDate.getFullYear()+' '+commentDate.getHours()+':'+commentDate.getMinutes();

                        $this.commentsHTML += '<img alt="'+Val.comments.data[j].from.username+'" class="" src="'+Val.comments.data[j].from.profile_picture+'">'+
                              '<span class="comment-username">'+Val.comments.data[j].from.username+'</span>'+
                              '<span class="pull-right">'+commentPostedDate+'</span>'+  
                              '<p class="comment-entry">'+Val.comments.data[j].text+'</p>'
                    }

                }



              $('.photos').append('<div class="span4 box">'+
                                            '<div class="padding">'+
                                                '<a href="#'+ Val.id +'" role="button" data-toggle="modal">'+
                                                    '<img src="' + Val.images.standard_resolution.url + '">'+
                                                '</a>'+
                                                '<div class="meta-profile">'+
                                                    '<a href="http://instagram.com/' + Val.user.username +'">'+
                                                        '<img alt="' + Val.user.username +'" src="' + Val.user.profile_picture +'">'+
                                                    '</a>'+
                                                    '<span class="instameta pull-right">' +postedDate+ ' ' + Val.likes.count + ' <i class="icon-heart"></i> ' + Val.comments.count + ' <i class="icon-comment"></i></span>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div id="'+ Val.id +'" class="modal hide fade bigModal" tabindex="-1" role="dialog">'+
                                            '<div class="modal-body">'+
                                                '<div class="modal-img">'+
                                                    '<a href="#" target="_blank">'+
                                                        '<img class="modal-main-img" alt="' + Val.user.username + ' BeatAsthma" src="' + Val.images.standard_resolution.url + '">'+
                                                    '</a>'+
                                                '</div>'+
                                                '<div class="modal-profile">'+
                                                    '<button type="button" class="pull-right" data-dismiss="modal">x</button>'+
                                                    '<a href="http://instagram.com/' + Val.user.username +'">'+
                                                        '<img class="profile-image" alt="' + Val.user.username +'" src="' + Val.user.profile_picture +'">'+
                                                    '</a>'+
                                                    '<ul>'+
                                                        '<li class="profile-username">' + Val.user.username +'</li>'+
                                                        '<li class="profile-created-time">' +postedDate+ '</li>'+
                                                    '</ul>'+
                                                    '<p class="caption">' + Val.caption.text +'</p>'+
                                                    '<div class="likes">'+
                                                        '<p class="like-header"><i class="icon-heart"></i> ' + Val.likes.count + ' Likes</p>'+
                                                        '<div>'+$this.likesHTML+'</div>'+
                                                    '</div>'+
                                                    '<p class="comments-header"><i class="icon-comment"></i> '+Val.comments.count+'  Comments </p>'+
                                                    '<div class="comments">'+$this.commentsHTML+'<div>'+
                                                    '<p>Aww Sad face no one left a comment but you can by visiting this page at <a href="'+Val.link+'" target="_blank">Instagram.com</a></p>'+
                                                '</div>'+
                                            '</div>'); 
            });

            // Store new maxid
            $('#more').data('maxid', data.next_id);
          }
        });
      });
    });