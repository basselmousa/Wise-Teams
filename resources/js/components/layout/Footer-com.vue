<template>
    <div class="Wave-Footer">
        <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgTop">
                <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')">

                </div>
            </div>
            <div class="waveWrapperInner bgMiddle">
                <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
            </div>
            <div class="waveWrapperInner bgBottom">
                <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
            </div>
            <div class="Cover-Data ">
                <slot></slot>
            </div>
        </div>
</div>

</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>
.Wave-Footer
{
    position: relative;
}
@keyframes move_wave {
    0% {
        transform: translateX(0) translateZ(0) scaleY(1)
    }
    50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55)
    }
    100% {
        transform: translateX(-50%) translateZ(0) scaleY(1)
    }
}
.waveWrapper {
    overflow: hidden;
    margin: auto;
}
.waveWrapperInner {
    position: absolute;
    width: 100%;
    overflow: hidden;
    height:650px;
    bottom: -1px;
    background-image: linear-gradient(to top, #723BE4 20%, #3366E9 80%);
}
.bgTop {
    z-index: 15;
    opacity: 0.5;
}
.bgMiddle {
    z-index: 10;
    opacity: 0.75;
}
.bgBottom {
    z-index: 5;
}
.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}
.waveTop {
    background-size: 50% 100px;
}
.waveAnimation .waveTop {
    animation: move-wave 3s;
    -webkit-animation: move-wave 3s;
    -webkit-animation-delay: 1s;
    animation-delay: 1s;
}
.waveMiddle {
    background-size: 50% 120px;
}
.waveAnimation .waveMiddle {
    animation: move_wave 10s linear infinite;
}
.waveBottom {
    background-size: 50% 100px;
}
.waveAnimation .waveBottom {
    animation: move_wave 15s linear infinite;
}
.Cover-Data{
    z-index: 100000;
    color: #fff;
    position: relative;
    top:-200px;
    transform: rotateX(180deg);
    width:100%;
    margin-top: 300px;
}
.Cover-Data h1 {
    text-transform: uppercase;
    font-style: italic;
    font-weight: 500;
}
.Cover-Data p {
    text-transform:capitalize;
}
.form-group
{
    margin-top: 20px;
    font-style:italic;
}
.form-control
{
    margin-top: 10px;
}
button
{
    font-weight: 600;
    font-size:16px;
    color: #723BE4;
    background-color: white;
}
button:hover
{
    background-color: #723BE4;
    color: white;

}
.Brand h1
{
    font-style: italic;
    text-transform: uppercase;
    font-size: 100px;
}


</style>
