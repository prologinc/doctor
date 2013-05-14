<html>
    <head>

<style>
/* required to avoid jumping */
#commentWrapper { 
  float:right;
  
  margin-left: 35px;
  width: 280px;
}

#comments {
  position: absolute;
  top: 0;
  /* just used to show how to include the margin in the effect */
  margin-top: 20px;
  border-top: 1px solid purple;
  padding-top: 19px;
  width:300px;
}

#comment.fixed {
  position: fixed;
  top: 0;
}

.float{
    top: 30;
    float:right;
    position:fixed;
    height:600px;
    width:150px;
    border:solid blue thin;
}
</style>

</head><body>
<div id="comments">
  


Upon firing up Firebug I can see that once the scrollbar gets to the point where the basket is at the top of the page, the basket has a class applied to it which gives it a position: fixed – which explains why it holds still while I continue to scroll down.
Other ways to do it

Like I said, I’ve seen this effect before, for example on Simon Willison’s web site (see the comments form) (one of the speakers for my Full Frontal conference).

When I scroll down the page, the comments form can sometimes “play catchup” with the scrolling position, because I suspect the top position is being recalculated (though I’ve not checked his code to be sure or not).

So I’ve taken the style of Simon’s site for the example and added the jQuery we need to make this a nice smooth effect.
Caveat: IE6

Since we’re solving this effect using position: fixed, IE6 doesn’t support this CSS property. I’m not saying that IE6 doesn’t matter, but I’m suggesting that this effect isn’t a requirement to be able to interact with the site properly, so if IE6 users don’t see this extra effect, I’m okay with this. As I explained in the screencast, you’ll need to decide this yourself, check your site’s demographic, whether it’s a personal project, etc.
Markup & CSS

The trick really happens in the CSS here and being able to flip back and forth between absolute positioning and fixed positioning. So I’ve prepared the layout as such. You guys and gals being designer and front-end types will know how you’ll want to style the elements.

One trick I did find was that I had to wrap the element that would receive position: fixed in a wrapper with position: absolute so that the left position was again the wrapper rather than the body element. The effect of not having the wrapper, meant that when I switched fixed on the element, it jumped to the left by the amount of padding and margin set on the body element.

I’ve simplified the markup form the live example
Upon firing up Firebug I can see that once the scrollbar gets to the point where the basket is at the top of the page, the basket has a class applied to it which gives it a position: fixed – which explains why it holds still while I continue to scroll down.
Other ways to do it

Like I said, I’ve seen this effect before, for example on Simon Willison’s web site (see the comments form) (one of the speakers for my Full Frontal conference).

When I scroll down the page, the comments form can sometimes “play catchup” with the scrolling position, because I suspect the top position is being recalculated (though I’ve not checked his code to be sure or not).

So I’ve taken the style of Simon’s site for the example and added the jQuery we need to make this a nice smooth effect.
Caveat: IE6

Since we’re solving this effect using position: fixed, IE6 doesn’t support this CSS property. I’m not saying that IE6 doesn’t matter, but I’m suggesting that this effect isn’t a requirement to be able to interact with the site properly, so if IE6 users don’t see this extra effect, I’m okay with this. As I explained in the screencast, you’ll need to decide this yourself, check your site’s demographic, whether it’s a personal project, etc.
Markup & CSS

The trick really happens in the CSS here and being able to flip back and forth between absolute positioning and fixed positioning. So I’ve prepared the layout as such. You guys and gals being designer and front-end types will know how you’ll want to style the elements.

One trick I did find was that I had to wrap the element that would receive position: fixed in a wrapper with position: absolute so that the left position was again the wrapper rather than the body element. The effect of not having the wrapper, meant that when I switched fixed on the element, it jumped to the left by the amount of padding and margin set on the body element.

I’ve simplified the markup form the live example
Upon firing up Firebug I can see that once the scrollbar gets to the point where the basket is at the top of the page, the basket has a class applied to it which gives it a position: fixed – which explains why it holds still while I continue to scroll down.
Other ways to do it

Like I said, I’ve seen this effect before, for example on Simon Willison’s web site (see the comments form) (one of the speakers for my Full Frontal conference).

When I scroll down the page, the comments form can sometimes “play catchup” with the scrolling position, because I suspect the top position is being recalculated (though I’ve not checked his code to be sure or not).

So I’ve taken the style of Simon’s site for the example and added the jQuery we need to make this a nice smooth effect.
Caveat: IE6

Since we’re solving this effect using position: fixed, IE6 doesn’t support this CSS property. I’m not saying that IE6 doesn’t matter, but I’m suggesting that this effect isn’t a requirement to be able to interact with the site properly, so if IE6 users don’t see this extra effect, I’m okay with this. As I explained in the screencast, you’ll need to decide this yourself, check your site’s demographic, whether it’s a personal project, etc.
Markup & CSS

The trick really happens in the CSS here and being able to flip back and forth between absolute positioning and fixed positioning. So I’ve prepared the layout as such. You guys and gals being designer and front-end types will know how you’ll want to style the elements.

One trick I did find was that I had to wrap the element that would receive position: fixed in a wrapper with position: absolute so that the left position was again the wrapper rather than the body element. The effect of not having the wrapper, meant that when I switched fixed on the element, it jumped to the left by the amount of padding and margin set on the body element.

I’ve simplified the markup form the live example
   
</div>
<div id="commentWrapper">

<div class="float">
</div>
    </div>
</body>
</html>