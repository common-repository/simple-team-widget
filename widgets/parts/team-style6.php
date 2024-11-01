<div class="stw-team-item style-six">
	<div class="stw-team-thumb">
	<img src="<?php echo esc_url($stw_team_image['url'])?>" alt="">
		<?php if (($team_name) || ($team_desc)) : ?>
				<div class="stw-team-data">
					<?php if($team_name) : ?>
						<h4><?php echo esc_html($team_name)?></h4>
					<?php endif;?>

					<?php if($team_desc) : ?>
						<p><?php echo esc_html($team_desc)?></p>  
					<?php endif;?>
				</div>
			<?php endif;?>
	</div>
</div>