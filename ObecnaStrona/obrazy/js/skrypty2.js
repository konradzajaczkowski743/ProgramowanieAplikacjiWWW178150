<div id="animacjaTestowa1" class="test-block">Kliknij aby powiększyć</div>

<script>
    $("#animacjaTestowa1").on("click", function(){
    $(this).animate({
        width: "500px",
        opacity: 0.4,
        fontSize: "3em",
        borderWidth: "10px"
    }, 1500);
});
</script>

<p>tekst losowy na stronie 5 </p>
<div id="animacjaTestowa2" class="test-block"> Najedź kursorem aby powiększyć</div>
<script>
    $("#animacjaTestowa2").on({
    mouseover: function() {
    $(this).stop().animate({
    width: 300,
    height: 100,
    fontSize: "2em"
}, 800);
},
    mouseout: function() {
    $(this).stop().animate({
    width: 200,
    height: 50,
    fontSize: "1em"
}, 800);
}
});
</script>
<div></div>
<div> animacja 3</div>
<div id="animacjaTestowa3" class="test-block">Klikaj do woli</div>
<script>
    $("#animacjaTestowa3").on("click", function(){
    if (!$(this).is(":animated")){
    $(this).animate({
    width: "+=150",
    height: "+=50",
    opacity: "-=0.3"
}, 3000);
}
});