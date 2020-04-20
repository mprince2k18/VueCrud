<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="post in posts" :key="post.id">
                      <td>{{ post.name }}</td>
                      <td>{{ post.email }}</td>
                      <td>
                        <button type="button" class="btn-sm btn-danger" @click="deleteUser(post.id)">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>


            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data(){
          return{
            posts:[],
          }
        },
        methods:{
          // getData
          getData(){
            axios.get('http://127.0.0.1:8000/api/all_users')
            .then(response => this.posts = response.data);
          },
          // deleteUser
          deleteUser(id){
            axios.delete('delete_post/'+id)
            .then(response => console.log(response));
          }


        },
        created(){
          this.getData();
        }
    }
</script>
