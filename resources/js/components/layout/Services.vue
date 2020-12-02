<template>
    <div class="Services-com">
        <div class="container">
            <h1 class="text-center">Services</h1>
            <AnimatedLine></AnimatedLine>
            <div class="row">
                <div class="col-md-4">
                    <h1 class="text-center"><i class="fas fa-users"></i></h1>
                    <h2 class="text-center mb-4">Realtime Comunication</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aperiam dolore dolorum, enim
                        ut velit!</p>
                </div>
                <div class="col-md-4">
                    <h1 class="text-center"><i class="fas fa-folder"></i></h1>
                    <h2 class="text-center mb-4">File Sharing</h2>
                    <p class="text-center">Lorem ipsum A doloremque eaque, ipsa ipsam
                        repellendus sunt voluptatibus. Laborum, officia.</p>
                </div>
                <div class="col-md-4">
                    <h1 class="text-center"><i class="fas fa-video"></i></h1>
                    <h2 class="text-center mb-4">Video Communication</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, elit. Ad autem distinctio eaque facere hic
                        illo maiores nis fugiat id
                        qui rerum!</p>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import AnimatedLine from "./AnimatedLine";

export default {
    name: "Services",
    components: {AnimatedLine}
}
</script>

<style scoped>
.Services-com {
    margin-top: 60px;
}

.Services-com .container > h1, .Services-com h3 {
    color: #723BE4;
}

.Services-com .container .row {
    margin-top: 40px;
}

.Services-com .container .row h1:first-of-type {
    font-size: 120px;
    background: linear-gradient(-45deg, #3366E9, #723BE4, #3366E9, #723BE4);
    background-size: 400% 400%;
    animation: gradient 7s linear infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.Services-com .container .row p {
    font-size: 14px;
    color: #4F4F4F;
    letter-spacing: 2px;
    line-height: 30px;
    margin: 0px 20px;
}
</style>
