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
                        <button type="button" class="btn-sm btn-primary" @click="editUser(post.id)" data-toggle="modal" data-target="#exampleModal">Edit</button>
                      </td>
                    </tr>
                  </tbody>
                </table>


            </div>
        </div>



        <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">


                  <form action="api/update/user" method="post">

                    <div class="form-group">
                      <label>Name</label>
                      <input type="hidden" name="id" v-model="id">
                      <input type="text" v-model="editname" name="editname" class="form-control" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" v-model="editemail" name="editemail" class="form-control" placeholder="Enter email">
                    </div>

                    <button type="submit" @click="updateUser" class="btn btn-primary">Submit</button>

                  </form>


                </div>
              </div>
            </div>
          </div>



    </div>
</template>

<script>
    export default {
        mounted() {
          this.getData();
          this.editUser(id);
          this.updateUser();
        },
        data(){
          return{
            posts:[],
            id: '',
            editname: '',
            editemail : ''
          }
        },
        methods:{
          // getData
          getData(){
            axios.get('http://127.0.0.1:8000/api/all_users')
            .then(response => this.posts = response.data);
          },
          // editUser
          editUser(id){
            axios.get('http://127.0.0.1:8000/api/edit_user/' + id)
            .then(response => {
              this.id = response.data.id;
              this.editname = response.data.name;
              this.editemail = response.data.email;
              }
            );
          },
          // updateUser
          updateUser(){
            axios.put('http://127.0.0.1:8000/api/update/user'),{
              id : this.id,
              name : this.editname,
              email : this.editemail
            }
            .then(response => console.log(response) );
          }


        },
        created(){
          this.getData();
        }
    }
</script>
