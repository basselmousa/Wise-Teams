<template>
    <div>
        <div class="p-5">
            <div class="grid grid-flow-row grid-cols-3 grid-rows-3 gap-4 bg-black/]">
                <div id="video-chat-window"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MeetingJoin",
    props:['teamid'],
    data: function () {
        return {
            accessToken: ''
        }
    },
    methods:{
        getAccessToken : function () {

            const _this = this
            const axios = require('axios')

            // Request a new token
            axios.get('/teams/meeting/join/'+this.teamid)
                .then(function (response) {
                    _this.accessToken = response.data
                    console.log(_this.accessToken)
                })
                .catch(function (error) {
                    console.log(error);
                    alert('meeting ended by manager');
                    window.location.href = '/teams';
                })
                .then(function () {
                    _this.connectToRoom();
                });
        },
        connectToRoom : function () {
            const { connect, createLocalVideoTrack } = require('twilio-video');

            connect( this.accessToken, { name:'cool room' }).then(room => {

                console.log(`Successfully joined a Room: ${room}`);

                const videoChatWindow = document.getElementById('video-chat-window');

                createLocalVideoTrack().then(track => {
                    videoChatWindow.appendChild(track.attach());
                });

                room.on('participantConnected', participant => {
                    console.log(`Participant "${participant.identity}" connected`);

                    participant.tracks.forEach(publication => {
                        if (publication.isSubscribed) {
                            const track = publication.track;
                            videoChatWindow.appendChild(track.attach());
                        }
                    });

                    participant.on('trackSubscribed', track => {
                        videoChatWindow.appendChild(track.attach());
                    });
                });
            }, error => {
                console.error(`Unable to connect to Room: ${error.message}`);
            });
        }
    },
    mounted() {
       const _this = this;
        this.getAccessToken();
        setInterval(function (){
            $('video').css('width','250px');
            const axios = require('axios')
            axios.get('/teams/meeting/join/'+_this.teamid)
                .then(function (response) {
                })
                .catch(function (error) {
                    console.log(error);
                    alert("meeting ended by manager");
                    window.location.href = '/teams';
                });


        },1000)
    }
}
</script>

<style scoped>

</style>
