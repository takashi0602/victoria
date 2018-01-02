<template lang="pug">
    p {{ tweets }}
</template>

<script>
    export default {
        data() {
            return {
                tweets: []
            }
        },
        created() {
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