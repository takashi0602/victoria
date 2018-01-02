<template lang="pug">
    h1 test
</template>

<script>
    export default {
        created() {
            axios.get('api/search')
                .then(response => {
                    console.log(response.data);
                })
                .catch(err => {

                });
        }
    }
</script>