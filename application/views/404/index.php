<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> 404 Page</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,900'>

      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /*--------------------
Body
--------------------*/
html,
body {
  height: 100%;
  background: linear-gradient(0, #202239, #8595AC);
}

::selection {
  background: #CDD4DE;
}

/*--------------------
Page
--------------------*/
.page {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  height: 100%;
  z-index: 1;
  font-family: Roboto, sans-serif;
  background: #0D0C1E;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

/*--------------------
Header
--------------------*/
header {
  padding: 30px;
}
header .logo {
  margin: 0 auto;
  text-align: center;
  margin-bottom: -17px;
}
header .logo svg {
  width: 61px;
  height: 14px;
}
header nav {
  cursor: pointer;
  width: 18px;
  height: 18px;
  position: relative;
  float: left;
}
header nav::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: #565c73;
  border-radius: 2px;
  box-shadow: 0 5px 0 #565c73, 0 10px 0 #565c73;
}
header .search {
  float: right;
  cursor: pointer;
}
header .search svg {
  width: 16px;
  height: 16px;
}

/*--------------------
Content
--------------------*/
.content {
  text-align: center;
  padding-top: 118px;
  color: #cc2c1a;
}
.content h1 {
  font-weight: 900;
  font-size: 165px;
  line-height: 1;
  margin-bottom: -10px;
  opacity: 0.6;
}
.content h2 {
  font-weight: 700;
  font-size: 34px;
  margin-bottom: 6px;
  opacity: 0.9;
}
.content p {
  font-weight: 300;
  font-size: 14px;
  opacity: 0.7;
  margin-bottom: 140px;
}
.content a {
  display: inline-block;
  font-weight: 300;
  font-size: 12px;
  text-transform: uppercase;
  border: 1px solid #CDD4DE;
  padding: 8px 14px;
  border-radius: 4px;
  opacity: 0.4;
  text-decoration: none;
    cursor: pointer;
    color: #fff;
    background-color: #040404;
}

/*--------------------
Image
--------------------*/
img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: auto;
  z-index: -1;
  transform: scale(1.1);
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <!--
Follow me on
Dribbble: https://dribbble.com/supahfunk
Twitter: https://twitter.com/supahfunk
Codepen: http://codepen.io/supah/

Picture by Ales Krivec https://unsplash.com/photos/ZSI-wuA49T0
-->

<div class="page">
  <header>
    <div class="logo">Trường Đại Học Quảng Nam</div>
   
  </header>
  <div class="content">
    <h1>404</h1>
    <h2>Không tìm thấy kết quả</h2>
    <p>Chúng tôi cố gắng thực hiện việc này nhưng không thành công</p>
    <a href="/trang-chu.html">Back to home</a>
  </div>
    <img src="http://www.supah.it/dribbble/008/008.jpg" />
</div>

<!-- Logo -->
<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
  <symbol id="logo-dailyui" viewBox="0 0 61 14">
<g>
	<g>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#525C7C" d="M29.117,0.98h-1.846l-2.407,11.551h6.045l0.334-1.62h-4.198
			L29.117,0.98z M40.132,0.98l-3.365,5.285l-1.2-5.285h-1.885l1.854,7.182l-0.926,4.369h1.854l0.889-4.337l4.853-7.214H40.132z
			 M8.529,2.125C7.771,1.362,6.688,0.98,5.282,0.98H2.407L0,12.531h3.124c1.339,0,2.505-0.286,3.497-0.861
			c0.992-0.573,1.748-1.392,2.267-2.457c0.52-1.063,0.779-2.309,0.779-3.737C9.667,4.006,9.288,2.889,8.529,2.125z M7.201,8.351
			c-0.366,0.821-0.892,1.46-1.577,1.913c-0.686,0.452-1.488,0.679-2.407,0.679H2.166L3.934,2.56h1.137
			c0.873,0,1.537,0.254,1.994,0.762S7.751,4.57,7.751,5.539C7.751,6.592,7.567,7.53,7.201,8.351z M20.128,12.531h1.831L24.382,0.98
			H22.55L20.128,12.531z M15.314,0.964l-6.1,11.567h1.979l1.627-3.208H16.6l0.319,3.208h1.823L17.448,0.964H15.314z M13.632,7.68
			l1.339-2.655c0.452-0.885,0.821-1.693,1.106-2.425c0,0.274,0.015,0.642,0.043,1.102c0.029,0.461,0.147,1.787,0.354,3.979H13.632z
			 M44.33,0l-2.662,14h16.67L61,0H44.33z M52.584,8.584c-0.265,1.279-0.755,2.229-1.473,2.849c-0.719,0.62-1.67,0.931-2.854,0.931
			c-1.025,0-1.816-0.254-2.376-0.762c-0.561-0.508-0.839-1.236-0.839-2.19c0-0.397,0.047-0.805,0.141-1.222l1.367-6.473h1.679
			l-1.359,6.501c-0.1,0.422-0.149,0.801-0.149,1.136c0,0.488,0.141,0.867,0.422,1.139c0.28,0.271,0.707,0.405,1.277,0.405
			c0.685,0,1.229-0.192,1.63-0.577c0.401-0.386,0.694-1.013,0.879-1.88l1.408-6.724h1.68L52.584,8.584z M56.034,12.221h-1.665
			l2.203-10.504h1.664L56.034,12.221z"/>
	</g>
</g>
  </symbol>
  <symbol id="ico-search">
    <path fill-rule="evenodd" clip-rule="evenodd" fill="#4F5269" d="M14.769,14.769c-0.342,0.342-0.896,0.342-1.237,0l-3.756-3.756
	c-2.399,1.793-5.801,1.623-7.981-0.557c-2.392-2.392-2.392-6.271,0-8.663s6.271-2.392,8.662,0c2.18,2.181,2.35,5.583,0.557,7.981
	l3.756,3.756C15.11,13.873,15.11,14.427,14.769,14.769z M9.219,3.032c-1.709-1.709-4.479-1.709-6.188,0
	c-1.708,1.708-1.708,4.479,0,6.188c1.709,1.708,4.479,1.708,6.188,0C10.927,7.51,10.927,4.74,9.219,3.032z"/>
  </symbol>
</svg>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- <script src="js/index.js"></script> -->
<script  type="text/javascript" charset="utf-8" async defer>
  var lFollowX = 0,
    lFollowY = 0,
    x = 0,
    y = 0,
    friction = 1 / 30;

function animate() {
  x += (lFollowX - x) * friction;
  y += (lFollowY - y) * friction;
  
  translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

  $('img').css({
    '-webit-transform': translate,
    '-moz-transform': translate,
    'transform': translate
  });

  window.requestAnimationFrame(animate);
}

$(window).on('mousemove click', function(e) {

  var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
  var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
  lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
  lFollowY = (10 * lMouseY) / 100;

});

animate();
</script>
</body>
</html>
