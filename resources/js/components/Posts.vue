<template>
    <div>
        <div class="row">
            <div v-for="post in posts" class="col-md-3 item">
                <p>{{post.title}}</p>
                <a href="#" @click="apenas(post.id)">detalhes</a>
            </div>
        </div>

        <div class="post" v-if="modal">
            <a href="#" @click="modal = false">fechar</a>
            <h1>{{post.title}}</h1>
            <p>{{post.body}}</p>
            tags:
            <ul class="tags">
                <li v-for="tag in post.tags">{{ tag }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                post: {},
                modal: false
            }
        },
        methods: {
            listar() {

                axios.get('/api/posts').then(response => {
                    this.posts = response.data;
                });

            },
            apenas(id) {

                axios.get('/api/posts/' + id).then(response => {
                    this.post = response.data;
                    this.abre_modal()
                });

            },
            abre_modal() {
                this.modal = true
            }
        },
        mounted() {
            this.listar()
        }
    }
</script>

<style>
    .item {
        border: 1px solid #ccc;
    }

    .post {
        position: absolute;
        top: 0;
        left: 50%;
        z-index: 99;
        width: 800px;
        height: auto;
        margin-left: -400px;
        padding: 10px;
        background-color: #eaeaea;
        color: #333;
        border: 1px solid #6E6E6E;

    }

    .post a {
        float: right;
        color: red;
    }
</style>
