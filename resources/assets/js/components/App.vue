<template>
    <div id="app">
        <div class="box">
            <video autoplay class="video" :src="video"></video>
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
            getDelay(delay) {
                let delayNum = Math.floor(Math.random() * 18)
                    return delay[delayNum]
            },
            getColor(color) {
                let rand = Math.random()
                if (rand < 0.6) {
                    return 'white'
                } else if (rand < 0.8) {
                    return 'red'
                } else {
                    let colorNum = Math.floor(Math.random() * 10)
                    return color[colorNum]
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
                this.comments[i].delay = this.getDelay(this.delayPalette)
                this.comments[i].color = this.getColor(this.colorPalette)
            }
            this.setTweets()
            this.getTweets()
            setInterval(() => {
                for (let i = 0; i <= 15; i++) {
                    this.comments[i].delay = this.getDelay(this.delayPalette)
                    this.comments[i].color = this.getColor(this.colorPalette)
                }
                this.setTweets()
                this.getTweets()
            }, 30000)
        },
        mounted() {
            navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            })
                .then(stream => {
                    this.video = URL.createObjectURL(stream)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
</script>

<style lang="scss">
    @import '../../scss/color';
    @import '../../scss/delay';

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
                black 0.7px 0.7px 0, black -0.7px -0.7px 0,
                black -0.7px 0.7px 0, black 0.7px -0.7px 0,
                black 0 0.7px 0, black  -0.7px 0,
                black -0.7px 0 0, black 0.7px 0 0;
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
</style>
