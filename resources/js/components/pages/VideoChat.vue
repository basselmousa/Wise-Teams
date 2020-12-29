<template>
    <div>
        <div class="row justify-content-end mt-5">
            <div class="col-3">
                <button @click="endMeeting" class="btn btn-danger">End Meeting</button>
            </div>
        </div>
        <div class="p-5">
            <div class="grid grid-flow-row grid-cols-3 grid-rows-3 gap-4 bg-black/]">
                <div id="video-chat-window"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'video-chat',
    data: function () {
        return {
            accessToken: ''
        }
    },
    props:['teamid'],
    methods : {
        getAccessToken : function () {

            const _this = this
            const axios = require('axios')

            // Request a new token
            axios.get('/api/access_token')
                .then(function (response) {
                    _this.accessToken = response.data
                    console.log(_this.accessToken)
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    _this.connectToRoom();
                });
        },
        connectToRoom : function () {

            axios.post('/teams/meeting/',{tokens:this.accessToken,teamid:this.teamid}).then(function (res){
                console.log('save to db');
            }).catch(function (error){
                console.log(error);
                console.log(this.teamid);

            });

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
        },
        endMeeting: function (){
           axios.post('/teams/meeting/delete/'+this.teamid).then(function (res) {
               window.location.href = '/teams';
           });
        }
    },
    mounted : function () {
        console.log('Video chat room loading...')
        this.getAccessToken();
    }
}
</script>
<style scoped >
    video{
        width: 300px;
    }
    #video-chat-window > video
    {
        max-width: 300px;
        overflow: hidden;
    }
</style>
