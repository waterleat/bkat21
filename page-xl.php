<?php
$option = get_option( 'bka2019ds_plugin' );
/* Uses Template name: Extra wide Front */
get_header();
$usermeta = '';
$count = '4';

if (is_user_logged_in()) {
  $userid = get_current_user_id();
  $usermeta =  get_user_meta( $userid, 'user_bu', true );
  $kc = ( ('' == $usermeta) || ('kendo' == $usermeta) || ('cs' == $usermeta) ) ? 'active' : '' ;
  $ic = ('iaido' == $usermeta) ? 'active' : '' ;
  $jc = ('jodo' == $usermeta) ? 'active' : '' ;
}else{
  $kc='active';
  $ic=$jc = '';
}
?>


<!-- very large screens yl 1680px -->
<div class="flex w-full">
  <div class="w-3/5 flex flex-col">
    <!-- kendo row -->
    <div class="flex flex-row">
      <div id="kendoBtn" class="w-1/4 cursor-pointer bg-purple-500  text-center ">
        <h2 class="text-2xl font-bold py-4 ">Kendo</h2>
        <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/kendo-bw.jpg" class="w-4/5 mx-auto pb-2 h-auto">
      </div>
      <div class="w-3/4 border-2 border-purple-500 bg-purple-200 pl-4">
        <div id="" class="xl-tab-pane-front ">
          <div class="pt-2 w-full ">
            <!-- <h4>Recent Posts</h2> -->
            <div class="h-64 overflow-y-auto">
            <!-- the above div is for the list of recent posts -->
              <?php
                set_query_var( 'bu', 'kendo' );
                set_query_var( 'count', $count );
                get_template_part( 'partials/bu', 'posts' );
              ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- iaido row -->
    <div class="flex flex-row">
      <div id="iaidoBtn" class="w-1/4 cursor-pointer bg-gray-500  text-center ">
        <h2 class="text-2xl font-bold py-4 ">Iaido</h2>
        <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/iaido-bw.jpg" class="w-4/5 mx-auto pb-2 h-auto">
      </div>
      <div class="w-3/4 border-2 border-gray-500 bg-gray-200 pl-4">
        <div id="" class="xl-tab-pane-front ">
          <div class="pt-2 w-full ">
            <!-- <h4>Recent Posts</h2> -->
            <div class="h-64 overflow-y-auto">
            <!-- the above div is for the list of recent posts -->
            <?php
              set_query_var( 'bu', 'iaido' );
              set_query_var( 'count', $count );
              get_template_part( 'partials/bu', 'posts' );
            ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jodo row -->
    <div class="flex flex-row">
      <div id="jodoBtn" class="w-1/4 cursor-pointer bg-orange-500  text-center ">
        <h2 class="text-2xl font-bold py-4 ">Jodo</h2>
        <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/jodo-bw.gif" class="w-4/5 mx-auto pb-2 h-auto">
      </div>
      <div class="w-3/4 border-2 border-orange-500 bg-orange-200 pl-4">
        <div id="" class="xl-tab-pane-front ">
          <div class="pt-2 w-full overflow-hidden">
            <!-- <h4>Recent Posts</h2> -->
            <div class="h-64 overflow-y-auto">
            <!-- the above div is for the list of recent posts -->
            <?php
              set_query_var( 'bu', 'jodo' );
              set_query_var( 'count', $count );
              get_template_part( 'partials/bu', 'posts' );
            ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- central services row -->
    <div class="flex flex-row">
      <div id="csBtn" class="w-1/4 cursor-pointer bg-red-500  text-center ">
        <h2 class="text-2xl font-bold py-4 ">Central Services</h2>
        <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/job-3506038_640.png" class="w-4/5 mx-auto pb-2 h-auto">
      </div>
      <div class="w-3/4 border-2 border-red-500 bg-red-200 pl-4">
        <div id="" class="xl-tab-pane-front ">
          <div class="pt-2 w-full overflow-hidden">
            <!-- <h4>Recent Posts</h2> -->
            <div class="h-64 overflow-y-auto">
            <!-- the above div is for the list of recent posts -->
            <?php
              set_query_var( 'bu', 'cs' );
              set_query_var( 'count', $count );
              get_template_part( 'partials/bu', 'posts' );
            ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- menu side -->
  <div class="w-2/5 flex flex-col bg-grey222">
    <div class="text-center border-2 border-blue-700 h-16 pt-3">
      <!-- <h2 class="text-2xl font-bold ">Actions</h2>
      <p>Select your choice of bu menu from the tabs below.</p>
      <p class="">The membership area is still the same, access it here.</p> -->
      <p><a class="bg-rblue w-32 py-2 px-4 text-white ml-2  rounded"  href="<?php echo wp_login_url( get_permalink() ); ?>">Login</a></p>

    </div>
    <div class="flex  items-stretch">
      <!-- bu menu -->
      <div class=" tab-content w-1/2">
        <div id="" class="w-full">
          <ul class="flex justify-around nav-tabs-xl-right   ">
            <li data-target="#xltab-1" class="upshadow kendo upborder-2 py-4 px-3 yl:px-4 zl:px-8 text-xl yl:text-2xl font-bold cursor-pointer  <?php echo $kc; ?>" >Kendo</li>
            <li data-target="#xltab-2" class="upshadow iaido upborder-2 py-4 px-3 yl:px-4 zl:px-8 text-xl yl:text-2xl font-bold cursor-pointer <?php echo $ic; ?>" >Iaido</li>
            <li data-target="#xltab-3" class="upshadow  jodo upborder-2 py-4 px-3 yl:px-4 zl:px-8 text-xl yl:text-2xl font-bold cursor-pointer <?php echo $jc; ?>" >Jodo</li>
          </ul>
        </div>
        <div id="xltab-1" class="tab-pane-xl-right kendo  <?php echo $kc; ?>">
          <nav id="" class=" bu-actions kendo px-4 border-2">
            <h2 class="text-2xl font-bold ">Kendo menu</h2>
            <?php
              set_query_var( 'bu', 'kendo1' );
              set_query_var( 'size', 'xl' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if ( current_user_can( 'edit_posts' )  ):
                set_query_var( 'bu', 'kendo2' );
                set_query_var( 'menuclass', ''); // 'bg-green-light' );
                get_template_part( 'partials/bu', 'menu' );
              endif;

              if ($option['eventadmin_manager']) {
                if ( current_user_can( 'edit_events' )  ) {
                  set_query_var( 'bu', 'buAdmin' );
                  set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                  get_template_part( 'partials/bu', 'menu' );
                }
              }
            ?>
          </nav>
        </div>

        <div id="xltab-2" class="tab-pane-xl-right iaido <?php echo $ic; ?>">
          <nav id="" class="bu-actions iaido px-4 border-2">
            <h2 class="text-2xl font-bold ">iaido menu</h2>
            <?php
              set_query_var( 'bu', 'iaido1' );
              set_query_var( 'size', 'xl' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if ( current_user_can( 'edit_posts' )  ):
                set_query_var( 'bu', 'iaido2' );
                set_query_var( 'menuclass', ''); // 'bg-green-light' );
                get_template_part( 'partials/bu', 'menu' );
              endif;

              if ($option['eventadmin_manager']) {
                if ( current_user_can( 'edit_events' )  ) {
                  set_query_var( 'bu', 'buAdmin' );
                  set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                  get_template_part( 'partials/bu', 'menu' );
                }
              }
            ?>
          </nav>
        </div>

        <div id="xltab-3" class="tab-pane-xl-right jodo <?php echo $jc; ?>">
          <nav id="" class="bu-actions jodo px-4 border-2">
            <h2 class="text-2xl font-bold ">jodo menu</h2>
            <?php
              set_query_var( 'bu', 'jodo1' );
              set_query_var( 'size', 'xl' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if ( current_user_can( 'edit_posts' )  ):
                set_query_var( 'bu', 'jodo2' );
                set_query_var( 'menuclass', ''); // 'bg-green-light' );
                get_template_part( 'partials/bu', 'menu' );
              endif;

              if ($option['eventadmin_manager']) {
                if ( current_user_can( 'edit_events' )  ) {
                  set_query_var( 'bu', 'buAdmin' );
                  set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                  get_template_part( 'partials/bu', 'menu' );
                }
              }
            ?>
          </nav>
        </div>
      </div>

      <!-- central services menu -->
      <div class=" w-1/2 ">
      <div id="" class="bu-actions cs px-4 border-2">
        <h2 class="text-2xl font-bold ">Central Services</h2>
        <?php
        if ( (! is_user_logged_in()) && ($option['member_manager']) ) {
          set_query_var( 'bu', 'cs0' );
          set_query_var( 'menuclass', '' );
          get_template_part( 'partials/bu', 'menu' );
        }

        set_query_var( 'bu', 'cs1' );
        set_query_var( 'menuclass', '' );
        get_template_part( 'partials/bu', 'menu' );

        if ( is_user_logged_in()) {

          if ( (current_user_can( 'edit_posts')) && ($option['membership_manager']) ){
            set_query_var( 'bu', 'cs2' );
            set_query_var( 'menuclass', '' );  // 'bg-green-light' );
            get_template_part( 'partials/bu', 'menu' );
          };

          if ( (current_user_can( 'edit_events' )) && ($option['eventadmin_manager']) ){
            set_query_var( 'bu', 'buAdmin' );
            set_query_var( 'menuclass', '' );  // 'bg-green-light' );
            get_template_part( 'partials/bu', 'menu' );
          }
        }
        ?>

      </div>
    </div>
    </div>
  </div>
</div>


<?php
get_footer();
