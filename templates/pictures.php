<div class="container">
<?php //die(var_dump($media)); ?>
 <div class="main row" id="photos">    
    <?php foreach ($media->data as $data): ?> 
      <div class="span4 box">
        <div class="padding">
        <a href="#<?php echo $data->id; ?>" role="button" data-toggle="modal"><img alt="<?php echo $data->user->username; ?> BeatAsthma" class="main-img" src="<?php echo $data->images->standard_resolution->url; ?>"></a>
          <div class="meta-profile">
            <a href="http://instagram.com/<?php echo $data->user->username; ?>"><img alt="<?php echo $data->user->username; ?>" src="<?php echo $data->user->profile_picture; ?>"></a>
            <span class="instameta pull-right">
              <?php echo date('F d, Y', $data->created_time); ?> 
              <?php echo $data->likes->count; ?> <i class="icon-heart"></i> 
              <?php echo $data->comments->count; ?> <i class="icon-comment"></i>
            </span>
          </div>
          </div>
      </div>

        <!-- Modal -->
        <div id="<?php echo $data->id; ?>" class="modal hide fade bigModal" tabindex="-1" role="dialog">
          <div class="modal-body">
                  <div class="modal-img">
                    <a href="<?php echo $data->link; ?>" target="_blank"><img class="modal-main-img" alt="<?php echo $data->user->username; ?> BeatAsthma" src="<?php echo $data->images->standard_resolution->url; ?>"></a>
                    </div>
            <div class="modal-profile">
               <button type="button" class="pull-right" data-dismiss="modal">x</button>
              <a href="http://instagram.com/<?php echo $data->user->username; ?>"><img class="profile-image" alt="<?php echo $data->user->username; ?>" src="<?php echo $data->user->profile_picture; ?>"></a>
              <ul>
            <li class="profile-username"><?php echo $data->user->username; ?></li>
            <li class="profile-created-time"><?php echo date('F d, Y', $data->created_time); ?></li>
              </ul>
              

              <p class="caption"><?php echo $data->caption->text; ?></p>
            <div class="likes">
            <?php if ($data->likes > 0): ?>
              <p class="like-header"><i class="icon-heart"></i> <?php echo $data->likes->count; ?> Likes</p>
              <div>
              <?php foreach ($data->likes->data as $l): ?>
                <a alt="<?php echo $l->username; ?> Liked a Photo" href="http://instagram.com/<?php echo $l->username; ?>" target="_blank"><img class="like-profile-img" alt="<?php echo $l->username; ?>" src="<?php echo $l->profile_picture; ?>"></a>
              <?php endforeach; ?>
              </div>
            <?php else: ?>
            <p class="like-header"><i class="icon-heart"></i> <?php echo $data->likes->count; ?> Likes</p>
                 <p> No one has liked this yet now's your chance! <a href="<?php echo $data->link; ?>" target="_blank">Go Like It</a></p>
            <?php endif; ?>
                </div>
               
      <?php if ($data->comments->count > 0): ?>
     <p class="comments-header"><i class="icon-comment"></i> <?php echo $data->comments->count; ?> Comments </p>
        <?php foreach ($data->comments->data as $c): ?>
        <div class="comments">
              <img alt="<?php echo $c->from->username; ?>" class="" src="<?php echo $c->from->profile_picture; ?>">
              <span class="comment-username"><?php echo $c->from->username; ?></span>
              <span class="pull-right"><?php echo date('F d, Y', $c->created_time); ?></span>  
              <p class="comment-entry"><?php echo $c->text; ?></p>
        </div>
              
            <?php endforeach; ?>
          <p>Leave a comment of your own on <a href="<?php echo $data->link; ?>" target="_blank">Instagram.com</a></p>


        <?php else: ?>
            <p class="comments-header"><i class="icon-comment"></i> <?php echo $data->comments->count; ?> Comments </p>
            <p>Aww Sad face no one left a comment but you can by visiting this page at <a href="<?php echo $data->link; ?>" target="_blank">Instagram.com</a></p>
          
          <?php endif; ?>
              </div>
            </div>
        </div>


     <?php endforeach; ?>
     <span class="photos"></span>
 
   <div class="greedy-btn">
   <div class="btn btn-inverse" id="more" data-maxid="<?php echo $media->pagination->next_max_id; ?>" data-tag="<?php echo $tag; ?>">Load more</div>
</div>