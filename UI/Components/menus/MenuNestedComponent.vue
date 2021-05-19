<template>
    <div class="row">
        <div class="col-12">
            <nested-draggable :tasks="list"/>
            <input type="hidden" name="nested" :value="JSON.stringify(list)"/>
        </div>
    </div>
</template>

<script>
    import nestedDraggable from "./nested";

    export default {
        name: "menu-nested-component",

        display: "Nested",

        components: {
            nestedDraggable
        },

        props: ['menu'],

        data() {
            return {
                list: this.menu,
            };
        },
    };
</script>
<style scoped></style>
