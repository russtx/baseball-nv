<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<?php get_template_part('searchform'); ?>

	<div class="sidebar-widget">
   
    <div class="widgetHeader">
      <h2>Standings</h2>
    </div>  
    <?php 
      $standings = bnv_mlb_standings();
      //var_dump($standings);
      $american_league = (!empty($standings)) ? $standings['AL'] : '';
      $national_league = (!empty($standings)) ? $standings['NL'] : '';
    ?>
    <div class="widgetHeader-2">
      <h2>American League</h2>
    </div>
    
    <table class="table">
      <thead>
        <tr>
          <th>EAST</th>
          <th>W</th>
          <th>L</th>
          <th>%</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($american_league['E'])): ?>
        <?php foreach($american_league['E'] as $al_east): ?>
          <tr>
            <td><a href="<?php echo home_url($al_east['team_link']); ?>" style="color:#2a6fb7;"><?php echo $al_east['team_name']; ?></a></td>
            <td><?php echo $al_east['won']; ?></td>
            <td><?php echo $al_east['lost']; ?></td>
            <td><?php echo $al_east['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    
    <table class="table">
      <thead>
        <tr>
          <th>CENTRAL</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($american_league['C'])): ?>
        <?php foreach($american_league['C'] as $al_central): ?>
          <tr>
            <td><a href="<?php echo home_url($al_central['team_link']); ?>" style="color:#2a6fb7;"><?php echo $al_central['team_name']; ?></a></td>
            <td><?php echo $al_central['won']; ?></td>
            <td><?php echo $al_central['lost']; ?></td>
            <td><?php echo $al_central['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    
    <table class="table">
      <thead>
        <tr>
          <th>WEST</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($american_league['W'])): ?>
        <?php foreach($american_league['W'] as $al_west): ?>
          <tr>
            <td><a href="<?php echo home_url($al_west['team_link']); ?>" style="color:#2a6fb7;"><?php echo $al_west['team_name']; ?></a></td>
            <td><?php echo $al_west['won']; ?></td>
            <td><?php echo $al_west['lost']; ?></td>
            <td><?php echo $al_west['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    
    <div class="widgetHeader-2">
      <h2>National League</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>EAST</th>
          <th>W</th>
          <th>L</th>
          <th>%</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($national_league['E'])): ?>
        <?php foreach($national_league['E'] as $nl_east): ?>
          <tr>
            <td><a href="<?php echo home_url($nl_east['team_link']); ?>" style="color:#2a6fb7;"><?php echo $nl_east['team_name']; ?></a></td>
            <td><?php echo $nl_east['won']; ?></td>
            <td><?php echo $nl_east['lost']; ?></td>
            <td><?php echo $nl_east['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <table class="table">
      <thead>
        <tr>
          <th>CENTRAL</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($national_league['C'])): ?>
        <?php foreach($national_league['C'] as $nl_central): ?>
          <tr>
            <td><a href="<?php echo home_url($nl_central['team_link']); ?>" style="color:#2a6fb7;"><?php echo $nl_central['team_name']; ?></a></td>
            <td><?php echo $nl_central['won']; ?></td>
            <td><?php echo $nl_central['lost']; ?></td>
            <td><?php echo $nl_central['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>

    <table class="table">
      <thead>
        <tr>
          <th>WEST</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($national_league['W'])): ?>
        <?php foreach($national_league['W'] as $nl_west): ?>
          <tr>
            <td><a href="<?php echo home_url($nl_west['team_link']); ?>" style="color:#2a6fb7;"><?php echo $nl_west['team_name']; ?></a></td>
            <td><?php echo $nl_west['won']; ?></td>
            <td><?php echo $nl_west['lost']; ?></td>
            <td><?php echo $nl_west['win_percentage']; ?></td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="4">No data</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    
	</div>
  <div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>
  <div class="sidebar-widget" style="margin-top:20px;">
    <h3 style="background:#b10f16; height:2.5em; text-align:center; color:#fff; font-size:2em; padding-top:.6em;;font-family:'Alfa Slab One', cursive; font-weight:500; line-height:1.2; margin:0 0 .75em;">Fantasy News</h3>
    <?php
      include_once(ABSPATH .WPINC . '/feed.php');
      $rss_items = array();
      $rss = fetch_feed('http://www.tgfantasybaseball.com/baseball/rss/news.xml');
      if(!is_wp_error($rss)):
        $maxitems = $rss->get_item_quantity(7);
        $rss_items = $rss->get_items(0, $maxitems);
      endif; 
    ?>
      <h4><a href="<?php echo $rss->get_link(); ?>"><?php echo $rss->get_title(); ?></a></h4>
      <p><?php echo $rss->get_description(); ?></p>
      
      <?php if($maxitems == 0): ?>
        <p>No data.</p>
      <?php else: ?>
        <?php foreach($rss_items as $item): ?>
          <article style="border-bottom:none; padding-bottom:0; display:block; margin-bottom:1.5em; padding-left:10px; padding-right:10px;">
            <header style="display:block; background:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/helmet.png); background-repeat:no-repeat; height:2em; width:27em; margin-bottom:1em;">
              <h4 style="margin-bottom:.5em; font-family:'Alfa Slab One';">
                <a href="<?php echo $item->get_permalink(); ?>" style="display:block; margin-left:35px;"><?php echo $item->get_title(); ?></a>
              </h4>
            </header>
            <footer style="display:block; color:#888; font-size:.9em; line-height:1.4;"><?php echo $item->get_content(); ?></footer>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
  </div>

</aside>
<!-- /sidebar -->
