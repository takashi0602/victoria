<template>
    <div id="app">
        <div class="box">
            <video autoplay id="video" class="video"></video>
            <div v-for="(comment, index) in comments">
                <div :id="'comment' + index" class="comment" :class="[ comment.color, comment.delay ]">{{ comment.tweet }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import data from './data.json'

    export default {
        name: 'app',
        data() {
            return data
        },
        methods: {
            getDelay() {
                let delayNum = Math.floor(Math.random() * 18)
                    return this.delayPalette[delayNum]
            },
            getColor() {
                let rand = Math.random()
                if (rand < 0.6) {
                    return 'white'
                } else if (rand < 0.8) {
                    return 'red'
                } else {
                    let colorNum = Math.floor(Math.random() * 10)
                    return this.colorPalette[colorNum]
                }
            },
            setTweets() {
                axios.get('/api/set/tweets')
            },
            getTweets() {
                axios.get('/api/get/tweets')
                    .then(response => {
                        for (let i = 0; i <= 15; i++) {
                            if (Math.random() <= 0.625) {
                                this.comments[i].tweet = response.data[i].tweet
                            }
                        }
                    })
            }
        },
        created() {
            for (let i = 0; i <= 15; i++) {
                this.comments[i].delay = this.getDelay()
                this.comments[i].color = this.getColor()
            }
            this.setTweets()
            this.getTweets()
            setInterval(() => {
                for (let i = 0; i <= 15; i++) {
                    this.comments[i].delay = this.getDelay()
                    this.comments[i].color = this.getColor()
                }
                this.setTweets()
                this.getTweets()
            }, 30000)
        },
        mounted() {
            const video = document.getElementById('video');
            let localStream;

            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false}
            )
                .then(stream => {
                    localStream = stream;
                    video.src = URL.createObjectURL(localStream);
                })
                .catch(error => {
                    console.error('Error');
                });
        }
    }
</script>

<style lang="scss">
    * {
        margin: 0;
        padding: 0;
    }
    .box {
        width: 100%;
        height: 100vh;
        overflow: hidden;
        position: relative;
        .video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .comment {
            position: absolute;
            right: 0;
            font-size: 32px;
            white-space: nowrap;
            text-shadow:
                    black 0.7px 0.7px 0, black -0.7px -0.7px 0,/*右下、左上*/
                    black -0.7px 0.7px 0, black 0.7px -0.7px 0,/*右上、左下*/
                    black 0 0.7px 0, black  -0.7px 0,/*右、左*/
                    black -0.7px 0 0, black 0.7px 0 0;/*上、下*/
            animation-name: comments;
            animation-duration: 30s;
            animation-iteration-count: infinite;
            animation-fill-mode: both;
            animation-timing-function: linear;
        }
        @keyframes comments {
            from {
                transform: translate(101%, 0);
            }
            to {
                transform: translate(-10000px, 0);
            }
        }
        @for $i from 0 through 15 {
            #comment#{$i} {
                top: $i * 50px;
            }
        }
    }
    .delay0 {
        animation-delay: 0s;
    }
    .delay1 {
        animation-delay: 1s;
    }
    .delay2 {
        animation-delay: 2s;
    }
    .delay3 {
        animation-delay: 3s;
    }
    .delay4 {
        animation-delay: 4s;
    }
    .delay5 {
        animation-delay: 5s;
    }
    .delay6 {
        animation-delay: 6s;
    }
    .delay7 {
        animation-delay: 7s;
    }
    .delay8 {
        animation-delay: 8s;
    }
    .delay9 {
        animation-delay: 9s;
    }
    .delay10 {
        animation-delay: 10s;
    }
    .delay11 {
        animation-delay: 11s;
    }
    .delay12 {
        animation-delay: 12s;
    }
    .delay13 {
        animation-delay: 13s;
    }
    .delay14 {
        animation-delay: 14s;
    }
    .delay15 {
        animation-delay: 15s;
    }
    .delay16 {
        animation-delay: 15s;
    }
    .delay17 {
        animation-delay: 15s;
    }
    .white {
        color: #fff;
    }
    .red {
        color: #ea3423;
    }
    .pink {
        color: #ef8784;
    }
    .orange {
        color: #f6c243;
    }
    .yellow {
        color: #fefe54;
    }
    .green {
        color: #75fb4c;
    }
    .light-blue {
        color: #75fbfd;
    }
    .blue {
        color: #1c00f5;
    }
    .purple {
        color: #b024f6;
    }
    .black {
        color: #000;
    }
</style>
