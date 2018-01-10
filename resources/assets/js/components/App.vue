<template lang="pug">
    div
        //p {{ tweets }}
        p {{ count }}
</template>

<script>
    export default {
        data() {
            return {
                tweets: [],
                count: 0
            }
        },
        created() {
            setInterval(() => {
                this.count++
            }, 3000)

            axios.get('api/search')
                .then(response => {
                    console.log(response.data);
                    this.tweets = response.data;
                })
                .catch(err => {

                });
        }
    }
</script>