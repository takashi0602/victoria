<template>
    <div id="app">
        <div class="box">
            <video autoplay id="video" class="video"></video>
            <div v-bind:class="className"></div>
            <div v-for="(comment, index) in comments">
                <div :id="'comment' + index" class="comment" :class="[ comment.color, comment.delay ]">{{ comment.tweet }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'app',
        data() {
            return {
                className: 'white',
                comments: [
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    },
                    {
                        color: '',
                        delay: '',
                        tweet: ''
                    }
                ],
                colorPalette: [
                    'white',
                    'red',
                    'pink',
                    'orange',
                    'yellow',
                    'green',
                    'light-blue',
                    'blue',
                    'purple',
                    'black'
                ],
                delayPalette: [
                    'delay0',
                    'delay1',
                    'delay2',
                    'delay3',
                    'delay4',
                    'delay5',
                    'delay6',
                    'delay7',
                    'delay8',
                    'delay9',
                    'delay10',
                    'delay11',
                    'delay12',
                    'delay13',
                    'delay14',
                    'delay15',
                    'delay16',
                    'delay17',
                ]
            }
        },
        methods: {
            changeDelay() {
                let delayNum = Math.floor(Math.random() * 18)
                for (let i = 0; i <= 15; i++) {
                    delayNum = Math.floor(Math.random() * 18)
                    this.comments[i].delay = this.delayPalette[delayNum]
                }
            },
            changeColor() {
                let colorNum = Math.floor(Math.random() * 10)
                this.className = this.colorPalette[colorNum]
                for (let i = 0; i <= 15; i++) {
                    let rand = Math.random()
                    if (rand < 0.6) {
                        this.comments[i].color = 'white'
                    } else if (rand < 0.8) {
                        this.comments[i].color = 'red'
                    } else {
                        let colorNum = Math.floor(Math.random() * 10)
                        this.comments[i].color = this.colorPalette[colorNum]
                    }
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
            this.setTweets()
            setInterval(() => {
                this.setTweets()
            }, 60000)

            this.changeColor()
            this.changeDelay()
            this.getTweets()
            setInterval(() => {
                this.changeColor()
                this.changeDelay()
                this.getTweets()
            }, 25000)
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
            animation-duration: 25s;
            animation-iteration-count: infinite;
            animation-fill-mode: both;
            animation-timing-function: linear;
        }
        @keyframes comments {
            from {
                transform: translate(101%, 0);
            }
            to {
                transform: translate(-4500px, 0);
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
