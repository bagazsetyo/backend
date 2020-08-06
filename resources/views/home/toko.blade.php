
<link rel="stylesheet" type="text/css" href="{{asset('css/toko.css')}}">
<div class="wraper">
        <div class="iso-nav">
            <ul>
            	<div class="active">
                <li class="active" data-filter="*">All Items</li>
                <li data-filter=".web">Web Design</li>
                <li data-filter=".graphic">Graphic Design</li>
                <li data-filter=".photo">Photography</li>
                </div>
            </ul>
        </div>
        <div class="main-iso">
            <div class="item web">
                <img src="{{asset('img/code.png')}}" alt=""> 
            </div>
            <div class="item graphic">
                <img src="{{asset('img/code.png')}}" alt=""> 
            </div>
            <div class="item photo">
                <img src="{{asset('img/code.png')}}" alt=""> 
            </div>
            <div class="item">
                <img src="{{asset('img/design.png')}}" alt="">
            </div>
            <div class="item star">
                <img src="{{asset('img/launch.png')}}" alt="">
            </div>
            <div class="item web">
                <img src="{{asset('img/design.png')}}" alt="">
            </div>
            <div class="item web">
                <img src="{{asset('img/code.png')}}" alt=""> 
            </div>
            <div class="item graphic">
                <img src="{{asset('img/code.png')}}" alt=""> 
            </div>
            <div class="item photo">
                <img src="{{asset('img/design.png')}}" alt="">
            </div>
        </div>
    </div>
    
    
<!--    Javascript files are here... -->
<!--Jquery CDN -->
<script src="{{asset('js/jquery-3.1.1.slim.min.js')}}"></script><!--isotope here...-->
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<!--Custom Js file here ... -->
<script>
  $('.main-iso').isotope({
  itemSelector: '.item',
  layoutMode: 'fitRows',
  sortDescending: true
});
// Isotope click function
$('.iso-nav ul li').click(function(){
  $('.iso-nav ul li').removeClass('active');
  $(this).addClass('active');

  var selector = $(this).attr('data-filter');
  $('.main-iso').isotope({
    filter: selector
  });
  return false;
});
</script>
