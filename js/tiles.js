function debounce(a,b){var c;return function(){function d(){a(),c=null}c&&clearTimeout(c),c=setTimeout(d,b||100)}}$(window).load(function(){$(function(){function a(a){var b=a;b.find(".front").css("background-image","url("+b.data("img")+")")}function b(a){var b=(f-a.height())/2;h.one("arrangeComplete",function(){$("html, body").animate({scrollTop:a.offset().top-b},900)})}var c,d=$("#searcher_wrap"),e=$("#searcher"),f=$(window).height(),g=$("#filter"),h=$(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{columnWidth:".grid-sizer"},filter:":not(.title-card)"}),i=$(".quicksearch").keyup(debounce(function(){c=new RegExp(i.val(),"gi"),h.isotope({filter:function(){var a=$(this),b=c?a.text().match(c):!0;return b&&a.is(":not(.title-card)")}})},200));if($(".featured").each(function(b,c){var d=$(c);a(d)}),h.on("click",".grid-item",function(){var c=$(this),d=c.data("name"),e=d&&"#name="+d;c.hasClass("open")?c.removeClass("open"):($(".grid-item").removeClass("open"),c.addClass("open"),a(c),b(c),window.location.hash=e),h.isotope()}),g.on("click","button",function(){var a=$(this).attr("data-filter");h.isotope({filter:a})}),$("#clear").on("click",function(a){a.preventDefault(),$("select").prop("selectedIndex",0),$(".grid-item").removeClass("open"),g.removeClass("select_active"),window.location.hash="",h.isotope({filter:":not(.title-card)"})}),g.on("change","select",function(){var a=this.value;g.addClass("select_active"),a=a,h.isotope({filter:a})}),g.each(function(a,b){var c=$(b);c.on("click","button",function(){c.find(".is-checked").removeClass("is-checked"),$(this).addClass("is-checked")})}),$("#searcher").on("click",function(a){a.preventDefault(),d.find("input").focus(),d.toggleClass("active_search"),e.hasClass("is-checked")&&(d.find("input").val(""),$(".quicksearch").keyup()),e.toggleClass("is-checked")}),$(document).on("keyup",function(a){27==a.keyCode&&$("#searcher").hasClass("is-checked")&&(d.toggleClass("active_search"),e.toggleClass("is-checked"),d.find("input").val(""))}),$(document).keypress(function(a){13==a.which&&$(a.target).trigger("click")}),location.hash.match(/^#name/)){var j=location.hash.substring(6),k=$('*[data-name="'+j+'"]');k.toggleClass("open"),h.isotope(),a(k),b(k)}$(".tags").on("click","a",function(a){var b=$(this),c=a;$text=b.text(),c.preventDefault(),c.stopPropagation(),h.isotope({filter:function(){return $text?$(this).find(".tags").text().match($text):!0}})})})});