<?php
	add_action('add_meta_boxes', function(){
		// PODCAST METABOX HK
		add_meta_box( "podcast_meta", "Url <span style='color:tomato;'>AUDIO</span style='color:tomato;'> podcast", "news_insert_podcast_url", "podcasts", "side", "high" );
		add_meta_box( "podcast_video_meta", "Url <span style='color:tomato;'>VIDEO</span> podcast", "news_insert_video_podcast_url", "podcasts", "side", "high");
	});


	/**
	 *	CALLBACKS
	 */
	//PODCAST METABOX HK
	function news_insert_podcast_url($post){
		$podcast_url = get_post_meta($post->ID, 'podcast_url_meta', true);
		$podcast_dur = get_post_meta($post->ID, 'podcast_dur_meta', true);

		echo '<label for="the_podcast_url">Inserta la url del <strong style="color:tomato;">AUDIO</strong> podcast</label>';
		echo '<input type="text" id="podUrl" name="the_podcast_url" class="widefat" value="'.$podcast_url.'" />';

		echo '<label for="the_podcast_dur">Duración del <strong style="color:tomato;">AUDIO</strong> podcast en segundos <br><em> ej: 430 </em> </label>';
		echo '<input type="number" id="podDur" name="the_podcast_dur" class="widefat" value="'.$podcast_dur.'" min="0" step="1"/>';

	}

	function news_insert_video_podcast_url($post){
		$podcast_video_url = get_post_meta($post->ID, 'podcast_video_url_meta', true);
		$podcast_video_dur = get_post_meta($post->ID, 'podcast_video_dur_meta', true);

		echo '<label for="the_podcast_video_url">Inserta la url del <strong style="color:tomato;">VIDEO</strong> podcast</label>';
		echo '<input type="text" id="podUrl" name="the_podcast_video_url" class="widefat" value="'.$podcast_video_url.'" />';

		echo '<label for="the_podcast_video_dur">Duración del <strong style="color:tomato;">VIDEO</strong> en segundos <br><em> ej: 430 </em> </label>';
		echo '<input type="number" id="podDur" name="the_podcast_video_dur" class="widefat" value="'.$podcast_video_dur.'" min="0" step="1"/>';
	}

	/**
	 * Save metaboxes
	 */
	add_action('save_post', function($post_id){
		if ( ! current_user_can('edit_page', $post_id)) 
			return $post_id;


		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
			return $post_id;
		
		
		if ( wp_is_post_revision($post_id) || wp_is_post_autosave($post_id) ) 
			return $post_id;

		//PODCAST METABOX HK
		if( isset($_POST['the_podcast_url']) ){
			update_post_meta($post_id, 'podcast_url_meta', $_POST['the_podcast_url']);
		}else{
			delete_post_meta($post_id, 'podcast_url_meta');	
		}

		if( isset($_POST['the_podcast_dur']) ){
			update_post_meta($post_id, 'podcast_dur_meta', $_POST['the_podcast_dur']);
		}else{
			delete_post_meta($post_id, 'podcast_dur_meta');	
		}

		//PODCAST VIDEO METABOX
		if( isset($_POST['the_podcast_video_url']) ){
			update_post_meta($post_id, 'podcast_video_url_meta', $_POST['the_podcast_video_url']);
		}else{
			delete_post_meta($post_id, 'podcast_video_url_meta');	
		}

		if( isset($_POST['the_podcast_video_dur']) ){
			update_post_meta($post_id, 'podcast_video_dur_meta', $_POST['the_podcast_video_dur']);
		}else{
			delete_post_meta($post_id, 'podcast_video_dur_meta');	
		}

	});