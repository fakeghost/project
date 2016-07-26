<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
?>  
<div class="container single_container comment">
<button class="icon-reorder btn btn-default"></button>
    <div class="row">
        <h1>Comments</h1>
    <ol class="commentlist">
       <?php 
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
    <li class="decmt-box">
        <p><a href="#addcomment">Please input your password</a></p>
    </li>
    <?php 
        } else if ( !comments_open() ) {
    ?>
    <li class="decmt-box">
        <p><a href="#addcomment">comment's function has been shut down</a></p>
    </li>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
    <li class="decmt-box">
        <button class="btn btn-success"><a href="#addcomment">No Comments,Please say something</a></button>
    </li>
    <?php 
        } else {
            wp_list_comments('type=comment&callback=aurelius_comment');
        }
    ?>
    </ol>
    <!– Comment Form –>
<?php 
if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
<p>You must<a href="<?php echo wp_login_url( get_permalink() ); ?>">Login in</a> then you can comment it.</p>
<?php else  : ?>
<!-- Comment Form -->
<form class="form-horizontal" id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <h1>Please leave your message</h1>
        <?php if ( !is_user_logged_in() ) : ?>
                <div class="form-group">
                <label class="col-md-4 control-label" for="author">Name</label>
                <div class="col-md-5">
                    <input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4" for="email">Email</label>
                <div class="col-md-5">
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4" for="email">Address</label>
                <div class="col-md-5">
                    <input class="form-control" cl type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
                </div>
            </div>
        <?php else : ?>
        <div class="form-group">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
            <?php echo $user_identity; ?></a>. 
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 &raquo;</a>
        </div>
        <?php endif; ?>
            <div class="form-group">
                <label class="col-md-4 control-label" for="message">Content</label>
                <div class="col-md-5">
                    <textarea class="form-control" id="message comment" name="comment" tabindex="4" rows="5" cols="40"></textarea>
            </div>
        </div>
            <div class="form-group">
            <!-- Add Comment Button -->
                <button class="btn btn-danger">
                    <a href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="button medium black right">submit</a>
                </button>
            </div>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>

    </div>
</div>

