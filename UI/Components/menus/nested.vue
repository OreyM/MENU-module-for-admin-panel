<template>
    <draggable class="dragArea" tag="ul" :list="tasks" :group="{ name: 'g1' }">
        <li v-for="el in tasks" :key="el.id">

            <div class="card mb-2">
                <div class="card-header accordion-element" id="headingOne">
                    <h5 class="m-0">
                        <a class="text-dark" data-toggle="collapse" :href="'#menu-collapse-' + el.id" aria-expanded="true">
                            <i class="la la-caret-down"></i>
                            {{ el.name }} <small class="text-pink" v-if="el.is_separator">(разделитель)</small>
                        </a>
                    </h5>
                </div>

                <div :id="'menu-collapse-' + el.id" class="collapse" aria-labelledby="headingOne" data-parent="">
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label :for="'link-name-' + el.id">Имя ссылки</label>
                            <input type="text" :id="'link-name-' + el.id" class="form-control" v-model="el.name">
                        </div>
                        <div class="form-group mb-3">
                            <label :for="'link-icon-' + el.id">Класс иконки</label>
                            <input type="text" :id="'link-icon-' + el.id" class="form-control" v-model="el.icon">
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input v-model="el.is_separator"  type="checkbox" class="custom-control-input"
                                   :id="'separator-switch-' + el.id" :checked="el.is_separator">
                            <label class="custom-control-label" :for="'separator-switch-' + el.id">Разделитель</label>
                        </div>
                        <div v-if="!el.is_separator" class="form-group mb-3">
                            <label :for="'link-route-' + el.id">Url или Route</label>
                            <input type="text" :id="'link-route-' + el.id" class="form-control" v-model="el.route">
                        </div>

                        <div class="form-group mb-3">
                            <button type="button" class="btn btn-danger waves-effect waves-light float-right"
                                    data-toggle="modal" :data-target="'#menu-element-destroy-modal-' + el.id">
                                Удалить
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <nested-draggable :tasks="el.sub"/>
        </li>
    </draggable>
</template>
<script>
    import draggable from "vuedraggable";

    export default {

        props: {
            tasks: {
                required: true,
                type: Array
            }
        },

        components: {
            draggable
        },

        name: "nested-draggable",

    };
</script>
<style scoped>
    .dragArea {
        list-style: none;
    }
</style>
