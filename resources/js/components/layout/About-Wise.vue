<template>
    <div class="About-Wise">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="overflow: hidden">
                    <div class="About-img">

                    </div>

                </div>
                <div class="col-md-6 Info">
                    <h1 class="text-center">About Wise Teams</h1>
                    <animated-line></animated-line>
                    <p class="mt-4">"Wise Teams" or shorted by (WT), Online Learning and communication platform that oriented to Wise Students and instructors.
                        It Enables them to Stay in connection throughout the educational stages, including learning and evaluation of the educational process.
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import AnimatedLine from "./AnimatedLine";

export default {
    name: "About-Wise",
    components: {AnimatedLine},
}
</script>

<style scoped>
.About-Wise h1 {
    color: #723BE4;
}

.About-img {
    height: 400px;
    width: 90%;
    background-image: url("http://127.0.0.1:8000/images/Logos/Main-Logo.png");
    background-size: cover;
    background-position: bottom ;
    background-origin: border-box;
    transition: 1s;
}
.About-img:hover
{
    transition: 1s;
    transform: scale(1.1);
}
.Info p  {
    font-size: 16px;
    color:#4F4F4F;
    letter-spacing: 2px;
    line-height: 30px;

}

</style>
