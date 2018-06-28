function debounce(a,b){var c;return function(){function d(){a(),c=null}c&&clearTimeout(c),c=setTimeout(d,b||100)}}function getFilterValue(a){var b="",c=!1;return a.addClass("select_active"),$(".labelToggle > select").each(function(){".arts-sci-arts, .arts-sci-humanities, .arts-sci-natural-sci, .arts-sci-social-sci, .arts-sci-all-divisions"==$(this).val()?c=!0:b+=$(this).val()}),filterValueReturn=c?".arts-sci-arts"+b+", .arts-sci-humanities"+b+", .arts-sci-natural-sci"+b+", .arts-sci-social-sci"+b+", .arts-sci-all-divisions"+b:b,filterValueReturn}$(window).load(function(){function a(a){var b=a;b.find(".front").css("background-image","url("+b.data("img")+")")}function b(a){var b=(h-a.height())/2;$mobile=i<768?50:b,k.one("arrangeComplete",function(){$("html, body").animate({scrollTop:a.offset().top-$mobile},900)})}function c(a){var b=a.find(".full-bio"),c=a.find(".flipper"),d=!1===b.attr("aria-hidden",!1),e=!0!==c.attr("aria-expanded",!0);b.attr("aria-hidden",d),c.attr("aria-expanded",e)}var d,e=new LazyLoad({elements_selector:".lazy"}),f=$("#searcher_wrap"),g=$("#searcher"),h=$(window).height(),i=$(window).width(),j=$("#filter"),k=$(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{columnWidth:".grid-sizer"},filter:".2018:not(.title-card)"});k.one("arrangeComplete",function(){$("#overlay").fadeOut(300,function(){$(this).remove()})}),k.isotope();var l=$(".quicksearch").keyup(debounce(function(){d=new RegExp(l.val(),"gi");var a=getFilterValue(j)?getFilterValue(j):"*";k.isotope({filter:function(){var b=$(this);return(!d||b.text().match(d))&&b.is(":not(.title-card)")&&b.is(a)}})},200));if($(".featured").each(function(b,c){a($(c))}),k.on("click",".grid-item",function(){var d=$(this),e=d.data("name"),f=e&&"#name="+e;d.hasClass("open")||d.hasClass("special")?(d.removeClass("open"),c(d)):($(".grid-item").removeClass("open"),d.addClass("open"),a(d),b(d),window.location.hash=f,c(d)),k.isotope()}),$("#clear").on("click",function(a){a.preventDefault(),$("select").prop("selectedIndex",0),$(".grid-item").removeClass("open"),j.removeClass("select_active"),j.find("li").removeClass("labelToggle"),window.location.hash="",k.isotope({filter:":not(.title-card)"})}),j.on("change","select",function(){""===this.value?$(this).parent("li").removeClass("labelToggle"):$(this).parent("li").addClass("labelToggle");var a=new RegExp($(".quicksearch").val(),"gi"),b=getFilterValue(j)?getFilterValue(j):"*";k.isotope({filter:function(){var c=$(this);return(!a||c.text().match(a))&&c.is(":not(.title-card)")&&c.is(b)}})}),j.each(function(a,b){var c=$(b);c.on("click","button",function(){c.find(".is-checked").removeClass("is-checked"),$(this).addClass("is-checked")})}),$("#searcher").on("click",function(a){a.preventDefault(),f.find("input").focus(),f.toggleClass("active_search"),g.hasClass("is-checked")&&(f.find("input").val(""),$(".quicksearch").keyup()),g.toggleClass("is-checked")}),$(document).on("keyup",function(a){27==a.keyCode&&$("#searcher").hasClass("is-checked")&&(f.toggleClass("active_search"),g.toggleClass("is-checked"),f.find("input").val(""))}),$(document).keypress(function(a){13==a.which&&$(a.target).trigger("click")}),location.hash.match(/^#name/)){var m=location.hash.substring(6),n=$('*[data-name="'+m+'"]');n.toggleClass("open"),k.isotope(),a(n),b(n),c(n)}$(".tags").on("click","a",function(a){var b=$(this),c=a;$text=b.text(),c.preventDefault(),c.stopPropagation(),j.addClass("select_active"),k.isotope({filter:function(){return!$text||$(this).find(".tags").text().match($text)}})}),$.ajax({url:ajaxpagination.ajaxurl,type:"post",dataType:"html",data:{action:"ajax_pagination",currentyear:"2018"},success:function(a){$content=$(a),k.append($content).isotope("appended",$content),e.update()}})}),"onpropertychange"in document&&window.matchMedia&&$("html").addClass("ie10");