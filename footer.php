						</div><!--/.main-inner-->
					</div><!--/.main-->	
				</div><!--/.container-inner-->
			</div><!--/.container-->
			
			<div class="clear"></div>
			
			<footer id="footer">
			
				<?php if ( get_theme_mod( 'footer-ads', 'off' ) == 'on' ): ?>
				<div id="footer-ads">
					<?php dynamic_sidebar( 'footer-ads' ); ?>
				</div><!--/#footer-ads-->
				<?php endif; ?>
					
				<?php // footer widgets
					$total = 4;
					if ( get_theme_mod( 'footer-widgets','0' ) != '' ) {
						
						$total = get_theme_mod( 'footer-widgets' );
						if( $total == 1) $class = 'one-full';
						if( $total == 2) $class = 'one-half';
						if( $total == 3) $class = 'one-third';
						if( $total == 4) $class = 'one-fourth';
						}

						if ( ( is_active_sidebar( 'footer-1' ) ||
							   is_active_sidebar( 'footer-2' ) ||
							   is_active_sidebar( 'footer-3' ) ||
							   is_active_sidebar( 'footer-4' ) ) && $total > 0 ) 
				{ ?>		
				<div id="footer-widgets">
						
					<div class="pad group">
						<?php $i = 0; while ( $i < $total ) { $i++; ?>
							<?php if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
						
						<div class="footer-widget-<?php echo esc_attr( $i ); ?> grid <?php echo esc_attr( $class ); ?> <?php if ( $i == $total ) { echo 'last'; } ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
						
							<?php } ?>
						<?php } ?>
					</div><!--/.pad-->

				</div><!--/#footer-widgets-->	
				<?php } ?>
				
				<div id="footer-bottom">
					
					<a id="back-to-top" href="#"><i class="fas fa-angle-up"></i></a>
						
					<div class="pad group">
						
						<div class="grid one-full">
							
							<?php if ( get_theme_mod('footer-logo') ): ?>
								<img id="footer-logo" src="<?php echo esc_url( get_theme_mod('footer-logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo('name')); ?>">
							<?php endif; ?>
							<a 
  href="https://braindrift.cn/?page_id=3162/" 
  target="_blank"
  style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 12px 48px 12px 24px; /* 右侧留空间给图标 */
    background: linear-gradient(90deg, #007bff, #0056b3);
    color: white;
    border-radius: 24px;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    font-family: sans-serif;
    z-index: 100;
    transition: all 0.3s ease;
    display: inline-block;
  "
  onmouseover="this.style.background='linear-gradient(90deg, #0056b3, #003d7a)'; this.querySelector('.icon').style.right='12px'"
  onmouseout="this.style.background='linear-gradient(90deg, #007bff, #0056b3)'; this.querySelector('.icon').style.right='15px'"
>
  数字会客厅
  <span style="
    position: absolute;
    right: 15px;
    bottom: 50%;
    transform: translateY(50%);
    transition: right 0.3s ease;
    font-size: 1.2em;
  " class="icon">→</span>
</a>


						<div id="copyright">
								<?php if ( get_theme_mod( 'copyright' ) ): ?>
									<p><?php echo esc_html( get_theme_mod( 'copyright' ) ); ?></p>
								<?php else: ?>
									
								<?php endif; ?>
							
							
							<?php if ( get_theme_mod( 'footer-social', 'on' ) == 'on' ): ?>
								<?php curveflow_social_links() ; ?>
					
							<?php endif; ?>
						
						</div>
									
					</div><!--/.pad-->

				</div><!--/#footer-bottom-->

			</footer><!--/#footer-->
			
		</div><!--/#wrapper-inner-->
	</div><!--/#wrapper-outer-->
</div><!--/#wrapper-->

<?php wp_footer(); ?>
</body>
</html>
<!-- 在 footer.php 或 自定义HTML小工具 中添加 -->
<canvas id="cursor-canvas"></canvas>

<script>
// 粒子跟随特效
document.addEventListener('DOMContentLoaded', function() {
  const canvas = document.getElementById('cursor-canvas');
  const ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  
  const particles = [];
  class Particle {
    constructor(x, y) {
      this.x = x;
      this.y = y;
      this.size = Math.random() * 3 + 1;
      this.speedX = Math.random() * 3 - 1.5;
      this.speedY = Math.random() * 3 - 1.5;
    }
    update() {
      this.x += this.speedX;
      this.y += this.speedY;
      if (this.size > 0.2) this.size -= 0.1;
    }
    draw() {
      ctx.fillStyle = 'rgba(192, 192, 192, 0.5)';
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fill();
    }
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach((particle, index) => {
      particle.update();
      particle.draw();
      if (particle.size <= 0.2) {
        particles.splice(index, 1);
      }
    });
    requestAnimationFrame(animate);
  }

  document.addEventListener('mousemove', function(e) {
    for (let i = 0; i < 3; i++) {
      particles.push(new Particle(e.clientX, e.clientY));
    }
  });
  animate();
});
</script>

<style>
#cursor-canvas {
  position: fixed;
  top: 0;
  left: 0;
  pointer-events: none;
  z-index: 9999;
}
</style>

