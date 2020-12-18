<template>
    <div>
        <div class="Team-Activity">
            <div class="row Chat-Box">
                <div class="content mx-auto">
                    <div v-for="(post,index) in posts" :key="index" :class="getClassMainRow(post.user_id)">
                        <div class="col-11 col-lg-8 Team-Post p-2 pr-3 pr-0">
                            <div :class="getClassFirstRow(post.user_id)">
                                <div class="col-2 mr-5 mr-md-0">
                                    <div class="avatar "></div>
                                </div>
                                <div class="col-6 mt-3   text-left pl-0">
                                    <h5 :class="{'text-right':checkUserSender(post.user_id)}">Student 1</h5>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 pt-3">
                                    <p class="pl-3" v-text="post.content"></p>
                                </div>
                            </div>
                            <div :class="getClassDateRow(post.user_id)">
                                <div class="col-4">
                                    <p class="pr-0 " v-text="post.created_at"></p>
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
    data() {
        return {
            posts: '',
        }
    },
    props: ['teamid', 'manager', 'user'],
    created() {
        axios.get('/teams/team/posts/' + this.teamid).then((response) => (this.posts = response.data)).catch(function (error) {
            console.log(error)
        });
    }
    ,
    methods: {
        checkUserSender (sender) {
            return sender == this.user
        },
        setpost(data) {
            this.posts = data;
        },
        getClassMainRow(sender) {
          return{
              'row sender': sender == this.user,
              'row'       :sender !=this.user,
          }
        }
        ,
        getClassFirstRow(sender) {
            return {
                'row justify-content-start w-100 senderFirstRow' : sender == this.user,
                'row justify-content-start w-75 '               : sender != this.user
            }
        },
        getClassDateRow (sender) {
            return {
                'row justify-content-end text-right' :sender != this.user,
                'row'                                :sender == this.user
            }
        }
    }
}
</script>

<style scoped>

</style>
