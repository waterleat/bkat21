document.addEventListener('DOMContentLoaded', function (e) {
  console.log('dom loaded');


  const kendoBtn = document.getElementById('kendoBtn'),
    iaidoBtn = document.getElementById('iaidoBtn'),
    jodoBtn = document.getElementById('jodoBtn'),
    csBtn = document.getElementById('csBtn'),
    startupContainer = document.getElementById('startupContainer'),
    kendoContainer = document.getElementById('kendoContainer'),
    iaidoContainer = document.getElementById('iaidoContainer'),
    jodoContainer = document.getElementById('jodoContainer'),
    csContainer = document.getElementById('csContainer');

  kendoBtn.addEventListener('click', () => {
    console.log('kendo button');

    kendoContainer.classList.remove('hidden');

    startupContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  iaidoBtn.addEventListener('click', () => {
    console.log('iaido button');
    iaidoContainer.classList.remove('hidden');

    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  jodoBtn.addEventListener('click', () => {
    jodoContainer.classList.remove('hidden');

    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  csBtn.addEventListener('click', () => {
    csContainer.classList.remove('hidden');

    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
  });

// // append more posts
//   const postdivcs = document.getElementById('my-postscs'),
//       loadmorecs = document.getElementById('loadmorecs');
//
//   const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";
//   // var page = 2;
//
//   loadmorecs.addEventListener('click',(c) => {
//     var page = loadmorecs.dataset.page;
//       console.log('pressed</br>',page);
//     // console.log(page);
//     // try {
//     //   const fetchResult =
//       fetch(ajaxurl, {
//         method: "POST",
//         body: params
//       })
//       .then(result => result.json())
//       .catch(error => {
//
//       })
//       .then(response => {
//         console.log(response.message);
//         // postdivcs.innerHTML = response.message;
//       })
//     // } catch (e) {
//     //
//     // } finally {
//     //
//     // }
//


// kendo tabs
  const
    skTabs = document.getElementById("k-s"),
    skLiTabs = skTabs.querySelectorAll("li"),
    kPanes = document.querySelectorAll(".tab-pane-front.kendo");

  skTabs.addEventListener("click", function(sk) {
    if (sk.target.tagName == "LI"){
      const targetTab = sk.target.dataset.target;
      const targetPane = document.querySelector(targetTab);
      kPanes.forEach(function(pane){
        if(pane == targetPane){
          pane.classList.add('active');
        }else{
          pane.classList.remove('active');
        }
      });
      skLiTabs.forEach(function(tab){
        if(tab.dataset.target == targetTab){
          tab.classList.add('active');
        }else{
          tab.classList.remove('active');
        }
      });
    }
  });

  // iaido tabs
    const
      siTabs = document.getElementById("i-s"),
      siLiTabs = siTabs.querySelectorAll("li"),
      iPanes = document.querySelectorAll(".tab-pane-front.iaido");

    siTabs.addEventListener("click", function(si) {
      if (si.target.tagName == "LI"){
        const targetTab = si.target.dataset.target;
        const targetPane = document.querySelector(targetTab);
        iPanes.forEach(function(pane){
          if(pane == targetPane){
            pane.classList.add('active');
          }else{
            pane.classList.remove('active');
          }
        });
        siLiTabs.forEach(function(tab){
          if(tab.dataset.target == targetTab){
            tab.classList.add('active');
          }else{
            tab.classList.remove('active');
          }
        });
      }
    });

    // jodo tabs
    const
      sjTabs = document.getElementById('j-s'),
      sjLiTabs = sjTabs.querySelectorAll("li"),
      jPanes = document.querySelectorAll(".tab-pane-front.jodo");

    sjTabs.addEventListener("click", function(sj) {
      if (sj.target.tagName == "LI"){
        const targetTab = sj.target.dataset.target;
        const targetPane = document.querySelector(targetTab);
        jPanes.forEach(function(pane){
          if(pane == targetPane){
            pane.classList.add('active');
          }else{
            pane.classList.remove('active');
          }
        });
        sjLiTabs.forEach(function(tab){
          if(tab.dataset.target == targetTab){
            tab.classList.add('active');
          }else{
            tab.classList.remove('active');
          }
        });
      }
    });

    // central services tabs
    const
      scsTabs = document.getElementById('cs-s'),
      scsLiTabs = scsTabs.querySelectorAll("li"),
      csPanes = document.querySelectorAll(".tab-pane-front.cs");

    scsTabs.addEventListener("click", function(scs) {
      console.log('click: ', scs);
      if (scs.target.tagName == "LI"){
        const targetTab = scs.target.dataset.target;
        const targetPane = document.querySelector(targetTab);
        csPanes.forEach(function(pane){
          if(pane == targetPane){
            pane.classList.add('active');
          }else{
            pane.classList.remove('active');
          }
        });
        scsLiTabs.forEach(function(tab){
          if(tab.dataset.target == targetTab){
            tab.classList.add('active');
          }else{
            tab.classList.remove('active');
          }
        });
      }
    });











  // function xlSwitchTab(xlevent) {
  //   xlevent.preventDefault();
  //   // console.log('xlSwitchTab')
  //
  //   var xlclickedTab = xlevent.currentTarget;
  //   console.log(xlclickedTab);
  //
  //   document.querySelector("ul.nav-tabs-xl-right li.active").classList.remove("active");
  //   document.querySelector(".tab-pane-xl-right.active").classList.remove("active");
  //
  //   var anchor = xlevent.target;
  //   console.log(anchor.nodeName);
    // if ( anchor.nodeName == 'H2' ){
    //   anchor = anchor.parent;
    //   console.log(anchor.nodeName);
    // }
//     var activePaneID = anchor.getAttribute("href");
// console.log(activePaneID);
//     xlclickedTab.classList.add("active");
//     document.querySelector(activePaneID).classList.add("active");
//
//   };







});
// const postdiv = document.getElementById('my-posts');
// const    loadmore = document.getElementById('loadmore');
//
// var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
// var page = 2;
//
// loadmore.addEventListener('click',() => {
//   console.log('pressed');
//   // var data = {
//   //     'action': 'load_posts_by_ajax',
//   //     'page': page,
//   //     'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
//   // };
//   // post(ajaxurl, data, function((response) {
//   //     postdiv.append(response);
//   var para = document.createElement("P");
//     var t = document.createTextNode("This is a paragraph.");
//     para.appendChild(t);
//   postdiv.appendChild(para);
//       // page++;
//   });
// });




// var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
// var page = 2;
// jQuery(function($) {
//     $('body').on('click', '.loadmore', function() {
//         var data = {
//             'action': 'load_posts_by_ajax',
//             'page': page,
//             'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
//         };
//
//         $.post(ajaxurl, data, function(response) {
//             $('.my-posts').append(response);
//             page++;
//         });
//     });
// });



// });
// function sticky_relocate() {
//     var window_top = $(window).scrollTop();
//     var div_top = $('#sticky-anchor').offset().top;
//     if (window_top > div_top)
//         $('#sticky-element').addClass('sticky');
//     else
//         $('#sticky-element').removeClass('sticky');
// }
//
// $(function() {
//     $(window).scroll(sticky_relocate);
//     sticky_relocate();
// });
