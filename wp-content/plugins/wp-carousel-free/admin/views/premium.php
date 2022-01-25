<?php
/**
 * The help page for the WP Carousel
 *
 * @package WP Carousel
 * @subpackage wp-carousel-free/admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access.

/**
 * The help class for the WP Carousel
 */
class WP_Carousel_Free_Upgrade {


	/**
	 * Add admin menu.
	 *
	 * @since 2.0.0
	 * @return void
	 */
	public function upgrade_admin_menu() {
		add_submenu_page(
			'edit.php?post_type=sp_wp_carousel',
			__( 'Premium', 'wp-carousel-free' ),
			__( 'Premium', 'wp-carousel-free' ),
			'manage_options',
			'wpcf_upgrade',
			array(
				$this,
				'premium_page_callback',
			)
		);
	}

	/**
	 * Happy users.
	 *
	 * @param boolean $username username.
	 * @param array   $args args.
	 * @return statement
	 */
	public function happy_users( $username = 'shapedplugin', $args = array() ) {
		if ( $username ) {
			$params = array(
				'timeout'   => 10,
				'sslverify' => false,
			);

			$raw = wp_remote_retrieve_body( wp_remote_get( 'http://wptally.com/api/' . $username, $params ) );
			$raw = json_decode( $raw, true );

			if ( array_key_exists( 'error', $raw ) ) {
				$data = array(
					'error' => $raw['error'],
				);
			} else {
				$data = $raw;
			}
		} else {
			$data = array(
				'error' => __( 'No data found!', 'wp-carousel-free' ),
			);
		}

		return $data;
	}

	/**
	 * Premium Page Callback
	 */
	public function premium_page_callback() {
		wp_enqueue_style( 'sp-wpcp-admin-premium', WPCAROUSELF_URL . 'admin/css/premium-page.min.css', array(), WPCAROUSELF_VERSION );
		wp_enqueue_style( 'sp-wpcp-admin-premium-modal', WPCAROUSELF_URL . 'admin/css/modal-video.min.css', array(), WPCAROUSELF_VERSION );
		wp_enqueue_script( 'sp-wpcp-admin-premium', WPCAROUSELF_URL . 'admin/js/jquery-modal-video.min.js', array( 'jquery' ), WPCAROUSELF_VERSION, true );
		?>
		<div class="sp-wp-carousel-premium-page">
		<!-- Banner section start -->
		<section class="sp-wpc__banner">
			<div class="sp-wpc__container">
				<div class="row">
					<div class="sp-wpc__col-xl-6">
						<div class="sp-wpc__banner-content">
							<h2 class="sp-wpc__font-30 main-color sp-wpc__font-weight-500">
								<?php echo esc_html__( 'Upgrade To WordPress Carousel Pro', 'wp-carousel-free' ); ?></h2>
							<h4 class="sp-wpc__mt-10 sp-wpc__font-18 sp-wpc__font-weight-500"><?php echo wp_kses_post( __( 'Supercharge <strong>Your WordPress Carousels</strong> with powerful functionality!', 'wp-carousel-free' ) ); ?></h4>
							<p class="sp-wpc__mt-25 text-color-2 line-height-20 sp-wpc__font-weight-400"><?php echo esc_html__( 'The Most Powerful and User-friendly Multi-purpose WordPress Carousel plugin to Slide out of Anything.', 'wp-carousel-free' ); ?></p>
							<p class="sp-wpc__mt-20 text-color-2 sp-wpc__line-height-20 sp-wpc__font-weight-400"><?php echo wp_kses_post( __( 'Create beautiful carousels with images, Posts, WooCommerce Products, Contents (Images, Text, HTML, Shortcodes), Video, etc. The plugin has its own image and content management system and also Supports <strong>Posts, Pages, Custom Post Type, Taxonomy, Custom Taxonomy, Custom Contents, YouTube, Vimeo, Dailymotion, mp4, WebM, Self-hosted Video</strong> with Lightbox.', 'wp-carousel-free' ) ); ?></p>
						</div>
						<div class="sp-wpc__banner-button sp-wpc__mt-40">
							<a class="sp-wpc__btn sp-wpc__btn-sky" href="https://shapedplugin.com/plugin/wordpress-carousel-pro/?ref=1" target="_blank">Upgrade To Pro Now</a>
							<a class="sp-wpc__btn sp-wpc__btn-border ml-16 sp-wpc__mt-15" href="https://wordpresscarousel.com/#demo?ref=1" target="_blank">Live Demo</a>
						</div>
					</div>
					<div class="sp-wpc__col-xl-6">
						<div class="sp-wpc__banner-img">
							<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/wpcp-vector.svg'; ?>" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner section End -->

		<!-- Count section Start -->
		<section class="sp-wpc__count">
			<div class="sp-wpc__container">
				<div class="sp-wpc__count-area">
					<div class="count-item">
						<h3 class="sp-wpc__font-24">
						<?php
						$plugin_data  = $this->happy_users();
						$plugin_names = array_values( $plugin_data['plugins'] );

						$active_installations = array_column( $plugin_names, 'installs', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-carousel-free'] ) . '+';
						?>
						</h3>
						<span class="sp-wpc__font-weight-400">Active Installations</span>
					</div>
					<div class="count-item">
						<h3 class="sp-wpc__font-24">
						<?php
						$active_installations = array_column( $plugin_names, 'downloads', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-carousel-free'] );
						?>
						</h3>
						<span class="sp-wpc__font-weight-400">all time downloads</span>
					</div>
					<div class="count-item">
						<h3 class="sp-wpc__font-24">
						<?php
						$active_installations = array_column( $plugin_names, 'rating', 'url' );
						echo esc_attr( $active_installations['http://wordpress.org/plugins/wp-carousel-free'] ) . '/5';
						?>
						</h3>
						<span class="sp-wpc__font-weight-400">user reviews</span>
					</div>
				</div>
			</div>
		</section>
		<!-- Count section End -->

		<!-- Video Section Start -->
		<section class="sp-wpc__video">
			<div class="sp-wpc__container">
				<div class="section-title text-center">
					<h2 class="sp-wpc__font-28">WP Carousel Pro Plugin that’s both Easy and Powerful</h2>
					<h4 class="sp-wpc__font-16 sp-wpc__mt-10 sp-wpc__font-weight-400">Learn why WordPress Carousel Pro is the best Multi-purpose Carousel Plugin.</h4>
				</div>
				<div class="video-area text-center">
					<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/wpcp-vector-1.svg'; ?>" alt="">
					<div class="video-button">
						<a class="js-video-button" href="#" data-channel="youtube" data-video-url="//www.youtube.com/embed/j8EJnYpZmAA">
							<span><i class="fa fa-play"></i></span>
						</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Video Section End -->

		<!-- Features Section Start -->
		<section class="sp-wpc__feature">
			<div class="sp-wpc__container">
				<div class="section-title text-center">
					<h2 class="sp-wpc__font-28">Amazing Pro Key Features</h2>
					<h4 class="sp-wpc__font-16 sp-wpc__mt-10 sp-wpc__font-weight-400">With WordPress Carousel Pro, you can unlock the following amazing features.</h4>
				</div>
				<div class="feature-wrapper">
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/slide-anything.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Slide Anything</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">WordPress Carousel Pro allows you to create a carousel slider where the content for each slide can be anything you want – image, post, product, content, video, text, HTML, Shortcodes, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="
								<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/advanced-carousel-generator.svg'; ?>
								" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Advanced Carousel Generator</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">WordPress Carousel Pro comes with a built-in easy to use Shortcode Generator that helps you save, edit, copy and paste the shortcode where you want! Create unlimited carousels in minutes.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="
								<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Customize.svg'; ?>
								" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Easily Customize Everything</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">WordPress Carousel Pro is fully responsive and touch-friendly with a lot of customization options that can be integrated into your WordPress site quickly without writing any code. </p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Multiple-Image-Carousels.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Multiple Image Carousels on the Same Page</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">WordPress Carousel Pro allows you to create beautiful image carousels for your site in minutes! Upload images via WordPress regular gallery, create a gallery to make a carousel.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon custom-padding">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/post-carousel.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Post Carousel (Custom post types, Taxonomies)</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Display posts from multiple Categories, Tags, Formats, or Types: Latest, Taxonomies, Specific, etc. Show the post contents: title, image, excerpt, read more, category, date, author, tags, comments, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/woo-carousel.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">WooCommerce Product Carousel (Categories, specific)</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Filter by different product types. (e.g. latest, categories, specific products, etc.). Show/hide the product name, image, price, excerpt, read more, rating, add to cart button, etc.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/content-carousel.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Content Carousel (Slide can be anything you want)</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Slide anything you want based on your WordPress site. (e.g. images, text, HTML, shortcodes, any custom contents, etc.) You can sort slide content by drag and drop easily.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/video-carousel.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Video Carousel with Lightbox</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Show videos from multiple sources: YouTube, Vimeo, Dailymotion, mp4, WebM, and even self-hosted video with Lightbox. A customizable video icon will place over the video thumb.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
					<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/drag-and-drop.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Drag & Drop Carousel Builder  </h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Drag & Drop carousel content ordering is one of the amazing features of WordPress Carousel Pro. You can order your content easily from WordPress default gallery settings.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon custom-padding">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/links.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Image Carousel with Internal & External Linksd</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">
								You can link to each carousel image easily. You can add a link to each carousel in WordPress gallery settings. You can set URLs to them, they can open in the same or new tab.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/lightbox.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Lightbox Functionality for Image</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Lightbox is one of the impressive premium features of WordPress Carousel Pro. You can set lightbox overlay color, image counter, image caption & color, bottom thumbnails gallery, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/carousel-controls.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">25+ Carousel Controls</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Carousel Controls e.g. 6 Navigation arrows & 9 Positions, Pagination dots, AutoPlay & speed, Stop on hover, looping, Touch Swipe, scroll, key navigation, mouse draggable, mouse wheel, etc.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/carosuel-mode.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Carousel Mode and Orientation (Horizontal & Vertical) </h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">WordPress Carousel Pro has 3 carousel modes: Standard, Center, and Ticker (Smooth looping, with no pause). You can change the carousel mode and orientation based on your choice or demand.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Modern-Effects.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Modern Effects for Images (grayscale, zoom, fade).</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">You can set hover and sliding effects for images like, gray-scale, overlay opacity, fade in or out, etc. that are both edgy and appealing. Try them all. Use the one you like best.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Re-sizing.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Custom Image Re-sizing</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">You’ll find in the image settings all cropping sizes available. You can change the default size of your images in the settings. The width is dynamic with fixed height through CSS.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Advanced-settings.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Advanced Plugin Settings</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">The plugin is completely customizable and also added a custom CSS field option to override styles. You can also enqueue or dequeue scripts/CSS to avoid conflicts and loading issues.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/typo.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Advanced Typography (Fonts, Color & Styling)</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Set font family, size, weight, text-transform, & colors to match your brand. The Pro version supports 950+ Google fonts and typography options. You can enable or disable fonts loading.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/Translation-RTL-Ready.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Multisite, Multilingual, RTL, Accessibility Ready</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">The plugin is Multisite, Multilingual, RTL, and Accessibility ready. For Arabic, Hebrew, Persian, etc. languages, you can select the right-to-left option for slider direction, without writing any CSS.</p>
							</div>
						</div>
					</div>
					<div class="feature-area">
						<div class="feature-item mr-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/page-bilder.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Page Builders & Countless Theme Compatibility</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">The plugin works smoothly with the popular themes and page builders plugins, e,g: Gutenberg, WPBakery, Elementor/Pro, Divi builder, BeaverBuilder, Fusion Builder, SiteOrgin, Themify Builder, etc.</p>
							</div>
						</div>
						<div class="feature-item ml-30">
							<div class="feature-icon">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/support.svg'; ?>" alt="">
							</div>
							<div class="feature-content">
								<h3 class="sp-wpc__font-18 sp-wpc__font-weight-600">Top-notch Support and Frequently Updates</h3>
								<p class="sp-wpc__font-15 sp-wpc__mt-15 sp-wpc__line-height-24">Our dedicated top-notch support team is always ready to offer you world-class support and help when needed. Our engineering team is continuously working to improve the plugin and release new versions!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Features Section End -->

		<!-- Buy Section Start -->
		<section class="sp-wpc__buy">
			<div class="sp-wpc__container">
				<div class="row">
					<div class="sp-wpc__col-xl-12">
						<div class="buy-content text-center">
							<div class="buy-img">
							<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/premium/happy.svg'; ?>" alt="">
							</div>
							<h2 class="sp-wpc__font-28">Join
							<?php
							$install = 0;
							foreach ( $plugin_names as &$plugin_name ) {
								$install += $plugin_name['installs'];
							}
							echo esc_attr( $install + '15000' ) . '+';
							?>
							Happy Users in 160+ Countries </h2>
							<p class="sp-wpc__font-16 sp-wpc__mt-25 sp-wpc__line-height-22">98% of customers are happy with <b>ShapedPlugin's</b> products and support. <br>
								So it’s a great time to join them.</p>
							<a class="sp-wpc__btn sp-wpc__btn-buy sp-wpc__mt-40" href="https://shapedplugin.com/plugin/wordpress-carousel-pro/?ref=1" target="_blank">Get Started for $39 Today!</a>
							<span>14 Days Money-back Guarantee! No Question Asked.</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Buy Section End -->

		<!-- Testimonial section start -->
		<div class="testimonial-wrapper">
		<section class="sp-wpc__premium testimonial">
			<div class="row">
				<div class="col-lg-6">
					<div class="testimonial-area">
						<div class="testimonial-content">
							<p>I’ve tried 3 other Gallery / Carousel plugins and this one is by far the easiest, lightweight and does exactly what I want! I had a minor glitch and support was very quick to fix it. Very happy and highly recommend this! Thank you!</p>
						</div>
						<div class="testimonial-info">
							<div class="img">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/Joyce-van-den-Berg.png'; ?>" alt="">
							</div>
							<div class="info">
								<h3>Joyce van den Berg</h3>
								<div class="star">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="testimonial-area">
						<div class="testimonial-content">
							<p>A wonderful WordPress Carousel plugin. This plugin is fantastic. It’s simple to use and very effective. It’s by far the best of the options out there. Also I’ve found the support to be excellent. Highly recommended !!</p>
						</div>
						<div class="testimonial-info">
							<div class="img">
								<img src="<?php echo esc_url( WPCAROUSELF_URL ) . 'admin/img/images/Graeme-Myburgh.jpeg'; ?>" alt="">
							</div>
							<div class="info">
								<h3>Graeme Myburgh</h3>
								<div class="star">
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		</div>
		<!-- Testimonial section end -->
	</div>
	<!-- End premium page -->
		<?php
	}
}
