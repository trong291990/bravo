
function addLink(){var selection=window.getSelection(),pagelink='<br /><br /> Read more at: '+document.location.href,copytext=selection+pagelink,newdiv=document.createElement('div');newdiv.style.position='absolute';newdiv.style.left='-99999px';document.body.appendChild(newdiv);newdiv.innerHTML=copytext;selection.selectAllChildren(newdiv);window.setTimeout(function(){document.body.removeChild(newdiv);},100);}
document.addEventListener('copy',addLink);$(document).ready(function(){$('select').selectpicker();});function showMap(dom,locations,zoom){if(typeof google!=='undefined'){var map=new google.maps.Map(dom,{zoom:zoom,center:new google.maps.LatLng(locations[0].lat,locations[0].lng),mapTypeId:google.maps.MapTypeId.ROADMAP});var infowindow=new google.maps.InfoWindow();var marker,i;for(i=0;i<locations.length;i++){if((locations[i].lat!==null)&&(locations[i].lng!==null)){marker=new google.maps.Marker({position:new google.maps.LatLng(locations[i].lat,locations[i].lng),map:map,icon:"/frontend/images/common/map.png"});google.maps.event.addListener(marker,'click',(function(marker,i){return function(){infowindow.setContent(locations[i].name);infowindow.open(map,marker);};})(marker,i));}}}}
$('.tour-map-container').each(function(){var $_this=$(this);var _this=this;$.get($_this.data('url'),function(response){if(response.success){showMap(_this,response.places,9);}});});$('.booking-tour').on('click',function(){$('#booking-modal').modal('show');$('#booking-tour-id').val($(this).data('id'));});$('.datepicker').datepicker({format:'yyyy-mm-dd',autoclose:true});$('form').validate();$('.html5-editor').wysihtml5();function fixIntroHeight(){var h=$(window).height();var w=$(window).width();var introSize;if(w>=992){introSize=470;}else if(w>768){introSize=450;}else if(w>=680){introSize=w*60/100;}else if(w>320){introSize=w*80/100;}else{introSize=w-80;}
$('#intro_wrapper_cell').width($('#intro_wrapper_cell').parent().width());$('#intro').width(introSize);if(w>680){$('#intro').height(introSize);$('#intro_wrapper_cell').height(h);}}
function fixTabFeature(){var w=$(window).width();if(w<768){$('.feature-item').on('click',function(){$('.feature-item p').not($(this).find('p')).slideUp(500);$(this).find('p').slideDown(500);});}}
fixIntroHeight();$(window).resize(function(){fixIntroHeight();fixTabFeature();});$(window).on("orientationchange",function(event){fixIntroHeight();fixTabFeature();});$(document).ready(function(){fixIntroHeight();fixTabFeature();});