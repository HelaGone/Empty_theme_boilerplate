<?php
	add_action('add_meta_boxes', function(){
		//VIAJES METABOX HK
		add_meta_box( "viajes_meta", "Información adicional", "news_aditional_info", "viajes", "side", "high" );
		// add_meta_box( "podcast_video_meta", "Url <span style='color:tomato;'>VIDEO</span> podcast", "news_insert_video_podcast_url", "podcasts", "side", "high");
	});


	/**
	 *	CALLBACKS
	 */
	//VIAJES METABOX HK
	function news_aditional_info($post){
		$travel_price_meta = get_post_meta($post->ID, 'travel_price_meta', true);

		echo '<label for="travel_price_meta">Precio</label>';
		echo '<input type="number" min="0" max="100000" id="podUrl" name="travel_price_meta" class="widefat" value="'.$travel_price_meta.'" />';

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


		//VIAJES METABOX HK
		if( isset($_POST['travel_price_meta']) ){
			update_post_meta($post_id, 'travel_price_meta', $_POST['travel_price_meta']);
		}else{
			delete_post_meta($post_id, 'travel_price_meta');	
		}

	});