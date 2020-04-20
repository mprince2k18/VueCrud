<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <ul>
                  <li v-for="post in posts">{{ post.name }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted() {
          this.getData();
        },
        data(){
          return{
            posts:[],
          }
        },
        methods:{
          getData(){
            axios.get('http://127.0.0.1:8000/api/all_users')
            .then(response => this.posts = response.data);
          }
        },
        created(){
          this.getData();
        }
    }
</script>
