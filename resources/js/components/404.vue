<template>
    <h1>Not Found 404</h1>
</template>

<script>
    export default {
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Brikole | 404';
                }
            },
        },
    }
</script>

<style scoped>

</style>
