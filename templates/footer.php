
 <footer>
  <div class="container">
    <div class="row">
      <div class="span6">
      </div>
      <div class="span6">
        <div class="footer-right pull-right">
        </div>
      </div>
    </div>
  </div>
 </footer>
 
 <script type="text/template" id="gram-template">
    <div class="span4 box">
      <div class="padding">
        <a href="#<%= myData.id %>" role="button" data-toggle="modal">
          <img alt="<%= myData.user.username %> BeatAsthma" class="main-img" src="<%= myData.images.standard_resolution.url %>">
        </a>
        <div class="meta-profile">
          <a href="http://instagram.com/<%= myData.user.username %>">
            <img alt="<%= myData.user.username %>" src="<%= myData.user.profile_picture %>">
          </a>
          <span class="instameta pull-right">
            <% Date(myData.created_time).toString() %> 
            <%= myData.likes.count %> <i class="icon-heart"></i> 
            <%= myData.comments.count %> <i class="icon-comment"></i>
          </span>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="<%= myData.id %>" class="modal hide fade bigModal" tabindex="-1" role="dialog">
      <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
      <div class="modal-body">
        <div class="modal-img">
          <a href="<%= myData.link %>" target="_blank">
            <img class="modal-main-img" alt="<%= myData.user.username %> BeatAsthma" src="<%= myData.images.standard_resolution.url %>">
          </a>
        </div>
        <div class="modal-profile">
          <a href="http://instagram.com/<%= myData.user.username %>">
            <img class="profile-image" alt="<%= myData.user.username %>" src="<%= myData.user.profile_picture %>">
          </a>
          <ul>
            <li class="profile-username"><%= myData.user.username %></li>
            <li class="profile-created-time"><% Date(myData.created_time).toString() %></li>
          </ul>

          <p class="caption"><% if(myData.caption){%><%= myData.caption.text %><%} else {%>No caption...<%}%></p>
          
          
            <div class="likes">
            <% if (myData.likes.count > 0) { %>
              <p class="like-header"><i class="icon-heart"></i> <%= myData.likes.count %> Likes</p>
              <div>
              <% _.each(myData.likes.data, function( i, like ) { %>
                <a alt="<%= i.username %> Liked a Photo" href="http://instagram.com/<%= i.username %>" target="_blank"><img class="like-profile-img" alt="<%= i.username %>" src="<%= i.profile_picture %>"></a>
              <% })%>
              </div>
            <% } else { %>
                  No one has liked this yet now is your chance! <a href="<%= myData.link %>" target="_blank">Go Like It</a>
            <% } %>
            </div>
            
            <div class="comments">
            <% if(myData.comments.count > 0) { %>
              <p class="comments-header"><i class="icon-comment"></i> <%= myData.comments.count %> Comments </p>
              <% _.each(myData.comments.data, function(comment) {  %>
                <div>
                  <img alt="<%= comment.from.username %>" class="" src="<%= comment.from.profile_picture %>">
                  <span class="comment-username"><%= comment.from.username %></span>
                  <span class="pull-right"><% Date(comment.created_time).toString() %></span>  
                  <p class="comment-entry"><%= comment.text %></p>
                </div>
              <% }) %>
            <% } else { %>
              <p>Aww Sad face.
                 no one left a comment but you can by visiting this page at 
                 <a href="<%= myData.link %>" target="_blank">Instagram.com</a></p>
            <% }  %>
            </div><!-- end div.comments -->
          </div><!-- end div.modal-profile -->
        </div><!-- end div.modal-image -->
      </div><!-- end div.modal-body -->
  </script>
</body>
</html>