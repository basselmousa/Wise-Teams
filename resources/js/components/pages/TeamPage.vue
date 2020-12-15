<template>
    <div>
        <div class="Team-Activity">
            <div class="row Chat-Box">
                <div class="content mx-auto">
                    <div class="row">
                        <div class="col-11 col-lg-8 Team-Post p-2 pr-3 pr-0">
                            <div class="row justify-content-start w-75">
                                <div class="col-2 mr-5 mr-md-0">
                                    <div class="avatar "></div>
                                </div>
                                <div class="col-6 mt-3  text-left pl-0">
                                    <h5>Student 1</h5>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 pt-3">
                                    <p class="pl-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet
                                        distinctio enim, odit
                                        quaerat sequi temporibus unde vero voluptatibus? Ad dolorum enim facere libero modi
                                        molestias nemo nisi provident quam.</p>
                                </div>
                            </div>
                            <div class="row justify-content-end text-right">
                                <div class="col-4">
                                    <p class="pr-0 ">11/10/2020 10:10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-11 col-md-8 Team-Post p-2 pl-3 pr-0">
                            <div class="row flex-row-reverse text-right p3-0">
                                <div class="col-3 col-sm-2 p-0">
                                    <div class="avatar"></div>
                                </div>
                                <div class="col-6 mt-3">
                                    <h5>Yazeed Nazal</h5>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 pt-3">
                                    <p class="pl-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet
                                        distincm.</p>
                                </div>
                            </div>
                            <div class="row justify-content-start text-left">
                                <div class="col-4">
                                    <p class="pr-0 ">11/10/2020 10:10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 col-lg-8 Team-Post p-2 pr-3 pr-0">
                            <div class="row justify-content-start w-75">
                                <div class="col-2 mr-5 mr-md-0">
                                    <div class="avatar "></div>
                                </div>
                                <div class="col-6 mt-3  text-left pl-0">
                                    <h5>Doctor</h5>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 pt-3">
                                    <p class="pl-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet
                                        distinctio enim, odit
                                        quaerat sequi temporibus unde vero voluptatibus? Ad dolorum enim facere libero modi
                                        molestias nemo nisi provident quam.</p>
                                </div>
                            </div>
                            <div class="row justify-content-end text-right">
                                <div class="col-4">
                                    <p class="pr-0 ">11/10/2020 10:10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row Message-Box justify-content-center">
                <div class="col-7 p-0">
                    <div class="mx-auto content">
                        <form action="post" class="">
                            <div class="input-group">
                            <textarea placeholder="Send New Message" class="form-control" rows="3"
                                      aria-label="With textarea"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2 col-md-1  p-0">
                    <button class="btn Edit-Btn w-100 h-100">Send</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "team-page",
    props:['teamID'],
    created() {
        axios.get('/teams/team/'+this.teamID)
    }
}
</script>

<style scoped>

</style>
