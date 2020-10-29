<template>
    <div class="Motivation">
        <div class="container" style="z-index: 100000">
            <div class="MOT">
                <h1 style="z-index: 1000" class=" text-center">Motivation</h1>
                <p><i class="fas fa-quote-left"></i></p>
                <p class="text-center" style="font-size: 18px">Live as if you were to die tomorrow. Learn as if you were to live forever</p>
                <p class="text-right"><i class="fas fa-quote-right"></i></p>
            </div>
        </div>
        <div class="Over-layer">

        </div>
    </div>

</template>

<script>
export default {
    created() {
        var velocity = 0.5;

        function update(){
            var pos = $(window).scrollTop();
            $('.Motivation').each(function() {
                var $element = $(this);
                var height = $element.height()-18;
                $(this).css('backgroundPosition', '50% ' + Math.round((height - pos) * velocity) + 'px');
            });
        };

        $(window).bind('scroll', update);
    },
    name: "Motivation"
}
</script>

<style scoped>
.Motivation
{
    width: 100%;
    height: 200px;
    background-image: url("/images/mot.jpg");
    background-size: cover;
    background-position:center;
    background-clip: border-box;
    position: relative;
    margin-top: 200px;
}
.Over-layer
{
    position: absolute;
    background-color: #723BE4;
    width: 100%;
    height: 100%;
    opacity: .5;
    top:0px;
    z-index: 0;
}
.Motivation .container
{
    color: white;
    position:relative;
    padding: 20px 5px;
}

</style>
