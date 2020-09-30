<?php
  if (!isset($_SESSION['dojoregion'])) {
    $_SESSION['dojoregion'] = 0;
    $_SESSION['dojokendo'] = 0;
    $_SESSION['dojoiaido'] = 0;
    $_SESSION['dojojodo'] = 0;
    $_SESSION['dojofilter'] = '';
  }

  $option = get_option( 'bka2019ds_plugin' );

  get_header();

  $post_id = get_the_id();
  // $stype = get_post_meta($post_id, '__slideshow_type', true);
  $scategory = get_post_meta($post_id, '_slideshow_category', true);
  $number = get_post_meta($post_id, '_slideshow_number', true);

  // if ($type == 'slideshow' ){
  //   if($stype == 'revslider'){
  if(function_exists('putRevSlider')){
    $rev_id = get_post_meta($post_id, '_slideshow_rev', true);
    ob_start();
    putRevSlider($rev_id);
    $content = ob_get_clean();

    echo '<div id="feature" class="revslider with_shadow">'.$content.'</div>';
  }
?>


<div class="p-4 bg-white">
  <h1 class="text-indigo-700 font-normal text-center pb-4">Welcome to the British Kendo Association</h1>
  <p>The British Kendo Association (BKA) is the official governing body for Kendo, Iaido and Jodo in the UK.
      The BKA was founded in 1964 as a non-profit making organisation to foster and develop the practice and
      spirit of Kendo, Iaido, and Jodo along traditional lines.</p>
  <!-- <p>If you are interested in beginning Kendo, Iaido or Jodo please see the ‘Getting Started‘ section for more information and then look in Clubs for somewhere to practice near you.</p> -->
</div>
<!-- get user preference for bu -->
<?php

  $np = '';
  $kc=$ic=$jc=$csc = 'hidden';
  if (is_user_logged_in()) {
    $userid = get_current_user_id();
    $usermeta =  get_user_meta( $userid, 'user_bu', true );
    $np = ('' == $usermeta) ? '' : 'hidden' ;
    $kc = ('kendo' == $usermeta) ? '' : 'hidden' ;
    $ic = ('iaido' == $usermeta) ? '' : 'hidden' ;
    $jc = ('jodo' == $usermeta) ? '' : 'hidden' ;
    $csc = ('cs' == $usermeta) ? '' : 'hidden' ;
  };
?>


<!-- new testing area for new look started 17/10/2018 upto inc xl-->
<div id="menu-block" class=" flex flex-col lg:flex-row sm:p-4">
  <!-- menu section -->
  <div class="flex flex-row w-full lg:flex-col lg:w-32  bg-blue-200 text-center">
    <div id="kendoBtn" class="bu-btn kendo cursor-pointer bg-purple-500 w-1/4 md:w-full">
      <h3 class=" my-0 p-1 ys:hidden">K</h3><h3 class=" my-0 py-2 md:py-4 hidden ys:block">Kendo</h3>
      <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/kendo-bw.jpg" class="w-4/5 pb-2 h-auto mx-auto">
    </div>
    <div id="iaidoBtn" class="bu-btn iaido cursor-pointer bg-gray-500 w-1/4 md:w-full">
      <h3 class=" my-0 p-1 ys:hidden">I</h3><h3 class=" my-0 py-2 md:py-4 hidden ys:block">Iaido</h3>
      <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/iaido-bw.jpg" class="w-4/5 pb-2 h-auto mx-auto">
    </div>
    <div id="jodoBtn" class="bu-btn jodo cursor-pointer bg-orange-500 w-1/4 md:w-full">
      <h3 class=" my-0 p-1 ys:hidden">J</h3><h3 class=" my-0 py-2 md:py-4 hidden ys:block">Jodo</h3>
      <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/jodo-bw.gif" class="w-4/5 pb-2 h-auto mx-auto">
    </div>
    <div id="csBtn" class="bu-btn cs cursor-pointer bg-red-500 w-1/4 md:w-full">
      <h3 class=" my-0 py-1 ys:hidden">CS</h3>
      <h3 class=" my-0 py-2 hidden ys:block xs:hidden">CentServ</h3>
      <h3 class=" my-0 py-2 hidden xs:block sm:hidden">Cent Services</h3>
      <h3 class=" my-0 py-2 md:py-4 lg:py-2 hidden sm:block ">Central Services</h3>
        <img src="<?php bloginfo('template_directory') ?>/assets/dist/images/job-3506038_640.png" class="w-4/5 pb-2 h-auto mx-auto">
    </div>
  </div>

  <!-- Content section -->
  <div id="bu-front-content" class=" w-full">
    <div id="startupContainer" class="bg-blue-200 p-4 lg:min-h-full <?php echo $np; ?>">
      <!-- <p class="text-center" >Select the tab for which of the bu you want to persue.</p> -->
      <h3 class=" px-4">Further Information</h3>
      <p class="px-8">Use the tabs for more about each of the arts <strong>K</strong>endo, <strong>I</strong>aido or <strong>J</strong>odo
      <h3 class=" px-4">To Join</h3>
      <p class="px-8">Central Services (CS) for finding out where your nearest dojo is, and contacting the officers of the association. BKA documentation is found here.</p>
      <h3 class=" px-4">Members</h3>
      <p class="px-8">The membership area is still the same access it here.
      <a class="bg-orange-500 w-32 py-2 px-4 text-white ml-2 inline rounded"  href="https://membership.britishkendoassociation.com/html/my_account.php">Login/Register</a></p>
      <!-- <p class="px-8">If you are already a member you will need to login in order to access some of the content on the site.</p> -->
    </div>

    <!-- kendoContainer -->
    <div id="kendoContainer" class="bg-purple-200 p-4 clearfix lg:min-h-full <?php echo $kc; ?>">
      <!-- small screens using tabs -->
      <div class="md:hidden">
        <div>
          <!-- post & menu tabbed selectors    -->
          <div class="">
            <ul id="k-s" class="flex justify-around nav-tabs-front kendo text-center">
              <li data-target="#k-tab-1" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold active" >Recent Posts</li>
              <li data-target="#k-tab-2" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold" >Kendo Menu</li>
            </ul>
          </div>

          <div class="tab-content border-t-2 border-purple-500">
            <div id="k-tab-1" class="tab-pane-front kendo active">
              <div class="pt-2">
                <!-- <h2>Recent Posts</h2> -->
                <div class="">
                <!-- the above div is for the list of recent posts -->
                  <?php
                    set_query_var( 'bu', 'kendo' );
                    set_query_var( 'count', '5' );
                    get_template_part( 'partials/bu', 'posts' );
                  ?>
                <!-- the following closing div is for the row of more post buttons -->
                </div>
              </div>
            </div>

            <div id="k-tab-2" class="tab-pane-front kendo">
              <nav id="" class="pt-4">
                <?php
                  set_query_var( 'bu', 'kendo1' );
                  set_query_var( 'menuclass', '' );
                  get_template_part( 'partials/bu', 'menu' );

                  if (! is_user_logged_in()) :
                    echo 'press this button to see member only content';
                  endif;

                  if ( current_user_can( 'edit_posts' )  ):
                    set_query_var( 'bu', 'kendo2' );
                    set_query_var( 'menuclass', '' );  // 'bg-green-light' );
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
        </div>
      </div>
      <!-- larger screen sizes -->
      <div class="hidden md:flex flex-row ">
        <div id="bu-posts-k-lg" class="w-1/2 border-b md:border-b-0 md:border-r border-purple-700 px-4">
          <div class="">
            <h2 class="text-2xl font-bold ">Recent Posts</h2>
            <div class="">
            <!-- the above div is for the list of recent posts -->
              <?php
                set_query_var( 'bu', 'kendo' );
                set_query_var( 'count', '5' );
                get_template_part( 'partials/bu', 'posts' );
              ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>


        <div class="bu-actions kendo w-full md:w-1/2 px-4 md:py-0">
          <h2 class="text-2xl font-bold ">Kendo menu</h2>
          <div class="pt-2">
            <?php
              set_query_var( 'bu', 'kendo1' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if (! is_user_logged_in()) :
                echo '<p>You will need to login to see member only content</p>';
              endif;

              if ( current_user_can( 'edit_posts' )  ):
                set_query_var( 'bu', 'kendo2' );
                set_query_var( 'menuclass', '' );  // 'bg-green-light' );
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
          </div>
        </div>

      </div>
    </div>

    <div id="iaidoContainer" class="bg-gray-200 p-4 clearfix lg:min-h-full  <?php echo $ic; ?>" >
      <!-- small screens using tabs -->
      <div class="md:hidden">
        <div>
          <!-- post & menu tabbed selectors    -->
          <div class=" ">
            <ul id="i-s" class="flex justify-around nav-tabs-front iaido text-center">
              <li data-target="#i-tab-1" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold active" >Recent Posts</li>
              <li data-target="#i-tab-2" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold" >Iaido Menu</li>
            </ul>
          </div>

          <div class="tab-content border-t-2 border-gray-700">
            <div id="i-tab-1" class="tab-pane-front iaido active">
              <div class="pt-2">
                <!-- <h2>Recent Posts</h2> -->
                <div class="">
                <!-- the above div is for the list of recent posts -->
                  <?php
                    set_query_var( 'bu', 'iaido' );
                    set_query_var( 'count', '5' );
                    get_template_part( 'partials/bu', 'posts' );
                  ?>
                <!-- the following closing div is for the row of more post buttons -->
                </div>
              </div>
            </div>

            <div id="i-tab-2" class="tab-pane-front iaido">
              <nav id="" class="pt-4">
                <?php
                  set_query_var( 'bu', 'iaido1' );
                  set_query_var( 'menuclass', '' );
                  get_template_part( 'partials/bu', 'menu' );

                  if (! is_user_logged_in()) :
                    echo 'press this button to see member only content';
                  endif;

                  if ( current_user_can( 'edit_posts' )  ):
                    set_query_var( 'bu', 'iaido2' );
                    set_query_var( 'menuclass', '' );  // 'bg-green-light' );
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
                <!-- <ul class="dummy li-py-1 li-px-2">
                  <li>This is a dummy Menu</li>
                  <li>What is Iaido?</li>
                  <li>How to Join/Renew Membership </li>
                  <li>Seminars: Details/Booking</li>
                  <li>Gradings: Details/Booking</li>
                  <li>Competitions: Details/Booking</li>
                  <li>National Squad Training</li>
                  <li>Coaching</li>
                  <li>Dojos/Clubs</li>
                  <li>Current Officers </li>
                  <li>Contact Us</li>
                  <li>Bu Documentation</li>
                  <li>Insurance/Complaints</li>
                  <li>Forum</li>
                  <li>Dojo Admin</li>
                  <li>Bu Officer Admin</li>
                  <li>Competition Winners database</li>
                  <li>Past Officers of the Bu</li>
                  <li>Archive material</li>
                </ul> -->
              </nav>

            </div>
          </div> <!-- tabbed content -->
        </div>
      </div>
      <!-- larger screen sizes -->
      <div class="hidden md:flex flex-row ">
        <div id="bu-posts-i-lg" class="w-1/2 border-b md:border-b-0 md:border-r border-gray-800 px-4">
          <div class="">
            <h2 class="text-2xl font-bold ">Recent Posts</h2>
            <div class="">
            <!-- the above div is for the list of recent posts -->
              <?php
                set_query_var( 'bu', 'iaido' );
                set_query_var( 'count', '5' );
                get_template_part( 'partials/bu', 'posts' );
              ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
        <div class="bu-actions iaido w-full md:w-1/2 px-4 md:py-0">
          <h2 class="text-2xl font-bold ">Iaido menu</h2>
          <div class="pt-2">
            <?php
              set_query_var( 'bu', 'iaido1' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if (! is_user_logged_in()) :
                echo 'press this button to see member only content';
              endif;

              if ( current_user_can( 'edit_posts' )  ){
                set_query_var( 'bu', 'iaido2' );
                set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                get_template_part( 'partials/bu', 'menu' );
              };

              if ($option['eventadmin_manager']) {
                if ( current_user_can( 'edit_events' )  ) {
                  set_query_var( 'bu', 'buAdmin' );
                  set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                  get_template_part( 'partials/bu', 'menu' );
                }
              }
            ?>

            <!-- <ul class="dummy li-py-1 li-px-2">
              <li>This is a dummy Menu</li>
              <li>What is Iaido?</li>
              <li>How to Join/Renew Membership </li>
              <li>Seminars: Details/Booking</li>
              <li>Gradings: Details/Booking</li>
              <li>Competitions: Details/Booking</li>
              <li>National Squad Training</li>
              <li>Coaching</li>
              <li>Dojos/Clubs</li>
              <li>Current Officers </li>
              <li>Contact Us</li>
              <li>Bu Documentation</li>
              <li>Insurance/Complaints</li>
              <li>Forum</li>
              <li>Dojo Admin</li>
              <li>Bu Officer Admin</li>
              <li>Competition Winners database</li>
              <li>Past Officers of the Bu</li>
              <li>Archive material</li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    <div id="jodoContainer" class="bg-orange-200 p-4 lg:min-h-full  <?php echo $jc; ?>" >
      <!-- small screens using tabs -->
      <div class="md:hidden">
        <div>
          <!-- post & menu tabbed selectors    -->
          <div class=" ">
            <ul id="j-s" class="flex justify-around nav-tabs-front jodo text-center">
              <li data-target="#j-tab-1" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold active" >Recent Posts</li>
              <li data-target="#j-tab-2" class=" upshadow upborder-2 p-2 xs:py-4 ys:px-4 xs:px-8 cursor-pointer xs:text-2xl font-bold" >Jodo Menu</li>
            </ul>
          </div>

          <div class="tab-content border-t-2 border-orange-500">
            <div id="j-tab-1" class="tab-pane-front jodo active">
              <div class="pt-2">
                <!-- <h2>Recent Posts</h2> -->
                <div class="">
                <!-- the above div is for the list of recent posts -->
                  <?php
                    set_query_var( 'bu', 'jodo' );
                    set_query_var( 'count', '5' );
                    get_template_part( 'partials/bu', 'posts' );
                  ?>
                <!-- the following closing div is for the row of more post buttons -->
                </div>
              </div>
            </div>

            <div id="j-tab-2" class="tab-pane-front jodo">
              <nav id="" class="pt-4">
                <?php
                  set_query_var( 'bu', 'jodo1' );
                  set_query_var( 'menuclass', '' );
                  get_template_part( 'partials/bu', 'menu' );

                  if (! is_user_logged_in()) :
                    echo 'press this button to see member only content';
                  endif;

                  if ( current_user_can( 'edit_posts' )  ){
                    set_query_var( 'bu', 'jodo2' );
                    set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                    get_template_part( 'partials/bu', 'menu' );
                  };

            			if ($option['eventadmin_manager']) {
                    if ( current_user_can( 'edit_events' )  ) {
                      set_query_var( 'bu', 'buAdmin' );
                      set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                      get_template_part( 'partials/bu', 'menu' );
                    }
                  }
                ?>
                <!-- <ul class="dummy li-py-1 li-px-2">
                  <li>This is a dummy Menu</li>
                  <li>What is Jodo?</li>
                  <li>How to Join/Renew Membership </li>
                  <li>Seminars: Details/Booking</li>
                  <li>Gradings: Details/Booking</li>
                  <li>Competitions: Details/Booking</li>
                  <li>National Squad Training</li>
                  <li>Coaching</li>
                  <li>Dojos/Clubs</li>
                  <li>Current Officers </li>
                  <li>Contact Us</li>
                  <li>Bu Documentation</li>
                  <li>Insurance/Complaints</li>
                  <li>Forum</li>
                  <li>Dojo Admin</li>
                  <li>Bu Officer Admin</li>
                  <li>Competition Winners database</li>
                  <li>Past Officers of the Bu</li>
                  <li>Archive material</li>
                </ul> -->
              </nav>
            </div>

          </div> <!-- tabbed content -->
        </div>
      </div>
      <!-- larger screen sizes -->
      <div class="hidden md:flex flex-row ">
        <div id="bu-posts-i-lg" class="w-1/2 border-b md:border-b-0 md:border-r border-red-900 px-4">
          <div class="">
            <h2 class ="text-2xl font-bold ">Recent Posts</h2>
            <div class="">
            <!-- the above div is for the list of recent posts -->
              <?php
                set_query_var( 'bu', 'jodo' );
                set_query_var( 'count', '5' );
                get_template_part( 'partials/bu', 'posts' );
              ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
        <div class="bu-actions jodo w-full md:w-1/2 px-4 md:py-0">
          <h2 class="text-2xl font-bold ">Jodo menu</h2>
          <div class="pt-2">
            <?php
              set_query_var( 'bu', 'jodo1' );
              set_query_var( 'menuclass', '' );
              get_template_part( 'partials/bu', 'menu' );

              if (! is_user_logged_in()) :
                echo 'press this button to see member only content';
              endif;

              if ( current_user_can( 'edit_posts' )  ){
                set_query_var( 'bu', 'jodo2' );
                set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                get_template_part( 'partials/bu', 'menu' );
              };

              if ($option['eventadmin_manager']) {
                if ( current_user_can( 'edit_events' )  ) {
                  set_query_var( 'bu', 'buAdmin' );
                  set_query_var( 'menuclass', '' );  // 'bg-green-light' );
                  get_template_part( 'partials/bu', 'menu' );
                }
              }
            ?>
            <!-- <ul class="dummy li-py-1 li-px-2">
              <li>This is a dummy Menu</li>
              <li>What is Jodo?</li>
              <li>How to Join/Renew Membership </li>
              <li>Seminars: Details/Booking</li>
              <li>Gradings: Details/Booking</li>
              <li>Competitions: Details/Booking</li>
              <li>National Squad Training</li>
              <li>Coaching</li>
              <li>Dojos/Clubs</li>
              <li>Current Officers </li>
              <li>Contact Us</li>
              <li>Bu Documentation</li>
              <li>Insurance/Complaints</li>
              <li>Forum</li>
              <li>Dojo Admin</li>
              <li>Bu Officer Admin</li>
              <li>Competition Winners database</li>
              <li>Past Officers of the Bu</li>
              <li>Archive material</li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    <div id="csContainer" class=" bg-red-200 p-4 lg:min-h-full  <?php echo $csc; ?>" >
      <!-- small screens using tabs -->
      <div class="md:hidden">
        <div>
          <!-- post & menu tabbed selectors    -->
          <div class=" ">
            <ul id="cs-s" class="flex justify-around nav-tabs-front cs text-center">
              <li data-target="#cs-tab-1" class=" upshadow upborder-2 p-2 sm:py-2 md:py-4 ys:px-4 xs:px-8 cursor-pointer text-lg ys:text-xl xs:text-2xl font-bold active" >Recent Posts</li>
              <li data-target="#cs-tab-2" class=" upshadow upborder-2 p-2 sm:py-2 md:py-4 ys:px-4 sm:px-8 cursor-pointer text-lg ys:text-xl xs:text-2xl font-bold" >Central Services Menu</li>
            </ul>
          </div>

          <div class="tab-content border-t-2 border-red-500">
            <div id="cs-tab-1" class="tab-pane-front cs active">
              <div class="pt-2">
                <!-- <h2>Recent Posts</h2> -->
                <div class="">
                <!-- the above div is for the list of recent posts -->
                  <?php
                    set_query_var( 'bu', 'cs' );
                    set_query_var( 'count', '5' );
                    get_template_part( 'partials/bu', 'posts' );
                  ?>
                <!-- the following closing div is for the row of more post buttons -->
                </div>
              </div>
            </div>

            <div id="cs-tab-2" class="tab-pane-front cs">
              <nav id="" class="pt-4">
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
              </nav>
            </div>

          </div> <!-- tabbed content -->
        </div>
      </div>
      <!-- larger screen sizes -->
      <div class="hidden md:flex flex-row ">
        <div id="bu-posts-cs-lg" class="w-1/2 border-b md:border-b-0 md:border-r border-red-800 px-4">
          <div class="">
            <h2 class="text-2xl font-bold ">Recent Posts</h2>
            <div class="">
            <!-- the above div is for the list of recent posts -->
              <?php
                set_query_var( 'bu', 'cs' );
                set_query_var( 'count', '5' );
                get_template_part( 'partials/bu', 'posts' );
              ?>
            <!-- the following closing div is for the row of more post buttons -->
            </div>
          </div>
        </div>
        <div class="bu-actions cs w-full md:w-1/2 px-4 md:py-0">
          <h2 class="text-2xl font-bold ">Central Services menu</h2>
          <div class=" pt-2">
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

</div>


<!-- slick carousel -->
<!-- <div class="fade-carousel">
    <div><img src="<?php // bloginfo('template_directory') ?>/assets/dist/images/KENDO-3.jpg"></div>
    <div><img src="<?php // bloginfo('template_directory') ?>/assets/dist/images/Kendo-banner.jpg"></div>
    <div><img src="<?php // bloginfo('template_directory') ?>/assets/dist/images/16WKC-8.jpg"></div>
    <div><img src="<?php // bloginfo('template_directory') ?>/assets/dist/images/Kihaku2-1.jpg"></div>
</div> -->


<!-- screenwidth indicator -->
<div class="flex justify-between bg-green-300 ys:bg-yellow-300 xs:bg-gray-300 sm:bg-white md:bg-indigo-300 lg:bg-pink-300">
  <!-- <div> -->
    <!-- <p class="<?php // echo is_user_logged_in() ? 'hidden' : '' ?>">Login needed</p> -->
    <!-- <p class="p-4"><?php // echo is_user_logged_in() ? $usermeta : 'Login needed' ?></p> -->
  <!-- </div> -->
  <!-- <div> -->
    <!-- <h4 class="text-lg font-bold  p-4  mx-auto">Testing area will change colour with screen size</h4> -->
  <!-- </div> -->
</div>


<!-- comment area -->
<div class="bg-green-300 p-4 border-t-2 border-b-2 border-green-600">
<?php
/* enabled in Quick edit */
  //  comments_template();
?>
</div>


<!-- sidebar stuff -->
<!-- <div class="bg-blue-200 p-4">
  <h3 class=" ">Latest events</h3>
  <p>calendar or list these can be added here or via the sidebar</p>
</div> -->
<?php
get_footer();
