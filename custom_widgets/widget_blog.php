<?php 

namespace Elementor;

class Widget_blog extends Widget_Base {

    // Get widget name.
	public function get_name() { 
        return 'widget-blog'; 
    }	

    //  Get widget title.
	public function get_title() { 
        return 'Blog recopila';
    }	

    // Get widget icon.
	public function get_icon() {
        return 'fa fa-columns'; 
    }

    // Get widget categories.
	public function get_categories() { 
        return [ 'basic' ]; 
    }

    //Controls widget
	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
		$this->end_controls_section();
	}

    // Render widget output on the frontend.
	protected function render() { ?>

        <div class="RCPLA__blog-grid"> 
            <?php
                // Post fijos
                $arg_stickyPost = array(
                    'post_type'      => 'post',
                    'publish_status' => 'published',
                    'posts_per_page' => -1,
                    'ignore_sticky_posts' => 1,
                    'post__in'  => get_option( 'sticky_posts' )
                );
                $querySticky = new \WP_Query($arg_stickyPost);
                
                if($querySticky->have_posts()) : ?>
                    <div class="RCPLA__wrap_column">
                        <div class="swiper-container RCPLA__sticky-posts">
                            <div class="swiper-wrapper">
                                <?php while($querySticky->have_posts()) : $querySticky->the_post() ; ?>
                                    <div class="RCPLA__wrap_post swiper-slide">	
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large', array('class' => 'RCPLA__post-thumbnail')); ?>
                                        </a>
                                        <div class="RCPLA__post-content-wrap">
                                            <h4 class="RCPLA__post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="RCPLA__post-excerpt"> <?php echo mb_strimwidth(get_the_excerpt(), 0, 280, '...'); ?> </p>
                                            
                                            <div class="RCPLA__post-meta"> 
                                                <time class="RCPLA__date-post" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
                                                    <?php echo get_the_date();  ?>
                                                </time>
                                                <a class="RCPLA__read-more" href=" <?php the_permalink(); ?> "> <?php echo _e('Leer más','RCPLA');  ?> </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>	
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                <?php endif; 

                // Post continuos
                $arg_Post = array(
                    'post_type'      => 'post',
                    'post__not_in'	=> get_option ('sticky_posts'),
                    'publish_status' => 'published',
                    'posts_per_page' => 2			
                );        
                $queryPosts = new \WP_Query($arg_Post);
                if($queryPosts->have_posts()) : ?>
                    <div class="RCPLA__wrap_column">
                        <?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>	
                            <div class="RCPLA__wrap_post">	
                                <a class="RCPLA__wrap-thumbnail" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large', array('class' => 'RCPLA__post-thumbnail')); ?>
                                </a>
                                <div class="RCPLA__post-content-wrap">
                                    <h4 class="RCPLA__post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p class="RCPLA__post-excerpt"> <?php echo mb_strimwidth(get_the_excerpt(), 0, 160, '...'); ?> </p>
                                    
                                    <div class="RCPLA__post-meta"> 
                                        <time class="RCPLA__date-post" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
                                            <?php echo get_the_date();  ?>
                                        </time>
                                        <a class="RCPLA__read-more" href=" <?php the_permalink(); ?> "> <?php echo _e('Leer más','RCPLA');  ?> </a>
                                    </div>
                                </div>                               
                            </div>
                        <?php endwhile; wp_reset_postdata();  ?>
                    </div>
                <?php endif; ?>      

        </div>

	<?php }	
}