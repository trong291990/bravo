
function fixIntroHeight() {
   var h =  $( window ).height();
   var w =  $( window ).width();
   var introSize;
   if(w >= 992){
       introSize = 470;
   }else if(w >768){
       introSize = 450;
   }else if(w >=680){
       introSize = w*60/100;
   }else if(w> 320){
       introSize = w*80/100;
   }else {
       introSize = w - 80;
   }
   $('#intro_wrapper_cell').width( $('#intro_wrapper_cell').parent().width());
   $('#intro').width(introSize);
   if(w >680){
       $('#intro').height(introSize);
       $('#intro_wrapper_cell').height(h);
   }
}
fixIntroHeight();
$( window ).resize(function() {
    fixIntroHeight();
});
$( window ).on( "orientationchange", function( event ) {
   fixIntroHeight();
});
$(document).ready(function(){
    fixIntroHeight();
    aler('efef');
});


