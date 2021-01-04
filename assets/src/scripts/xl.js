document.addEventListener('DOMContentLoaded', function (e) {


  // store tabs variables
  const xlTabs = document.querySelector(".nav-tabs-xl-right"),
      xlLiTabs = xlTabs.querySelectorAll('li'),
      xlPanes = document.querySelectorAll('.tab-pane-xl-right');

  xlTabs.addEventListener("click", function (xl){
    // console.log(xl);

    if (xl.target.tagName == "LI"){
      const targetTab = xl.target.dataset.target;
      const targetPane = document.querySelector(targetTab);
      // console.log('targetPane: ',targetPane);
      xlPanes.forEach(function(pane){
        if(pane == targetPane){
          pane.classList.add('active');
        }else{
          pane.classList.remove('active');
        }
      });
      // console.log('targetTab: ',targetTab);
      xlLiTabs.forEach(function(tab){
        // console.log('tab: ',tab);
        if(tab.dataset.target == targetTab){
          tab.classList.add('active');
        }else{
          tab.classList.remove('active');
        }
      });
    }
  });

});
