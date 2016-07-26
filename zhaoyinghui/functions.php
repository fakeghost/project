<?php
/** widgets */
if( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'First_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Second_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Third_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Fourth_sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}


function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <div class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div class="gravatar">
    		<img src="<?php bloginfo('template_url'); ?>/images/watchdog.jpg" alt="">
    		<div class="comment_text">
                <?php if($comment->comment_approved == '0'){ 
					echo "<em>你的评论正在审核，稍后会显示出来！</em><br />";
				}
				else{
					printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link());
					comment_text();
				}
                ?>
    		</div>
    		<button class="btn btn-primary">
    			<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    		</button> 
 			<div class="clearfix">
                <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
					<?php edit_comment_link('修改'); ?>
            </div> 
 		</div>
<!--         <div class="comment_content" id="comment-<?php comment_ID(); ?>">   
        </div> -->
<?php }


function get_ssl_avatar($avatar) {
   $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
   return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');
?>

