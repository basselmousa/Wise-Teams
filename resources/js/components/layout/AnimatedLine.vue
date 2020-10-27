<template>
    <div class="Animated-line">
        <p class="Loader"><span></span></p>
    </div>

</template>

<script>
export default {
name: "AnimatedLine"
}
</script>

<style scoped>
.Loader {
    width: 80px;
    height: 4px;
    background: rgb(55,98,225);
    background: radial-gradient(circle, rgba(55,98,225,1) 0%, rgba(119,57,221,1) 100%);
    margin: 10px auto;
    position: relative;
    margin-top: 20px;
}
.Loader span {
    position: absolute;
    left: 10px;
    height: 4px;
    padding: 0px 5px;
    border-right: solid 4px #fff;
    border-left: solid 4px #fff;
    animation-name: Loder-span;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}
@keyframes Loder-span {
    0% {
        left: -10px;
    }
    100% {
        left: 80px;
    }
}
</style>
