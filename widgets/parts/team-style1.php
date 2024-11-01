<div class="stw-team-item">
  <div class="stw-team-thumb">
    <img src="<?php echo esc_url($stw_team_image['url'])?>" alt="">
  </div>

  <?php if (($team_name) || ($team_desc)) : ?>
    <div class="stw-team-data">
      <?php if($team_name) : ?>
        <h4><?php echo esc_html($team_name)?></h4>
      <?php endif;?>

      <?php if($team_desc) : ?>
        <p><?php echo esc_html($team_desc)?></p>  
      <?php endif;?>

      <?php if($stw_social_hide == 'yes') : ?>
          <div class="stw-team-social">
          <ul>
            <?php foreach ( $stw_social_list as $stw_social_lists ) : ?>
              <?php if (( $stw_social_lists['stw_team_social_icon']['value']) ) : ?>
                <li>
                  <a href="<?php echo esc_url($stw_social_lists['stw_team_social_link']['url']);?>">
                    <?php \Elementor\Icons_Manager::render_icon($stw_social_lists['stw_team_social_icon'], ['aria-hidden' => 'true']);?>
                  </a>
                </li>
              <?php endif;?>
            <?php endforeach; ?>
            </ul>
        </div>
      <?php endif;?>

      
    </div>
      
  <?php endif;?>
      

      
  
</div>