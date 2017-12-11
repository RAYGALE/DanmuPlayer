# DanmuPlayer

## HTML5 Bullet Screen Video Player

[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)     [![License](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)



**Danmmu Player is a lightweight bullet screen player, only 63KB.**

You can send bullet screen, adjust color, font and position

**Update Log**

>**Vision 4**

>

>1.use 1/10 second as time unit

>

>2.optimize bullet screen position

>

>3.improve perfomance

>

>4.fix bug

>- - -

>**Vision 3**

>

>1. control bullet screen number

>

>2. improve performance, reduce frame loss

>

>3. add video buffer and buffer effect

>

>4. reduce web font

>

>5. optimize bullet screen position, reduce overlap

>- - -

> **Vision 2**

>

> 1. seperated from videojs

>

> 2. change API

>

> 3. when there is a few bullet screen, those bullet screen will mainly shown on the top

>

> 4. you can add multiple players

>

> * If you want to use old version, please see OldEdition directory.



### Start



**1**. add js and css and Jquery



```html

<link rel="stylesheet" href="css/danmuplayer.css">

<script src="js/jquery-1.11.1.min.js"></script>

<script src="js/danmuplayer.js"></script>

```

---

**2**. create a div，set id=danmp



```html

<div id="danmup"></div>

```

---

**3**. use the created div to initialize DanmuPlayer



```javascript

$("#danmup").danmuplayer({

  src:"shsn.mp4",       //video src

  width:800,			//width

  height:445			//height

});

```

You can see the player and send bullet screen now.
However, the new bullet screen has not been sent to database, which will disappear after refresh.
Please see instruction below to see how to send bullet screen to database


###Advance

---

**4**. In above step, we use Jquery to create a player, then pass parameters(src, width, height). Actually, the method contains these parameters below. (all paramter are optional except video src)


```javascript

src: "shsn.mp4",    //src

height: 450,             //player height

width: 800,				//player width, minimum = 720

speed:20000,			//bullet screen speed，the shown value is the millisecond for bullet screen pass 672 pixel

sumTime:65535,				//video overall time(optional)

danmuList:{},				//bullet screen list

defaultColor:"#ffffff",   //bullet screen color

fontSizeSmall:16,			//small font size

FontSizeBig:24,				//large font size

opacity:"1",  			//bullet screen transparency

topBottonDanmuTime:6000,  //lifespan of top and bottom bullet screen

urlToGetDanmu:"",     //url to get bullet screen from backend

urlToPostDanmu:"" ,   //url to send bullet screen to backend

maxCountInScreen: 40,   //maximal number of bullet screen at the same time, priority for latest bullet screen

maxCountPerSec: 10      //maximal number of bullet screen every 1/10 second, priority for latest bullet screen

});

```

---

**5**. Introduce js object: danmu

danmu has these attributes：



```javascript

text: bullet screen content

color: bullet screen color

position: bullet screen position (0 for roll 1 for top 2 for bottom)

size: font size (0 for small 1 for large)

time: time for bullet screen appear (1/10 second as unit)

isnew: if the bullet screen has that attribute, it will be shown with a border

```



Example：

```javascript

var aDanmu={ text:"This is bullet screen" ,color:"white",size:1,position:0,time:2};

```

new bullet screen with border：

```javascript

var aDanmu={ text:"This is bullet screen" ,color:"white",size:1,position:1,time:2,isnew:1};

```







---

**6**. DanmuPlayer use ajax to communicate with backend



**method 1**


When DanmuPlayer is initialized in webpage, it will send GET request to backend url specified in urlToGetDanmu, the response from backend must be in the form: "['{danmu object1}', '{danmu object2}', ..., '{danmu objectn}']" (consistent with JSON) (there is no quotes in the outermost layer, each danmu object should be wraped with quotes, otherwise the respons will fail to parse)

When user send bullet screen, DanmuPlayer will send the new bullet screen to the url specified by urlToPostDanmu by POST request,
the request content should be consistent with JSON (string of danmu object)

there is a simple example in demo which use php to send and get bullet screen from backend.



**method 2**


use the code below to add bullet screen when initialize the player

```javascript

$('#danmp .danmu-div').danmu(addDanmu, danmu object or danmu array);

```

for example

```javascript

$("#danmup .danmu-div").danmu("addDanmu",[

   {text:"roll bullet" ,color:"white",size:1,position:0,time:2}

  ,{text:"top bullet" ,color:"yellow" ,size:1,position:1,time:3}

  ,{text:"bottom bullet" , color:"red" ,size:1,position:2,time:3}

])

```

DanmuPlayer has a class called danmu-div (this is a Jquery plugin container, please see [jQuery.danmu.js](http://github.com/chiruom/danmu))



---

**7**. DanmuPlayer contains a HTML5 video tag, all HTML5 video API can be used in DanmuPlayer, you can change the video time, the bullet screen stream will keep synchronous

---


**8**. You can add multiple players in one page, but all players will have same keyboard shortcuts, so the keyboard event may not work



---

If you only need to use bullet screen in other place except player, please see [jQuery.Danmu.js](http://github.com/chiruom/danmu)

### LICENSE

You can use this project in any form, but please add two lines below.

```html

DanmuPlayer (//github.com/chiruom/danmuplayer/) - Licensed under the MIT license
BulletPlayer (//github.com/ScienisTmiaoT/BulletPlayer) - Licensed under the MIT license

```



